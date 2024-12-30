<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TournamentUser extends Model
{
    protected $fillable = [
        "name",
        "email",
        "tournament_id",
    ];

    /**
     * Get the tournament that owns the TournamentUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }
}
