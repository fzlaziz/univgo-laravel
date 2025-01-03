<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryFactory> */
    use HasFactory, SoftDeletes;

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }

}
