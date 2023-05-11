<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new User;
        $user1->name = "Glados";
        $user1->email = "glados@aperture.com";
        $user1->email_verified_at = now();
        $user1->password = bcrypt("glados");
        $user1->remember_token = "asdfghjkl";
        $user1->admin = True;
        $user1->save();

        $user1 = new User;
        $user1->name = "Chell";
        $user1->email = "chell@aperture.com";
        $user1->email_verified_at = now();
        $user1->password = bcrypt("ratman");
        $user1->remember_token = "qwertyuiop";
        $user1->admin = False;
        $user1->save();

        User::factory()->count(5)->create();
    }
}
