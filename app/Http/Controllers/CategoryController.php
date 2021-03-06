<?php
/**
 * @apiDefine CategoryResponse
 * @apiSuccess {number} id Category's unique id
 * @apiSuccess {string} name Category's name
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *      {
 *          "data": {
 *              "id": 2,
 *              "name": "Politika"
 *          }
 *      }
 */
namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @api {get} /categories Request Category index
     * @apiSampleRequest off
     * @apiName GetCategoryIndex
     * @apiGroup Category
     * @apiSuccess {Object[]} data List of categories
     * @apiSuccess {number} id Category's unique id
     * @apiSuccess {string} name Category's name
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data": [
     *              {
     *                  "id": 1,
     *                  "name": "Gazdaság"
     *              },
     *              {
     *                  "id": 2,
     *                  "name": "Politika"
     *              }
     *          ]
     *      }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /categories Create Category
     * @apiSampleRequest off
     * @apiName CreateCategory
     * @apiGroup Category
     * @apiParam (body) {string} name Category's name
     * @apiUse CategoryResponse
     *
     * @param  CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        return new CategoryResource(Category::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /categories/:id Request Category information
     * @apiSampleRequest off
     * @apiName GetCategory
     * @apiGroup Category
     * @apiParam (url) {number} id Category's unique id
     * @apiUse CategoryResponse
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /categories/:id Update Category information
     * @apiSampleRequest off
     * @apiName UpdateCategory
     * @apiGroup Category
     * @apiParam (url) {number} id Category's unique id
     * @apiParam (body) {string} name Category's name
     * @apiUse CategoryResponse

     * @param  CategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if ($category->update($request->validated())) {
            return new CategoryResource($category);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /categories/:id Delete Category
     * @apiSampleRequest off
     * @apiName DeleteCategory
     * @apiGroup Category
     * @apiParam (url) {number} id Category's unique id
     * @apiUse CategoryResponse
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return new CategoryResource($category);
        }
    }
}
