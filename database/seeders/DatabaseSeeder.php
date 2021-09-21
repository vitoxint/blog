<?php

namespace Database\Seeders;

use App\Models\Post;
use \App\Models\User;
use App\Models\Category;
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

        User::truncate();
        Category::truncate();
        Post::truncate();


        Post::factory(5)->create();

        

    }
}
