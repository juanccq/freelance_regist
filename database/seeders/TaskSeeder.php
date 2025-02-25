<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Task;
use App\Models\Project;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $projects = Project::all();

        if ($projects->count() === 0) {
            $this->command->warn('No projects found, skipping task seeding');
            return;
        }

        foreach ($projects as $project) {
            for ($i = 0; $i < rand(4, 8); $i++) {
                Task::create([
                    'name' => $faker->sentence(3),
                    'description' => $faker->paragraph(4),
                    'project_id' => $project->id,
                ]);
            }
        }
    }
}
