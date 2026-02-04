<?php

namespace Database\Seeders;

use App\Models\Sections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\{ProjectsSeeder, UserSeeder};

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProjectsSeeder::class,
            ServiceSeeder::class,
            NewsSeeder::class,
            MediaSeeder::class,
            StatisticsSeeder::class,
            SuccessPartnersSeeder::class,
            SuccessStoriesSeeder::class,

            UserSeeder::class,
        ]);
    }
}
