<?php
/**
 * @apiDefine ProjectownerResponse
 * @apiSuccess {number} id Projectowner's unique id
 * @apiSuccess {string} name Projectowner's name
 * @apiSuccess {string} description Projectowner's description
 * @apiSuccess {string} website Projectowner's website
 * @apiSuccess {Object} user User object
 * @apiSuccessExample {json} Success-Response:
 *      HTTP/1.1 200 OK
 *      {
 *          "data": {
 *              "id": 1,
 *              "name": "K-Monitor",
 *              "description": "blablabla",
 *              "website": "http://k-monitor.hu",
 *              "user": {
 *                  "id": 2,
 *                  "name": "Juhász Attila",
 *                  "email": "ja@teszt.hu",
 *                  "email_verified_at": "2021-04-13"
 *              }
 *          }
 *      }
 */
/**
 * @apiDefine ProjectownerRequest
 * @apiParam (body) {object} user User
 * @apiParam (body) {string} user.name User's name
 * @apiParam (body) {string} user.email User's email
 * @apiParam (body) {string} user.password User's password
 * @apiParam (body) {string} user.password_confirmation User's password confirmation
 * @apiParam (body) {string} name PO's name
 * @apiParam (body) {string} description PO's description
 * @apiParam (body) {string} website PO's website
 * @apiParamExample {json} Request-Example:
 *      {
 *          "name": "KTM ACH",
 *          "description": "KTM Adventure Crowd Hungary",
 *          "website": "www.website.hu",
 *          "user": {
 *              "name": "Lövey Bálint",
 *              "email": "by@teszt.com",
 *              "password": "12345678",
 *              "password_confirmation": "12345678"
 *          }
 *      }
 */

namespace App\Http\Controllers;

use App\Http\Requests\ProjectownerRequest;
use App\Http\Resources\ProjectownerResource;
use App\Models\Projectowner;
use App\Models\User;
use App\Traits\UserRequestHandler;

class ProjectownerController extends Controller
{

    use UserRequestHandler;

    /**
     * Display a listing of the resource.
     *
     * @api {get} /projectowners Request Projectowner index
     * @apiSampleRequest off
     * @apiName GetProjectownerIndex
     * @apiGroup Projectowner
     * @apiSuccess {Object[]} data List of projectowners
     * @apiSuccess {number} id Projectowner's unique id
     * @apiSuccess {string} name Projectowner's name
     * @apiSuccess {string} description Projectowner's description
     * @apiSuccess {string} website Projectowner's website
     * @apiSuccess {Object} user User object
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data": [
     *              {
     *                  "id": 1,
     *                  "name": "K-Monitor",
     *                  "description": "blablabla",
     *                  "website": "http://k-monitor.hu",
     *                  "user": {
     *                      "id": 2,
     *                      "name": "Juhász Attila",
     *                      "email": "ja@teszt.hu",
     *                      "email_verified_at": "2021-04-13"
     *                  }
     *              }
     *          ]
     *      }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProjectownerResource::collection(Projectowner::all());
    }

    /**
     * Store a newly created projectowner user in storage.
     *
     * @api {post} /projectowners Create Projectowner/User
     * @apiSampleRequest off
     * @apiName CreateProjectowner
     * @apiGroup Projectowner
     * @apiUse ProjectownerRequest
     * @apiUse ProjectownerResponse
     *
     * @param  ProjectownerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectownerRequest $request) {
        $attr = $request->validated();

        $po = Projectowner::create($attr);

        $user = User::create($this->getUserDataFromRequestData($attr));

        $po->user()->save($user);

        return new ProjectownerResource($po);
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /projectowners/:id Request Projectowner information
     * @apiSampleRequest off
     * @apiName GetProjectowner
     * @apiGroup Projectowner
     * @apiUse ProjectownerResponse
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Projectowner $projectowner)
    {
        return new ProjectownerResource($projectowner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /projectowners/:id Update Projectowner information
     * @apiSampleRequest off
     * @apiName UpdateProjectowner
     * @apiGroup Projectowner
     * @apiUse ProjectownerRequest
     * @apiUse ProjectownerResponse
     *
     * @param  \App\Http\Requests\ProjectownerRequest  $request
     * @param  \App\Models\Projectowner  $projectowner
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectownerRequest $request, Projectowner $projectowner)
    {
        $attr = $request->validated();

        $projectowner->update($attr);

        $user = $projectowner->user;
        $user->update($this->getUserDataFromRequestData($attr));

        return new ProjectownerResource($projectowner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /projectowners/:id Delete Projectowner
     * @apiSampleRequest off
     * @apiName DeleteProjectowner
     * @apiGroup Projectowner
     * @apiParam (url) {number} id Projectowner's unique id
     * @apiUse ProjectownerResponse
     *
     * @param  \App\Models\Projectowner  $projectowner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projectowner $projectowner)
    {
        if ($projectowner->delete()) {
            if ($projectowner->user()->delete()) {
                return new ProjectownerResource($projectowner);
            }
        }
    }

}
