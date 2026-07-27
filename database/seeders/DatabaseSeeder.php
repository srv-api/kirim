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
            ShiftTemplateSeeder::class,
            RolePermissionSeeder::class,
            DepartmentSeeder::class, // wajib ada ini
            JobLevelSeeder::class, // wajib ada ini
            RolePermissionSeeder::class, // wajib ada ini
            RoleSeeder::class, // wajib ada ini
            UserSeeder::class, // wajib ada ini
        ]);
    }
}
