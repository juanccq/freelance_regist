<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\TrackingTime;

class TrackingTimeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_access_dashboard(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_user_access_new_time_entry(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/dashboard/tracking/create');

        $response->assertStatus(200);
    }

    public function test_project_is_available_on_create_timetrack(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create([
            'name' => 'Test project'
        ]);
        $user->projects()->sync($project->id);

        $response = $this->actingAs($user)->get('/dashboard/tracking/create');
        // dump($response->content());
        $response->assertSee('<select name="project_id"', false);
        $response->assertSee('<option value="' . $project->id . '"', false);
        $response->assertSee('Test project');

        $response->assertStatus(200);
    }

    public function test_task_is_available_on_create_timetrack(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create([
            'name' => 'Test project'
        ]);
        $user->projects()->sync($project->id);
        $task = Task::factory()->create([
            'name' => 'Test task',
            'project_id' => $project->id
        ]);

        $response = $this->actingAs($user)->get('/dashboard/tracking/create');
        // dump($response->content());
        $response->assertSee('<select name="task_id"', false);
        $response->assertSee('<option value="' . $task->id . '"', false);
        $response->assertSee('Test task');

        $response->assertStatus(200);
    }

    public function test_create_task_successful(): void
    {
        $project = $this->createProject();
        $user = $this->createUser($project);
        $task = $this->createTask($project);

        $trackingTime = [
            'task_id' => $task->id,
            'user_id' => $user->id,
            'duration_minutes' => 15,
            'date' => date_format(now(), 'Y-m-d'),
        ];

        $response = $this->actingAs($user)->post('/dashboard/tracking/store', $trackingTime);
        $lastTime = TrackingTime::latest()->first();

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas('tracking_time', $trackingTime);
        $lastTime = TrackingTime::latest()->first();
        $this->assertEquals($trackingTime['duration_minutes'], $lastTime->duration_minutes);
    }

    public function test_delete_task_successful(): void
    {
        $project = $this->createProject();
        $user = $this->createUser($project);
        $task = $this->createTask($project);
        $trackingTime = $this->createTrackingTime($task, $user);

        $response = $this->actingAs($user)->post('/dashboard/tracking/' . $trackingTime->id);
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 200
        ]);
    }

    private function createTrackingTime($task, $user)
    {
        return TrackingTime::factory()->create([
            'task_id' => $task->id,
            'user_id' => $user->id,
            'duration_minutes' => 15,
            'date' => date_format(now(), 'Y-m-d'),
        ]);
    }

    private function createProject()
    {
        return Project::factory()->create([
            'name' => 'Test project'
        ]);
    }

    private function createUser(Project|null $project)
    {
        $user = User::factory()->create();
        if ($project) {
            $user->projects()->sync($project->id);
        }
        return $user;
    }

    private function createTask(Project $project)
    {
        return Task::factory()->create([
            'name' => 'Test task',
            'project_id' => $project->id
        ]);
    }
}
