<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Participant extends Model
{
    protected $table = 'participants';

    protected $fillable = [
        'name',
        'email',
        'whatsapp',
    ];

    public function results(): HasMany
    {
        return $this->hasMany(
            AssessmentResult::class,
            'participant_id'
        );
    }
}