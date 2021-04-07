<?php

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProjectResource;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', function() {
    return CategoryResource::collection(Category::paginate(3));
});

Route::get('/categories/{id}', function($id) {
    return new CategoryResource(Category::findOrFail($id));
});

Route::get('/projects', function() {
    return ProjectResource::collection(Project::paginate(3));
});

Route::get('/projects/{id}', function($id) {
    return new ProjectResource(Project::findOrFail($id));
});
