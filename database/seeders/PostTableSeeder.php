<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post1 = new Post;
        $post1->user_id = 1;
        $post1->title = "Hi guys";
        $post1->content = "New here, hello!";
        $post1->save();

        $post2 = new Post;
        $post2->user_id = 2;
        $post2->title = "It me";
        $post2->content = "It be me";
        $post2->save();

        Post::factory()->count(20)->create();
    }
}
