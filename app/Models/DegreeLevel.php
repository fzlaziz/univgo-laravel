<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DegreeLevel extends Model
{
    /** @use HasFactory<\Database\Factories\DegreeLevelFactory> */
    use HasFactory, SoftDeletes;

    public function campuses(): BelongsToMany
    {
        return $this->belongsToMany(Campus::class);
    }
}
