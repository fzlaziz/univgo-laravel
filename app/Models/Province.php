<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;
    protected $table = 'indonesia_provinces';

    public function cities()
    {
        return $this->hasMany(City::class, 'province_code', 'code');
    }
}

