<?php

namespace App\Models;

use App\Models\CampusCampusRanking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CampusRanking extends Model
{
    use HasFactory, SoftDeletes;

    public function campus_rankings(): HasMany
    {
        return $this->hasMany(CampusCampusRanking::class);
    }
}
