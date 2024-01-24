<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAdopter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function adopter()
    {
        return $this->belongsTo(Adopter::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class);
    }

    public function adoption()
    {
        return $this->belongsTo(Adoption::class);
    }

    public function form()
    {
        return $this->hasOne(Form::class);
    }
}
