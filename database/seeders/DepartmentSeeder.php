<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'Ambulans',
            'CSSD',
            'Cafe',
            'Casemix',
            'Cleaning Service',
            'Direktur RS',
            'Duty Manager dan MPP',
            'Farmasi',
            'IBS & CSSD',
            'ICU',
            'ICU/NICU/Perinatologi',
            'IPSRS',
            'Instalasi Gawat Darurat',
            'Kamar Bersalin & Nifas',
            'Kasir',
            'Keperawatan',
            'Kesekretariatan dan Legal',
            'Keuangan',
            'Laboratorium',
            'Laundry',
            'MOD & MPP',
            'Medical Service',
            'NICU Perinatologi',
            'Pemasaran dan Manajemen Pelanggan',
            'Pendaftaran & Pusat Informasi',
            'Pengadaan dan Manajemen Aset',
            'Poliklinik',
            'Pramukantor',
            'Radiologi',
            'Ranap Dewasa dan Anak',
            'Rehabilitasi Medik',
            'Rekam Medis',
            'SDM dan Diklat',
            'Security',
            'Teknologi & Informasi',
            'Unit Gizi'
        ];

        foreach($departments as $dept){
            Department::firstOrCreate(['name' => $dept]);
        }
    }
}