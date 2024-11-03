<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterStudyProgram extends Model
{
    /** @use HasFactory<\Database\Factories\MasterStudyProgramFactory> */
    use HasFactory, SoftDeletes;

    public function study_programs(): HasMany
    {
        return $this->hasMany(StudyProgram::class);
    }
}
