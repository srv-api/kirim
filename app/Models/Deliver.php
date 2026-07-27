<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    // nama tabel (karena bukan plural default "delivers")
    protected $table = 'deliver';

    // kolom yang boleh di-mass assign
    protected $fillable = [
        'sender_name',
        'sender_phone',
        'receiver_name',
        'receiver_phone',
        'receiver_province_id',
        'receiver_regency_id',
        'receiver_district_id',
        'receiver_village_id',
        'receiver_postal',
        'receiver_notes',
        'status',
        'weight',
        'volumetric_weight',
        'final_weight',
        'price_per_kg',
        'total_cost',
    ];

    /* ================= RELATIONS ================= */

    public function province()
    {
        return $this->belongsTo(Province::class, 'receiver_province_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'receiver_regency_id');
    }

    public function district()
    {
        return $this->belongsTo(Subdistrict::class, 'receiver_district_id');
        // sesuaikan nama model jika: Subdistrict / Subdistric
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'receiver_village_id');
    }

    /* ================= ACCESSOR ================= */

    // alamat lengkap
    public function getAddressAttribute()
    {
        return implode(', ', array_filter([
            optional($this->village)->name,
            optional($this->district)->name,
            optional($this->regency)->name,
            optional($this->province)->name,
        ]));
    }
}
