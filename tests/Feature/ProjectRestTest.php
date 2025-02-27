<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Project;

class ProjectRestTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_project(): void
    {
        $user = $this->createUser();
        $response = $this->loginAndAssertUser($user);
        $token = $response->json('access_token');

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->post('/api/projects', [
                'name' => 'Test project',
                'description' => 'project description'
            ]);

        $response->assertStatus(201);
        $response->assertJson([
            'project' => [
                'name' => 'Test project',
                'description' => 'project description'
            ]
        ]);
    }

    public function test_list_projects(): void
    {
        $project = $this->createProject();
        $user = $this->createUser();
        $response = $this->loginAndAssertUser($user);
        $token = $response->json('access_token');

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->get('/api/projects');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'current_page',
            'data',
            'total'
        ]);

        $response->assertJson([
            'data' => [
                [
                    'id' => $project->id,
                    'name' => $project->name
                ]
            ]
        ]);

        // dd($response->json());
    }

    public function test_project_detail(): void
    {
        $project = $this->createProject();
        $user = $this->createUser();
        $response = $this->loginAndAssertUser($user);
        $token = $response->json('access_token');

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->get('/api/projects/' . $project->id);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'name',
            'description'
        ]);

        $response->assertJson([
            'id' => $project->id,
            'name' => $project->name,
            'description' => $project->description
        ]);
    }

    public function test_project_update(): void
    {
        $project = $this->createProject();
        $user = $this->createUser();
        $response = $this->loginAndAssertUser($user);
        $token = $response->json('access_token');

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->put('/api/projects/' . $project->id, [
                'name' => 'Edited project',
                'description' => 'Edited description'
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'name' => 'Edited project',
            'description' => 'Edited description'
        ]);
    }

    public function test_project_delete(): void
    {
        $project = $this->createProject();
        $user = $this->createUser();
        $response = $this->loginAndAssertUser($user);
        $token = $response->json('access_token');

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->delete('/api/projects/' . $project->id);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Project deleted successfully'
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
