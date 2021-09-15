<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create();

         Category::create([
             'name' => 'Personal',
             'slug' => 'personal'

         ]);
         Category::create([
            'name' => 'Work',
            'slug' => 'work'

        ]);
        Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies'

        ]);

    }
}
