<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Traits\Filterable;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    use Filterable;

    public function index(Request $request)
    {
        $this->searchableFields = ['name', 'description'];
        $this->checkFiltersAndSort($request, 'name');


        $projects = Project::select('id', 'name', 'description');
        $projects = $projects->with([
            'tasks:id,name,description,project_id'
        ]);

        $projects = $this->applyFilters($projects);
        $response = $projects->toArray();

        return response()->json($response);
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $project = Project::create($data);

        return response()->json(['project' => $project], 201);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $project->update($data);

        return response()->json($project);
    }

    public function show(Project $project)
    {
        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }

        return response()->json($project);
    }


    public function destroy(Project $project)
    {
        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }

        $project->delete();

        return response()->json(['message' => 'Project deleted successfully']);
    }
}
