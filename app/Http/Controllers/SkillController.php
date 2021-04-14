<?php
/**
 * @apiDefine SkillResponse
 * @apiSuccess {number} id Skill's unique id
 * @apiSuccess {string} name Skill's name
 * @apiSuccess {number} order Skill's order in UI
 * @apiSuccess {Object} skillgroup Skillgroup object
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *      {
 *          "data": {
 *              "id": 2,
 *              "name": "backend fejlesztő".
 *              "order": 10,
 *              "skillgroup": {
 *                  "id": 6,
 *                  "name": "Informatikus",
 *                  "order": 60
 *              }
 *          }
 *      }
 */

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use App\Models\Skillgroup;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @api {get} /skills Request Skill index
     * @apiSampleRequest off
     * @apiName GetSkillIndex
     * @apiGroup Skill
     * @apiSuccess {Object[]} data List of skills
     * @apiSuccess {number} id Skill's unique id
     * @apiSuccess {string} name Skill's name
     * @apiSuccess {number} order Skill's order in UI
     * @apiSuccess {Object} skillgroup Skillgroup object
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data": [
     *              {
     *                  "id": 1,
     *                  "name": "frontend fejlesztő",
     *                  "order": 10,
     *                  "skillgroup": {
     *                      "id": 6,
     *                      "name": "Informatikus",
     *                      "order": 60
     *                  }
     *              },
     *              {
     *                  "id": 2,
     *                  "name": "backend fejlesztő",
     *                  "order": 20,
     *                  "skillgroup": {
     *                      "id": 7,
     *                      "name": "Szervezés",
     *                      "order": 70
     *                  }
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
     * @apiSampleRequest off
     * @apiName CreateSkill
     * @apiGroup Skill
     * @apiParam (body) {string} name Skill's name
     * @apiParam (body) {number} order Skill's order in UI
     * @apiParam (body) {number} skillgroup_id Skillgroup object's Id
     * @apiUse SkillResponse
     *
     * @param  \App\Http\Requests\SkillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        $skill = Skill::create($request->validated());

        $skillgroup = Skillgroup::find($request->input('skillgroup_id'));
        if ($skillgroup) {
            $skill->skillgroup()->associate($skillgroup);
            $skill->save();
        }
        return new SkillResource($skill);
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /skills/:id Request Skill information
     * @apiSampleRequest off
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
     * @apiSampleRequest off
     * @apiName UpdateSkill
     * @apiGroup Skill
     * @apiParam (url) {number} id Skill's unique id
     * @apiParam (body) {string} name Skill's name
     * @apiParam (body) {number} order Skill's order in UI
     * @apiParam (body) {number} skillgroup_id Skillgroup object's Id
     * @apiUse SkillResponse
     *
     * @param  \App\Http\Requests\SkillRequest  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        if ($skill->update($request->validated())) {
            $skillgroup = Skillgroup::find($request->input('skillgroup_id'));
            if ($skillgroup) {
                $skill->skillgroup()->associate($skillgroup);
                $skill->save();
            }
        }
        return new SkillResource($skill);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /skills/:id Delete Skill
     * @apiSampleRequest off
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
        if ($skill->delete()) {
            return new SkillResource($skill);
        }
    }
}
