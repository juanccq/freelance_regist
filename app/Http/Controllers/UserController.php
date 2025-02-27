<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\Filterable;
use App\Http\Requests\AssignUserProjectRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    use Filterable;

    public function index(Request $request)
    {
        $this->searchableFields = ['title'];
        $this->pivotSearch = ['modes' => 'name'];
        $this->checkFiltersAndSort($request, 'title');


        $users = User::select('id', 'name', 'email', 'is_admin');

        $users = $this->applyFilters($users);
        $response = $users->toArray();

        return response()->json($response);
    }

    public function projectAssign(AssignUserProjectRequest $request)
    {
        $user = User::find($request->user_id);
        $user->projects()->sync($request->projects);

        return response()->json(['message' => 'Projects assigned successfully']);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return response()->json($user);
    }

    public function show(User $user)
    {
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}
