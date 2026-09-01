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

        'type',

        'score',

        'option_a',
        'option_b',
        'option_c',
        'option_d',

        'correct_answer',

        'pull_power',
        'wrong_pull_power',

        'image',

        'order',

        'is_active',

        'time_limit',
    ];


    protected $casts = [

        'is_active' => 'boolean',

        'order' => 'integer',

        'score' => 'integer',

        'pull_power' => 'integer',

        'wrong_pull_power' => 'integer',

        'time_limit' => 'integer',

    ];


    /**
     * Generate ID otomatis
     */
    protected static function boot()
    {
        parent::boot();


        static::creating(function ($model) {

            if (empty($model->id)) {

                $model->id =
                    strtoupper(
                        Str::random(8)
                    );

            }

        });
    }


    /**
     * Ambil semua pilihan jawaban
     */
    public function getOptionsAttribute()
    {
        return array_values(
            array_filter([
                $this->option_a,
                $this->option_b,
                $this->option_c,
                $this->option_d,
            ], function ($option) {

                return $option !== null &&
                       $option !== '';

            })
        );
    }


    /**
     * Ambil index jawaban benar
     */
    public function getCorrectIndexAttribute()
    {
        $options = $this->options;


        foreach ($options as $index => $option) {

            if ($option === $this->correct_answer) {

                return $index;

            }

        }


        return null;
    }
}
