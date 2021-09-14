<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
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
        // User::factory(10)->create();
        Book::factory(20)->create();

        $this->call(WriterTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(PermissionTableSeeder::class);
       
    }
}
