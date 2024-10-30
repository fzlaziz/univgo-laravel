<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class CampusRanking extends Model
{
    use HasFactory;

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }
}
