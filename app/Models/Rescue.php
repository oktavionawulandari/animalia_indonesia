<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rescue extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function detailRescue()
    {
        return $this->hasOne(DetailRescue::class, 'rescue_id');
    }
}
