<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function detailAdopters()
    {
        return $this->hasOne(DetailAdopter::class);
    }

    public function regencySubDistrict()
    {
        return $this->belongsTo(Regency::class);
    }
}
