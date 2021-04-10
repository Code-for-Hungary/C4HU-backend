<?php
/**
 * @apiDefine ContractstatusResponse
 * @apiSuccess {number} id Contractstatus's unique id
 * @apiSuccess {string} name Contractstatus's name
 * @apiSuccess {number} order Contractstatus's order in UI
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *      {
 *          "data": {
 *              "id": 1,
 *              "name": "jelentkezés".
 *              "order": 10
 *          }
 *      }
 */

namespace App\Http\Controllers;

use App\Http\Resources\ContractstatusResource;
use App\Models\Contractstatus;
use Illuminate\Http\Request;

class ContractstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @api {get} /contractstatuses Request Contractstatus index
     * @apiName GetContractstatusIndex
     * @apiGroup Contractstatus
     * @apiSuccess {Object[]} data List of contractstatuses
     * @apiSuccess {number} id Contractstatus's unique id
     * @apiSuccess {string} name Contractstatus's name
     * @apiSuccess {number} order Contractstatus's order in UI
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data": [
     *              {
     *                  "id": 1,
     *                  "name": "jelentkezés",
     *                  "order": 10
     *              },
     *              {
     *                  "id": 2,
     *                  "name": "elfogadva",
     *                  "order": 20
     *              }
     *          ]
     *      }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContractstatusResource::collection(Contractstatus::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /contractstatuses Create Contractstatus
     * @apiName CreateContractstatus
     * @apiGroup Contractstatus
     * @apiParam (x-www-form-urlencoded) {string} name Contractstatus's name
     * @apiParam (x-www-form-urlencoded) {number} order Contractstatus's order in UI
     * @apiUse ContractstatusResponse
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new ContractstatusResource(Contractstatus::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /contractstatuses/:id Request Contractstatus information
     * @apiName GetContractstatus
     * @apiGroup Contractstatus
     * @apiParam (url) {number} id Contractstatus's unique id
     * @apiUse ContractstatusResponse
     *
     * @param  \App\Models\Contractstatus  $contractstatus
     * @return \Illuminate\Http\Response
     */
    public function show(Contractstatus $contractstatus)
    {
        return new ContractstatusResource($contractstatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /contractstatuses/:id Update Contractstatus information
     * @apiName UpdateContractstatus
     * @apiGroup Contractstatus
     * @apiParam (url) {number} id Contractstatus's unique id
     * @apiParam (x-www-form-urlencoded) {string} name Contractstatus's name
     * @apiParam (x-www-form-urlencoded) {number} order Contractstatus's order in UI
     * @apiUse ContractstatusResponse
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contractstatus  $contractstatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contractstatus $contractstatus)
    {
        if ($contractstatus->update($request->validated())) {
            return new ContractstatusResource($contractstatus);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /contractstatuses/:id Delete Contractstatus
     * @apiName DeleteContractstatus
     * @apiGroup Contractstatus
     * @apiParam (url) {number} id Contractstatus's unique id
     * @apiUse ContractstatusResponse
     *
     * @param  \App\Models\Contractstatus  $contractstatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contractstatus $contractstatus)
    {
        if ($contractstatus->delete()) {
            return new ContractstatusResource($contractstatus);
        }
    }
}
