<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Assessment extends Model
{
    protected $table = 'assessments';

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'slug',
        'description',
        'category',
        'duration',
        'passing_score',
        'pin',
        'image',
        'status',
        'start_at',
        'end_at',
        'timezone',
    ];

    /*
    |--------------------------------------------------------------------------
    | ID CONFIGURATION
    |--------------------------------------------------------------------------
    */

    public $incrementing = false;

    protected $keyType = 'string';

    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'passing_score' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | BOOT
    |--------------------------------------------------------------------------
    |
    | Generate ID random 10 karakter.
    |
    | Contoh:
    | CKYY35NPGL
    |
    */

    protected static function booted(): void
    {
        static::creating(function ($assessment) {

            if (!$assessment->id) {

                do {

                    $id = strtoupper(
                        Str::random(10)
                    );

                } while (
                    static::where('id', $id)->exists()
                );

                $assessment->id = $id;
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | USER / PEMBUAT ASSESSMENT
    |--------------------------------------------------------------------------
    */

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | QUESTIONS
    |--------------------------------------------------------------------------
    */

    public function questions(): HasMany
    {
        return $this->hasMany(
            Question::class,
            'assessment_id'
        );
    }
}