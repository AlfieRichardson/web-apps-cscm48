<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comment1 = new Comment;
        $comment1->post_id = 2;
        $comment1->user_id = 1;
        $comment1->content = "We need to nuke the site from orbit. It's the only way to be sure.";
        $comment1->save();

        $comment2 = new Comment;
        $comment2->post_id = 1;
        $comment2->user_id = 2;
        $comment2->content = "I must not fear. Fear is the mind-killer. Fear is the little-death that brings total obliteration. I will face my fear. I will permit it to pass over me and through me. And when it has gone past I will turn the inner eye to see its path. Where the fear has gone there will be nothing. Only I will remain.";
        $comment2->save();

        Comment::factory()->count(200)->create();
    }
}
