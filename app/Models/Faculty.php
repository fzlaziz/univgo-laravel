<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Campus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Faculty extends Model
{
    /** @use HasFactory<\Database\Factories\FacultyFactory> */
    use HasFactory;

    public function study_programs(): HasMany
    {
        return $this->hasMany(StudyProgram::class);
    }

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }

    public function master_faculty(): BelongsTo
    {
        return $this->belongsTo(MasterFaculty::class);
    }

}
