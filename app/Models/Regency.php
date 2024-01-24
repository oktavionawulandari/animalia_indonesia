<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    protected $guarded = ['zip_code'];

    public function detailAdopters()
    {
        return $this->hasOne(DetailAdopter::class);
    }

    public function subDistrictRegency()
    {
        return $this->hasOne(SubDistrict::class);
    }
}
