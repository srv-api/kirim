<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TugGame extends Model
{
    protected $table = 'tug_games';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'player_one',
        'player_two',
        'duration',
    ];

    protected $casts = [
        'duration' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($game) {
            if (empty($game->id)) {
                $game->id = self::generateId();
            }
        });
    }

    public static function generateId(): string
    {
        do {
            $id = strtoupper(Str::random(8));
        } while (self::where('id', $id)->exists());

        return $id;
    }
}