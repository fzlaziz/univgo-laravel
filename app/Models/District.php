<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;
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
