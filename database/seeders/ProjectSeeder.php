<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::all();

        for ($i = 0; $i < 10; $i++) {
            Project::create([
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph(4),
            ]);

            DB::table('user_project')->insert([
                'user_id' => $users->random()->id,
                'project_id' => $i + 1,
            ]);
        }
    }
}
