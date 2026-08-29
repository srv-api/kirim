<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class QuestionOption extends Model
{
    protected $table = 'question_options';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'question_id',
        'label',
        'option_text',
        'is_correct',
        'order',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($option) {

            if (!$option->id) {

                do {
                    $id = strtoupper(
                        Str::random(6)
                    );
                } while (
                    static::where('id', $id)->exists()
                );

                $option->id = $id;
            }
        });
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(
            Question::class,
            'question_id'
        );
    }
}