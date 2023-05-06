<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Item;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post1 = new Item;
        $post1->title = "Hi guys";
        $post1->content = "New here, hello!";
        $post1->save();

        $post2 = new Item;
        $post2->title = "It me";
        $post2->content = "It be me";
        $post2->save();

        Item::factory()->count(20)->create();
    }
}
