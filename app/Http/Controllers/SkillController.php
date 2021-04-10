<?php
/**
 * @apiDefine SkillResponse
 * @apiSuccess {number} id Skill's unique id
 * @apiSuccess {string} name Skill's name
 * @apiSuccess {number} order Skill's order in UI
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *      {
 *          "data": {
 *              "id": 2,
 *              "name": "backend fejlesztő".
 *              "order": 10
 *          }
 *      }
 */

namespace App\Http\Controllers;

use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @api {get} /skills Request Skill index
     * @apiName GetSkillIndex
     * @apiGroup Skill
     * @apiSuccess {Object[]} data List of skills
     * @apiSuccess {number} id Skill's unique id
     * @apiSuccess {string} name Skill's name
     * @apiSuccess {number} order Skill's order in UI
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data": [
     *              {
     *                  "id": 1,
     *                  "name": "frontend fejlesztő",
     *                  "order": 10
     *              },
     *              {
     *                  "id": 2,
     *                  "name": "backend fejlesztő",
     *                  "order": 20
     *              }
     *          ]
     *      }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SkillResource::collection(Skill::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /skills Create Skill
     * @apiName CreateSkill
     * @apiGroup Skill
     * @apiParam (x-www-form-urlencoded) {string} name Skill's name
     * @apiParam (x-www-form-urlencoded) {number} order Skill's order in UI
     * @apiUse SkillResponse
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new SkillResource(Skill::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /skills/:id Request Skill information
     * @apiName GetSkill
     * @apiGroup Skill
     * @apiParam (url) {number} id Skill's unique id
     * @apiUse SkillResponse
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /skills/:id Update Skill information
     * @apiName UpdateSkill
     * @apiGroup Skill
     * @apiParam (url) {number} id Skill's unique id
     * @apiParam (x-www-form-urlencoded) {string} name Skill's name
     * @apiParam (x-www-form-urlencoded) {number} order Skill's order in UI
     * @apiUse SkillResponse
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        if ($skill->update($request->validated())) {
            return new SkillResource($skill);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /skills/:id Delete Skill
     * @apiName DeleteSkill
     * @apiGroup Skill
     * @apiParam (url) {number} id Skill's unique id
     * @apiUse SkillResponse
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        return new SkillResource($skill->delete());
    }
}
