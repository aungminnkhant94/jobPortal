<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(20)->create();

        \App\Models\Company::factory(20)->create();

        \App\Models\Job::factory(20)->create();

        \App\Models\Category::factory()->create([
            "name" => "Technology",
        ]);

        \App\Models\Category::factory()->create([
            "name" => "Engineering",
        ]);

        \App\Models\Category::factory()->create([
            "name" => "Government",
        ]);

        \App\Models\Category::factory()->create([
            "name" => "Medical",
        ]);

        \App\Models\Category::factory()->create([
            "name" => "Construction",
        ]);

        \App\Models\Category::factory()->create([
            "name" => "Software" ,
        ]);
    }
}
