<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Filterable;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    use Filterable;

    public function index(Request $request)
    {
        $this->searchableFields = ['name', 'description'];
        $this->checkFiltersAndSort($request, 'name');

        $tasks = Task::select('id', 'name', 'description')
            ->orderBy('id');
        // $tasks = $tasks->with([
        //     'project:id,name,description'
        // ]);

        $tasks = $this->applyFilters($tasks);
        $response = $tasks->toArray();

        return response()->json($response);
    }

    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();

        $task = Task::create($data);

        return response()->json(['project' => $task], 201);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $data = $request->validated();

        $task->update($data);

        return response()->json($task);
    }

    public function show(Task $task)
    {
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        return response()->json($task);
    }


    public function destroy(Task $task)
    {
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
