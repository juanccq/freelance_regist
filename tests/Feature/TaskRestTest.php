<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;

class TaskRestTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_task(): void
    {
        $project = $this->createProject();
        $user = $this->createUser();
        $response = $this->loginAndAssertUser($user);
        $token = $response->json('access_token');

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->post('/api/tasks', [
                'name' => 'Test task',
                'description' => 'task description',
                'project_id' => $project->id
            ]);

        $response->assertStatus(201);
        $response->assertJson([
            'task' => [
                'name' => 'Test task',
                'description' => 'task description',
                'project_id' => $project->id
            ]
        ]);
    }

    public function test_list_tasks(): void
    {
        $project = $this->createProject();
        $task = $this->createTask($project);
        $user = $this->createUser();
        $response = $this->loginAndAssertUser($user);
        $token = $response->json('access_token');

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->get('/api/tasks');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'current_page',
            'data',
            'total'
        ]);

        $response->assertJson([
            'data' => [
                [
                    'id' => $task->id,
                    'name' => $task->name,
                    'description' => $task->description
                ]
            ]
        ]);
    }

    public function test_task_detail(): void
    {
        $project = $this->createProject();
        $task = $this->createTask($project);
        $user = $this->createUser();
        $response = $this->loginAndAssertUser($user);
        $token = $response->json('access_token');

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->get('/api/tasks/' . $task->id);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'name',
            'project_id'
        ]);

        $response->assertJson([
            'id' => $task->id,
            'name' => $task->name,
            'description' => $task->description,
            'project_id' => $task->id
        ]);
    }

    public function test_task_update(): void
    {
        $project = $this->createProject();
        $task = $this->createTask($project);
        $user = $this->createUser();
        $response = $this->loginAndAssertUser($user);
        $token = $response->json('access_token');

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->put('/api/tasks/' . $task->id, [
                'name' => 'Edited task',
                'description' => 'Edited description'
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'name' => 'Edited task',
            'description' => 'Edited description'
        ]);
    }

    public function test_task_delete(): void
    {
        $project = $this->createProject();
        $task = $this->createTask($project);
        $user = $this->createUser();
        $response = $this->loginAndAssertUser($user);
        $token = $response->json('access_token');

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->delete('/api/tasks/' . $project->id);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Task deleted successfully'
        ]);
    }

    private function createTask($project)
    {
        return Task::factory()->create([
            'name' => 'Test task',
            'description' => 'task description',
            'project_id' => $project->id
        ]);
    }

    private function createProject()
    {
        return Project::factory()->create([
            'name' => 'Test project',
            'description' => 'project description'
        ]);
    }

    private function loginAndAssertUser(User $user)
    {
        $response = $this->loginUser($user);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'user' => ['name', 'email', 'is_admin'],
            'access_token'
        ]);

        return $response;
    }

    private function loginUser(User $user)
    {
        return $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
    }

    private function createUser()
    {
        return User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
    }
}
