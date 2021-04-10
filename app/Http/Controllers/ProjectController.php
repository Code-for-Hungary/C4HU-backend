<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @api {get} /projects Request Project index
     * @apiName GetProjectIndex
     * @apiGroup Project
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProjectResource::collection(Project::paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /projects Create Project
     * @apiName CreateProject
     * @apiGroup Project
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @api {get} /projects/:id Request Project information
     * @apiName GetProject
     * @apiGroup Project
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /projects/:id Update Project information
     * @apiName UpdateProject
     * @apiGroup Project
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /projects/:id Delete Project
     * @apiName DeleteProject
     * @apiGroup Project
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
