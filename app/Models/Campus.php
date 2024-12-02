<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
    /** @use HasFactory<\Database\Factories\CampusFactory> */
    use HasFactory, SoftDeletes;

    public function accreditation(): BelongsTo
    {
        return $this->belongsTo(Accreditation::class);
    }

    public function study_programs(): HasMany
    {
        return $this->hasMany(StudyProgram::class);
    }

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class);
    }

    public function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class);
    }

    public function facilities(): HasMany
    {
        return $this->hasMany(Facility::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function admission_statistics(): HasMany
    {
        return $this->hasMany(AdmissionStatistic::class);
    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function campus_rankings(): HasMany
    {
        return $this->hasMany(CampusRanking::class);
    }

    public function degree_levels(): BelongsToMany
    {
        return $this->belongsToMany(DegreeLevel::class);
    }

    public function admission_routes(): BelongsToMany
    {
        return $this->belongsToMany(AdmissionRoute::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function campus_type(): BelongsTo
    {
        return $this->belongsTo(CampusType::class);
    }

    public function reviews()
    {
        return $this->hasMany(CampusReview::class);
    }
    

}

