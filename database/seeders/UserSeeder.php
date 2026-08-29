<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'name' => 'Admin',
                'whatsapp' => '081234567890',
                'password' => Hash::make('123456'),
            ]
        );

        $user->syncRoles([
            'owner',
        ]);
    }
}