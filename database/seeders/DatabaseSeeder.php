<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Sleeps\Sleep::factory(1000)->create();
        \App\Models\Diapers\Diaper::factory(439)->create();
        \App\Models\Eats\Eat::factory(1000)->create();
        \App\Models\Walks\Walk::factory(1000)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
