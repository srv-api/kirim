<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'user_id',
        'name',
        'timestamp',
        'type',
        'status',
        'verify_type'
    ];

    protected $casts = [
        'timestamp' => 'datetime'
    ];
}