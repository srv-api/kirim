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
        // =====================================================
        // ROLES
        // =====================================================

        $roles = [
            'superadmin',
            'admin',
            'user',
            'owner',
        ];

        foreach ($roles as $roleName) {

            Role::firstOrCreate([
                'name' => $roleName,
            ]);

        }


        // =====================================================
        // PERMISSIONS
        // =====================================================

        $permissions = [

            'product.create',
            'product.view',
            'product.edit',
            'product.delete',

            'user.manage',
            'role.manage',
            'permission.manage',

            'employee.manage',

            // Assessment
            'assessment.create',
            'assessment.view',
            'assessment.edit',
            'assessment.delete',

            // Question
            'question.create',
            'question.view',
            'question.edit',
            'question.delete',

            // Participant
            'participant.create',
            'participant.view',
            'participant.edit',
            'participant.delete',

            // Result
            'result.view',

        ];


        foreach ($permissions as $permissionName) {

            Permission::firstOrCreate([
                'name' => $permissionName,
            ]);

        }


        // =====================================================
        // SUPERADMIN
        // =====================================================

        $superadminRole = Role::where(
            'name',
            'superadmin'
        )->first();

        $superadminRole->syncPermissions(
            Permission::all()
        );


        // =====================================================
        // ADMIN
        // =====================================================

        $adminRole = Role::where(
            'name',
            'admin'
        )->first();

        $adminRole->syncPermissions([

            'product.create',
            'product.view',
            'product.edit',
            'product.delete',

            'user.manage',
            'role.manage',
            'permission.manage',

        ]);


        // =====================================================
        // USER
        // =====================================================

        $userRole = Role::where(
            'name',
            'user'
        )->first();

        $userRole->syncPermissions([

            'product.view',

        ]);


        // =====================================================
        // OWNER
        // =====================================================

        $ownerRole = Role::where(
            'name',
            'owner'
        )->first();

        $ownerRole->syncPermissions([

            'product.create',
            'product.view',
            'product.edit',
            'product.delete',

            'assessment.create',
            'assessment.view',
            'assessment.edit',
            'assessment.delete',

            'question.create',
            'question.view',
            'question.edit',
            'question.delete',

            'participant.create',
            'participant.view',
            'participant.edit',
            'participant.delete',

            'result.view',

        ]);


        // =====================================================
        // OWNER ACCOUNT
        // =====================================================

$owner = User::updateOrCreate(
    [
        'email' => 'admin@gmail.com',
    ],
    [
        'name' => 'Admin',
        'whatsapp' => '081234567890',
        'password' => Hash::make('123456'),
        'referral_code' => 'ADMIN001',
    ]
);

$owner->syncRoles([
    'owner',
]);


        // Pastikan data WhatsApp tetap tersedia
        if (!$owner->whatsapp) {

            $owner->whatsapp = '081234567890';

            $owner->save();

        }


        // Pastikan role owner
        $owner->syncRoles([
            'owner',
        ]);
    }
}
