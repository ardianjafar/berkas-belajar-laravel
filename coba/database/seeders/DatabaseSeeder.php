<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Category::create([
            'name'  => 'Programming',
            'slug'  => 'programming',
        ]);
        Category::create([
            'name'  => 'Web Design',
            'slug'  => 'web-design',
        ]);
        Category::create([
            'name'  => 'Multimedia',
            'slug'  => 'multimedia',
        ]);
        Post::factory(20)->create();
    }
}
