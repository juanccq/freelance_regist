<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\TrackingTime;
use App\Models\Task;
use App\Models\User;

class TrackingTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $tasks = Task::all();
        $users = User::all();

        if ($tasks->count() === 0) {
            $this->command->warn('No tasks found, skipping tracking time seeding');
            return;
        }

        if ($users->count() === 0) {
            $this->command->warn('No users found, skipping tracking time seeding');
            return;
        }

        foreach ($tasks as $task) {
            for ($i = 0; $i < rand(4, 18); $i++) {
                TrackingTime::create([
                    'task_id' => $task->id,
                    'user_id' => $users->random()->id,
                    'date' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                    'duration_minutes' => $faker->numberBetween(5, 320),
                ]);
            }
        }
    }
}
