<?php
/**
 * @apiDefine SkilllevelResponse
 * @apiSuccess {number} id Skilllevel's unique id
 * @apiSuccess {string} name Skilllevel's name
 * @apiSuccess {number} order Skilllevel's order in UI
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *      {
 *          "data": {
 *              "id": 2,
 *              "name": "student",
 *              "order": 20
 *          }
 *      }
 */

namespace App\Http\Controllers;

use App\Http\Requests\SkilllevelRequest;
use App\Http\Resources\SkilllevelResource;
use App\Models\Skilllevel;

class SkilllevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @api {get} /skilllevels Request Skilllevel index
     * @apiSampleRequest off
     * @apiName GetSkilllevelIndex
     * @apiGroup Skilllevel
     * @apiSuccess {Object[]} data List of skilllevels
     * @apiSuccess {number} id Skilllevel's unique id
     * @apiSuccess {string} name Skilllevel's name
     * @apiSuccess {number} order Skilllevel's order in UI
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data": [
     *              {
     *                  "id": 1,
     *                  "name": "interested",
     *                  "order": 10
     *              },
     *              {
     *                  "id": 2,
     *                  "name": "student",
     *                  "order": 20
     *              }
     *          ]
     *      }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SkilllevelResource::collection(Skilllevel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /skilllevels Create Skilllevel
     * @apiSampleRequest off
     * @apiName CreateSkilllevel
     * @apiGroup Skilllevel
     * @apiParam (body) {string} name Skilllevel's name
     * @apiParam (body) {number} order Skilllevel's order in UI
     * @apiUse SkilllevelResponse
     *
     * @param  \App\Http\Requests\SkilllevelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkilllevelRequest $request)
    {
        return new SkilllevelResource(Skilllevel::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /skilllevels/:id Request Skilllevel information
     * @apiSampleRequest off
     * @apiName GetSkilllevel
     * @apiGroup Skilllevel
     * @apiParam (url) {number} id Skilllevel's unique id
     * @apiUse SkilllevelResponse
     *
     * @param  \App\Models\Skilllevel  $skilllevel
     * @return \Illuminate\Http\Response
     */
    public function show(Skilllevel $skilllevel)
    {
        return new SkilllevelResource($skilllevel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /skilllevels/:id Update Skilllevel information
     * @apiSampleRequest off
     * @apiName UpdateSkilllevel
     * @apiGroup Skilllevel
     * @apiParam (url) {number} id Skilllevel's unique id
     * @apiParam (body) {string} name Skilllevel's name
     * @apiParam (body) {number} order Skilllevel's order in UI
     * @apiUse SkilllevelResponse
     *
     * @param  \App\Http\Requests\SkilllevelRequest  $request
     * @param  \App\Models\Skilllevel  $skilllevel
     * @return \Illuminate\Http\Response
     */
    public function update(SkilllevelRequest $request, Skilllevel $skilllevel)
    {
        if ($skilllevel->update($request->validated())) {
            return new SkilllevelResource($skilllevel);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /skilllevels/:id Delete Skilllevel
     * @apiSampleRequest off
     * @apiName DeleteSkilllevel
     * @apiGroup Skilllevel
     * @apiParam (url) {number} id Skilllevel's unique id
     * @apiUse SkilllevelResponse
     *
     * @param  \App\Models\Skilllevel  $skilllevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skilllevel $skilllevel)
    {
        if ($skilllevel->delete()) {
            return new SkilllevelResource($skilllevel);
        }
    }
}
