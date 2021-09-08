<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'user',
                'display_name' => 'User'
            ],

            [
                'id' => 2,
                'name' => 'admin',
                'display_name' => 'Admin'
            ]
            ]);
    }
}
