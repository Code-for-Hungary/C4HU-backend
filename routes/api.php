<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractstatusController;
use App\Http\Controllers\ContributorController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectownerController;
use App\Http\Controllers\ProjectstatusController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillgroupController;
use App\Http\Controllers\SkilllevelController;
use App\Http\Controllers\TypeController;
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

Route::get('/contributors', [ContributorController::class, 'index']);
Route::get('/contributors/{contributor}', [ContributorController::class, 'show']);
Route::post('/contributors', [ContributorController::class, 'store']);
Route::put('/contributors/{contributor}', [ContributorController::class, 'update']);
Route::delete('/contributors/{contributor}', [ContributorController::class, 'destroy']);

Route::get('/projectowners', [ProjectownerController::class, 'index']);
Route::get('/projectowners/{projectowner}', [ProjectownerController::class, 'show']);
Route::post('/projectowners', [ProjectownerController::class, 'store']);
Route::put('/projectowners/{projectowner}', [ProjectownerController::class, 'update']);
Route::delete('/projectowners/{projectowner}', [ProjectownerController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

Route::get('/types', [TypeController::class, 'index']);
Route::get('/types/{type}', [TypeController::class, 'show']);
Route::post('/types', [TypeController::class, 'store']);
Route::put('/types/{type}', [TypeController::class, 'update']);
Route::delete('/types/{type}', [TypeController::class, 'destroy']);

Route::get('/skills', [SkillController::class, 'index']);
Route::get('/skills/{skill}', [SkillController::class, 'show']);
Route::post('/skills', [SkillController::class, 'store']);
Route::put('/skills/{skill}', [SkillController::class, 'update']);
Route::delete('/skills/{skill}', [SkillController::class, 'destroy']);

Route::get('/skillgroups', [SkillgroupController::class, 'index']);
Route::get('/skillgroups/{skillgroup}', [SkillgroupController::class, 'show']);
Route::post('/skillgroups', [SkillgroupController::class, 'store']);
Route::put('/skillgroups/{skillgroup}', [SkillgroupController::class, 'update']);
Route::delete('/skillgroups/{skillgroup}', [SkillgroupController::class, 'destroy']);

Route::get('/skilllevels', [SkilllevelController::class, 'index']);
Route::get('/skilllevels/{skilllevel}', [SkilllevelController::class, 'show']);
Route::post('/skilllevels', [SkilllevelController::class, 'store']);
Route::put('/skilllevels/{skilllevel}', [SkilllevelController::class, 'update']);
Route::delete('/skilllevels/{skilllevel}', [SkilllevelController::class, 'destroy']);

Route::get('/projectstatuses', [ProjectstatusController::class, 'index']);
Route::get('/projectstatuses/{projectstatus}', [ProjectstatusController::class, 'show']);
Route::post('/projectstatuses', [ProjectstatusController::class, 'store']);
Route::put('/projectstatuses/{projectstatus}', [ProjectstatusController::class, 'update']);
Route::delete('/projectstatuses/{projectstatus}', [ProjectstatusController::class, 'destroy']);

Route::get('/contractstatuses', [ContractstatusController::class, 'index']);
Route::get('/contractstatuses/{contractstatus}', [ContractstatusController::class, 'show']);
Route::post('/contractstatuses', [ContractstatusController::class, 'store']);
Route::put('/contractstatuses/{contractstatus}', [ContractstatusController::class, 'update']);
Route::delete('/contractstatuses/{contractstatus}', [ContractstatusController::class, 'destroy']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::put('/projects/{project}', [ProjectController::class, 'update']);
Route::delete('/projects/{project}', [ProjectController::class, 'destroy']);
