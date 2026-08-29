<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RolePermissionSeeder::class,
            RolePermissionSeeder::class, // wajib ada ini
            RoleSeeder::class, // wajib ada ini
            UserSeeder::class, // wajib ada ini
        ]);
    }
}
