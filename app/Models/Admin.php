<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function adoption()
    {
        return $this->hasMany(Adoption::class);
    }

    public function detailRescue()
    {
        return $this->hasMany(DetailRescue::class);
    }
}
