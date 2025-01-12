<?php

namespace App\Models;

use App\Models\Campus;
use App\Models\CampusRanking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CampusCampusRanking extends Model
{
    protected $table = 'campus_campus_ranking';

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }

    public function campus_ranking(): BelongsTo
    {
        return $this->belongsTo(CampusRanking::class);
    }
}
