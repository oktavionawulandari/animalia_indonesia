<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function adopter()
    {
        return $this->belongsTo(Adopter::class);
    }

    public function detailAdopter()
    {
        return $this->belongsTo(DetailAdopter::class, 'adopter_id');
    }

    public function form()
    {
        return $this->belongsTo(Form::class, 'adopter_id');
    }

}
