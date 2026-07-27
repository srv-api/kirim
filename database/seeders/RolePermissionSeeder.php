<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $roles = ['superadmin', 'admin', 'user'];
        foreach($roles as $roleName){
            Role::firstOrCreate(['name'=>$roleName]);
        }

        // Permissions
        $permissions = [
            'product.create','product.view','product.edit','product.delete',
            'user.manage','role.manage','permission.manage','employee.manage',
            // Tambahan ZKTeco
            'zkteco.view','zkteco.sync','zkteco.test','zkteco.add_user'
        ];
        foreach($permissions as $perm){
            Permission::firstOrCreate(['name'=>$perm]);
        }

        // Assign permissions
        Role::where('name','superadmin')->first()->syncPermissions(Permission::all());
        Role::where('name','admin')->first()->syncPermissions([
            'product.create','product.view','product.edit','product.delete',
            'user.manage','role.manage','permission.manage',
            // Berikan akses ZKTeco ke admin
            'zkteco.view','zkteco.sync','zkteco.test','zkteco.add_user'
        ]);
        Role::where('name','user')->first()->syncPermissions([
            'product.view'
        ]);

        // Admin User
        $admin = User::firstOrCreate(
            ['email'=>'admin@gmail.com'],
            ['name'=>'Admin HR','password'=>Hash::make('123456')]
        );
        $admin->assignRole('admin');
    }
}