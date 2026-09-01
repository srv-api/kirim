<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TugQuestion extends Model
{
    protected $table = 'tug_questions';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'order',
        'is_active',
        'time_limit',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'time_limit' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            if (empty($model->id)) {
                $model->id = strtoupper(Str::random(8));
            }
        });
    }
}