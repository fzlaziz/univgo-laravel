<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'indonesia_districts';

    public function city()
    {
        return $this->belongsTo(City::class, 'city_code', 'code');
    }

    public function campuses()
    {
        return $this->hasMany(Campus::class);
    }
}
