<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailRescue extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function rescue()
    {
        return $this->hasMany(Rescue::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
