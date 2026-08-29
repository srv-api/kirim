<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssessmentResult extends Model
{
    protected $table = 'assessment_results';

    protected $fillable = [
        'assessment_id',
        'participant_id',
        'score',
        'total_questions',
        'correct_answers',
        'status',
        'answers',
    ];

    protected $casts = [
        'answers' => 'array',
        'score' => 'decimal:2',
    ];

    public function assessment(): BelongsTo
    {
        return $this->belongsTo(
            Assessment::class,
            'assessment_id'
        );
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(
            Participant::class,
            'participant_id'
        );
    }
}