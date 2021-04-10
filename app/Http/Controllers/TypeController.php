<?php
/**
 * @apiDefine TypeResponse
 * @apiSuccess {number} id Type's unique id
 * @apiSuccess {string} name Type's name
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *      {
 *          "data": {
 *              "id": 2,
 *              "name": "weboldal"
 *          }
 *      }
 */

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Http\Resources\TypeResource;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @api {get} /types Request Type index
     * @apiName GetTypeIndex
     * @apiGroup Type
     * @apiSuccess {Object[]} data List of types
     * @apiSuccess {number} id Type's unique id
     * @apiSuccess {string} name Type's name
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data": [
     *              {
     *                  "id": 1,
     *                  "name": "weboldal"
     *              },
     *              {
     *                  "id": 2,
     *                  "name": "mobil app"
     *              }
     *          ]
     *      }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TypeResource::collection(Type::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /types Create Type
     * @apiName CreateType
     * @apiGroup Type
     * @apiParam (x-www-form-urlencoded) {string} name Type's name
     * @apiUse TypeResponse

     * @param  TypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        return new TypeResource(Type::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /types/:id Request Type information
     * @apiName GetType
     * @apiGroup Type
     * @apiParam (url) {number} id Type's unique id
     * @apiUse TypeResponse

     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return new TypeResource($type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /types/:id Update Type information
     * @apiName UpdateType
     * @apiGroup Type
     * @apiParam (url) {number} id Type's unique id
     * @apiParam (x-www-form-urlencoded) {string} name Type's name
     * @apiUse TypeResponse
     *
     * @param  TypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, Type $type)
    {
        if ($type->update($request->validated())) {
            return new TypeResource($type);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /types/:id Delete Type
     * @apiName DeleteType
     * @apiGroup Type
     * @apiParam (url) {number} id Type's unique id
     * @apiUse TypeResponse
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        return new TypeResource($type->delete());
    }
}
