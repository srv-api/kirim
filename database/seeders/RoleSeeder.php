<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['Superadmin', 'Admin HR', 'Karu/Kanit/Kadiv/Koord, PJ'];
        foreach($roles as $role){
            Role::firstOrCreate(['name' => $role]);
        }
    }
}