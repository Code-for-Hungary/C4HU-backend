<?php
/**
 * @apiDefine ContributorResponse
 * @apiSuccess {number} id Contributor's unique id
 * @apiSuccess {string} name Contributor's name
 * @apiSuccess {string} description Contributor's description
 * @apiSuccess {string} avatar Contributor's avatar url
 * @apiSuccess {string} cv_url Contributor's cv url
 * @apiSuccess {string} phone Contributor's phone
 * @apiSuccess {string} zip Contributor's zip
 * @apiSuccess {string} city Contributor's city
 * @apiSuccess {string} address Contributor's address
 * @apiSuccess {Object} user User object
 * @apiSuccessExample {json} Success-Response:
 *      HTTP/1.1 200 OK
 *      {
 *          "data": {
 *              "id": 1,
 *              "name": "Juhász Attila",
 *              "description": "blablabla",
 *              "avatar": "http://k-monitor.hu",
 *              "cv_url": "http://cvs.com/ja",
 *              "phone": "123344",
 *              "zip": "1143",
 *              "city": "Budapest",
 *              "address": "Ismerős utca 19.",
 *              "user": {
 *                  "id": 2,
 *                  "name": "Juhász Attila",
 *                  "email": "ja@teszt.hu",
 *                  "email_verified_at": "2021-04-13"
 *              },
 *              "skills": [
 *                  {
 *                      "id": 2,
 *                      "name": "Szervezetépítés",
 *                      "order": 20,
 *                      "skillgroup": {
 *                          "id": 1,
 *                          "name": "Szervezés",
 *                          "order": 10
 *                      },
 *                      "skilllevel": {
 *                          "id": 1,
 *                          "name": "interested (teljesen kezdő, érdeklődő)",
 *                          "order": 10
 *                      }
 *                  },
 *                  {
 *                      "id": 3,
 *                      "name": "Szervezeten belüli kommunikáció",
 *                      "order": 30,
 *                      "skillgroup": {
 *                          "id": 2,
 *                          "name": "Kommunikáció",
 *                          "order": 20
 *                      },
 *                      "skilllevel": {
 *                          "id": 2,
 *                          "name": "student (kezdő, tanulja)",
 *                          "order": 20
 *                      }
 *                  },
 *              ]
 *          }
 *      }
 */
/**
 * @apiDefine ContributorRequest
 * @apiParam (body) {object} user User
 * @apiParam (body) {string} user.name User's name
 * @apiParam (body) {string} user.email User's email
 * @apiParam (body) {string} user.password User's password
 * @apiParam (body) {string} user.password_confirmation User's password confirmation
 * @apiParam (body) {object[]} skills Skills
 * @apiParam (body) {object} skill0 Skill 0
 * @apiParam (body) {number} skill0.skill_id Skill Id
 * @apiParam (body) {number} skill0.skilllevel_id Skilllevel Id
 * @apiParam (body) {object} skill1 Skill 1
 * @apiParam (body) {number} skill1.skill_id Skill Id
 * @apiParam (body) {number} skill1.skilllevel_id Skilllevel Id
 * @apiParam (body) {string} name Contributor's name
 * @apiParam (body) {string} description Contributor's description
 * @apiParam (body) {string} avatar Contributor's avatar url
 * @apiParam (body) {string} cv_url Contributor's cv url
 * @apiParam (body) {string} phone Contributor's phone
 * @apiParam (body) {string} zip Contributor's zip
 * @apiParam (body) {string} city Contributor's city
 * @apiParam (body) {string} address Contributor's address
 * @apiParamExample {json} Request-Example:
 *      {
 *          "name": "Juhász Attila",
 *          "description": "blablabla",
 *          "avatar": "http://k-monitor.hu",
 *          "cv_url": "http://cvs.com/ja",
 *          "phone": "123344",
 *          "zip": "1143",
 *          "city": "Budapest",
 *          "address": "Ismerős utca 19.",
 *          "user": {
 *              "name": "Juhász Attila",
 *              "email": "ja@teszt.hu",
 *              "password": "12345678",
 *              "password_confirmation": "12345678"
 *          },
 *          "skills": [
 *              {
 *                  "skill_id": 2,
 *                  "skilllevel_id": 1
 *              },
 *              {
 *                  "skill_id": 3,
 *                  "skilllevel_id": 2
 *              },
 *              {
 *                  "skill_id": 4,
 *                  "skilllevel_id": 3
 *              }
 *          ]
 *      }
 */

namespace App\Http\Controllers;

use App\Http\Requests\ContributorRequest;
use App\Http\Resources\ContributorResource;
use App\Models\Contributor;
use App\Models\User;
use App\Traits\SkillRequestHandler;
use App\Traits\UserRequestHandler;

class ContributorController extends Controller
{

    use SkillRequestHandler, UserRequestHandler;

    /**
     * Display a listing of the resource.
     *
     * @api {get} /contributors Request Contributor index
     * @apiSampleRequest off
     * @apiName GetContributorIndex
     * @apiGroup Contributor
     * @apiSuccess {number} id Contributor's unique id
     * @apiSuccess {string} name Contributor's name
     * @apiSuccess {string} description Contributor's description
     * @apiSuccess {string} avatar Contributor's avatar url
     * @apiSuccess {string} cv_url Contributor's cv url
     * @apiSuccess {string} phone Contributor's phone
     * @apiSuccess {string} zip Contributor's zip
     * @apiSuccess {string} city Contributor's city
     * @apiSuccess {string} address Contributor's address
     * @apiSuccess {Object} user User object
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data": [
     *              {
     *                  "id": 1,
     *                  "name": "Juhász Attila",
     *                  "description": "blablabla",
     *                  "avatar": "http://k-monitor.hu",
     *                  "cv_url": "http://cvs.com/ja",
     *                  "phone": "123344",
     *                  "zip": "1143",
     *                  "city": "Budapest",
     *                  "address": "Ismerős utca 19.",
     *                  "user": {
     *                      "id": 2,
     *                      "name": "Juhász Attila",
     *                      "email": "ja@teszt.hu",
     *                      "email_verified_at": "2021-04-13"
     *                  }
     *                  "skills": [
     *                      {
     *                          "id": 2,
     *                          "name": "Szervezetépítés",
     *                          "order": 20,
     *                          "skillgroup": {
     *                              "id": 1,
     *                              "name": "Szervezés",
     *                              "order": 10
     *                          },
     *                          "skilllevel": {
     *                              "id": 1,
     *                              "name": "interested (teljesen kezdő, érdeklődő)",
     *                              "order": 10
     *                          }
     *                      },
     *                      {
     *                          "id": 3,
     *                          "name": "Szervezeten belüli kommunikáció",
     *                          "order": 30,
     *                          "skillgroup": {
     *                              "id": 2,
     *                              "name": "Kommunikáció",
     *                              "order": 20
     *                          },
     *                          "skilllevel": {
     *                              "id": 2,
     *                              "name": "student (kezdő, tanulja)",
     *                              "order": 20
     *                          }
     *                      },
     *                  ]
     *              }
     *          ]
     *      }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContributorResource::collection(Contributor::all());
    }

    /**
     * Store a newly created contributor user in storage.
     *
     * @api {post} /contributors Create Contributor/User
     * @apiSampleRequest off
     * @apiName CreateContributor
     * @apiGroup Contributor
     * @apiUse ContributorRequest
     * @apiUse ContributorResponse
     *
     * @param  ContributorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContributorRequest $request)
    {
        $attr = $request->validated();

        $co = Contributor::create($attr);

        $skilldata = $this->getSkillDataFromRequestData($attr);
        if ($skilldata !== false) {
            $co->skills()->sync($skilldata);
        }

        $user = User::create($this->getUserDataFromRequestData($attr));

        $co->user()->save($user);

        return new ContributorResource($co);
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /contributors/:id Request Contributor information
     * @apiSampleRequest off
     * @apiName GetContributor
     * @apiGroup Contributor
     * @apiUse ContributorResponse
     *
     * @param  Contributor  $contributor
     * @return \Illuminate\Http\Response
     */
    public function show(Contributor $contributor)
    {
        return new ContributorResource($contributor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /contributors/:id Update Contributor information
     * @apiSampleRequest off
     * @apiName UpdateContributor
     * @apiGroup Contributor
     * @apiUse ContributorRequest
     * @apiUse ContributorResponse

     * @param  ContributorRequest  $request
     * @param  Contributor  $contributor
     * @return \Illuminate\Http\Response
     */
    public function update(ContributorRequest $request, Contributor $contributor)
    {
        $attr = $request->validated();

        $contributor->update($attr);

        $skilldata = $this->getSkillDataFromRequestData($attr);
        if ($skilldata !== false) {
            $contributor->skills()->sync($skilldata);
        }

        $user = $contributor->user;
        $user->update($this->getUserDataFromRequestData($attr));

        return new ContributorResource($contributor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /contributors/:id Delete Contributor
     * @apiSampleRequest off
     * @apiName DeleteContributor
     * @apiGroup Contributor
     * @apiParam (url) {number} id Contributor's unique id
     * @apiUse ContributorResponse
     *
     * @param  Contributor  $contributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contributor $contributor)
    {
        if ($contributor->delete()) {
            if ($contributor->user()->delete()) {
                return new ContributorResource($contributor);
            }
        }
    }
}
