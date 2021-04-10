<?php
/**
 * @apiDefine ProjectstatusResponse
 * @apiSuccess {number} id Projectstatus's unique id
 * @apiSuccess {string} name Projectstatus's name
 * @apiSuccess {number} order Projectstatus's order in UI
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *      {
 *          "data": {
 *              "id": 1,
 *              "name": "ötlet".
 *              "order": 10
 *          }
 *      }
 */

namespace App\Http\Controllers;

use App\Http\Resources\ProjectstatusResource;
use App\Models\Projectstatus;
use Illuminate\Http\Request;

class ProjectstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @api {get} /projectstatuses Request Projectstatus index
     * @apiName GetProjectstatusIndex
     * @apiGroup Projectstatus
     * @apiSuccess {Object[]} data List of projectstatuses
     * @apiSuccess {number} id Projectstatus's unique id
     * @apiSuccess {string} name Projectstatus's name
     * @apiSuccess {number} order Projectstatus's order in UI
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data": [
     *              {
     *                  "id": 1,
     *                  "name": "ötlet",
     *                  "order": 10
     *              },
     *              {
     *                  "id": 2,
     *                  "name": "terv",
     *                  "order": 20
     *              }
     *          ]
     *      }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProjectstatusResource::collection(Projectstatus::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /projectstatuses Create Projectstatus
     * @apiName CreateProjectstatus
     * @apiGroup Projectstatus
     * @apiParam (x-www-form-urlencoded) {string} name Projectstatus's name
     * @apiParam (x-www-form-urlencoded) {number} order Projectstatus's order in UI
     * @apiUse ProjectstatusResponse
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new ProjectstatusResource(Projectstatus::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /projectstatuses/:id Request Projectstatus information
     * @apiName GetProjectstatus
     * @apiGroup Projectstatus
     * @apiParam (url) {number} id Projectstatus's unique id
     * @apiUse ProjectstatusResponse
     *
     * @param  \App\Models\Projectstatus  $projectstatus
     * @return \Illuminate\Http\Response
     */
    public function show(Projectstatus $projectstatus)
    {
        return new ProjectstatusResource($projectstatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /projectstatuses/:id Update Projectstatus information
     * @apiName UpdateProjectstatus
     * @apiGroup Projectstatus
     * @apiParam (url) {number} id Projectstatus's unique id
     * @apiParam (x-www-form-urlencoded) {string} name Projectstatus's name
     * @apiParam (x-www-form-urlencoded) {number} order Projectstatus's order in UI
     * @apiUse ProjectstatusResponse
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projectstatus  $projectstatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projectstatus $projectstatus)
    {
        if ($projectstatus->update($request->validated())) {
            return new ProjectstatusResource($projectstatus);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /projectstatuses/:id Delete Projectstatus
     * @apiName DeleteProjectstatus
     * @apiGroup Projectstatus
     * @apiParam (url) {number} id Projectstatus's unique id
     * @apiUse ProjectstatusResponse
     *
     * @param  \App\Models\Projectstatus  $projectstatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projectstatus $projectstatus)
    {
        if ($projectstatus->delete()) {
            return new ProjectstatusResource($projectstatus);
        }
    }
}
