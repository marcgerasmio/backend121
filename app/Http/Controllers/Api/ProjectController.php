<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }
    public function store(ProjectRequest $request)
    {
        $validated = $request->validated();
        $project = Project::create($validated);
        return $project;
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return $project;
    }
    public function destroyall()
    {
        Project::query()->delete();
        return 'Delete All Successfully';
    }

}
