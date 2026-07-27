<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobLevel;

class JobLevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            'Staff Pelaksana',
            'Non Staff',
            'Div. Head',
            'Karu./Kanit./Koord.',
            'Manager',
            'Supervisor',
            'Konsultan',
            'Direktur',
            'Pj. Shift',
            'Komisaris',
            'BOE',
            'BOD',
            'Pj'
        ];

        foreach ($levels as $level) {
            JobLevel::firstOrCreate(['name' => $level]);
        }
    }
}