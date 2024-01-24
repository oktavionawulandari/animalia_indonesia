<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Adopter extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];


    public function detailAdopter()
    {
        return $this->hasOne(DetailAdopter::class);
    }

    public function form()
    {
        return $this->hasOne(Form::class);
    }

    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
