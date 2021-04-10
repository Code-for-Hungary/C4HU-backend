<?php
/**
 * @apiDefine SkillgroupResponse
 * @apiSuccess {number} id Skillgroup's unique id
 * @apiSuccess {string} name Skillgroup's name
 * @apiSuccess {number} order Skillgroup's order in UI
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *      {
 *          "data": {
 *              "id": 2,
 *              "name": "Kommunikáció",
 *              "order": 20
 *          }
 *      }
 */

namespace App\Http\Controllers;

use App\Http\Resources\SkillgroupResource;
use App\Models\Skillgroup;
use Illuminate\Http\Request;

class SkillgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @api {get} /skillgroups Request Skillgroup index
     * @apiName GetSkillgroupIndex
     * @apiGroup Skillgroup
     * @apiSuccess {Object[]} data List of skillgroups
     * @apiSuccess {number} id Skillgroup's unique id
     * @apiSuccess {string} name Skillgroup's name
     * @apiSuccess {number} order Skillgroup's order in UI
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data": [
     *              {
     *                  "id": 1,
     *                  "name": "Szervezés",
     *                  "order": 10
     *              },
     *              {
     *                  "id": 2,
     *                  "name": "Kommunikáció",
     *                  "order": 20
     *              }
     *          ]
     *      }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SkillgroupResource::collection(Skillgroup::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /skillgroups Create Skillgroup
     * @apiName CreateSkillgroup
     * @apiGroup Skillgroup
     * @apiParam (x-www-form-urlencoded) {string} name Skillgroup's name
     * @apiParam (x-www-form-urlencoded) {number} order Skillgroup's order in UI
     * @apiUse SkillgroupResponse
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new SkillgroupResource(Skillgroup::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /skillgroups/:id Request Skillgroup information
     * @apiName GetSkillgroup
     * @apiGroup Skillgroup
     * @apiParam (url) {number} id Skillgroup's unique id
     * @apiUse SkillgroupResponse
     *
     * @param  \App\Models\Skillgroup  $skillgroup
     * @return \Illuminate\Http\Response
     */
    public function show(Skillgroup $skillgroup)
    {
        return new SkillgroupResource($skillgroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /skillgroups/:id Update Skillgroup information
     * @apiName UpdateSkillgroup
     * @apiGroup Skillgroup
     * @apiParam (url) {number} id Skillgroup's unique id
     * @apiParam (x-www-form-urlencoded) {string} name Skillgroup's name
     * @apiParam (x-www-form-urlencoded) {number} order Skillgroup's order in UI
     * @apiUse SkillgroupResponse
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skillgroup  $skillgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skillgroup $skillgroup)
    {
        if ($skillgroup->update($request->validated())) {
            return new SkillgroupResource($skillgroup);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /skillgroups/:id Delete Skillgroup
     * @apiName DeleteSkillgroup
     * @apiGroup Skillgroup
     * @apiParam (url) {number} id Skillgroup's unique id
     * @apiUse SkillgroupResponse
     *
     * @param  \App\Models\Skillgroup  $skillgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skillgroup $skillgroup)
    {
        if ($skillgroup->delete()) {
            return new SkillgroupResource($skillgroup);
        }
    }
}
