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

        $user = User::factory()->create([
            'name' => 'Juan Perez'
        ]);

        Post::factory(3)->create([
            'user_id' => $user->id
        ]);

        Post::factory(10)->create();

        

    }
}
