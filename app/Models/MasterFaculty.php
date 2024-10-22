<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterFaculty extends Model
{
    /** @use HasFactory<\Database\Factories\MasterFacultyFactory> */
    use HasFactory;

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class);
    }
}
