<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Question extends Model
{
    protected $table = 'questions';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'assessment_id',
        'question',
        'type',
        'score',
        'order',
        'correct_answer',
        'image',
    ];

    protected static function booted(): void
    {
        static::creating(function ($question) {

            if (!$question->id) {

                do {

                    $id = strtoupper(
                        Str::random(6)
                    );

                } while (
                    static::where('id', $id)->exists()
                );

                $question->id = $id;
            }

        });
    }

    public function assessment(): BelongsTo
    {
        return $this->belongsTo(
            Assessment::class,
            'assessment_id'
        );
    }

    public function options(): HasMany
    {
        return $this->hasMany(
            QuestionOption::class,
            'question_id'
        );
    }
}