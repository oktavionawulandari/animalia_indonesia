<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function adopter()
    {
        return $this->belongsTo(Adopter::class);
    }

    public function adoption()
    {
        return $this->hasOne(Adoption::class);
    }
}
