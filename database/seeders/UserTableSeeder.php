<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'id' => 1,
                'name' => 'Mofeoluwa',
                'role_id' => 1,
                'email' => 'james@gmail.com',
                'password' => '$2y$10$gnHeL/NuHF6A2Swt1.lQY.I9y1CbSYlXqIx2GOziyO7.x6gkUDqy.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'Emma',
                'role_id' => 2,
                'email' => 'emmasimons141@gmail.com',
                'password' => '$2y$10$gnHeL/NuHF6A2Swt1.lQY.I9y1CbSYlXqIx2GOziyO7.x6gkUDqy.',
                'created_at' => now(),
                'updated_at' => now()
            ],

            

            ]);
    }
}
