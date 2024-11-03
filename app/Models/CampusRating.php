<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class CampusRating extends Model
{
    /** @use HasFactory<\Database\Factories\CampusRatingFactory> */
    use HasFactory, SoftDeletes;

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }
}
