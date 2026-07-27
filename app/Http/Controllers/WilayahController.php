<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WilayahController extends Controller
{
    public function regencies($provinceId)
    {
        return DB::table('regencies')
            ->where('province_id', $provinceId)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    public function districts($regencyId)
    {
        return DB::table('subdistrics')
            ->where('regency_id', $regencyId)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    public function villages($districtId)
    {
        return DB::table('villages')
            ->where('subdistrict_id', $districtId)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
    }
}
