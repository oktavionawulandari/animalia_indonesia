<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    public function adopter()
    {
        return $this->belongsTo(Adopter::class);
    }

    public function getFormattedAgeAttribute()
    {
        $now = now();
        $age = \Carbon\Carbon::parse($this->age);

        $years = $age->diffInYears($now);
        $months = $age->diffInMonths($now) % 12;

        // Debug statements
        dd([
            'now' => $now,
            'age' => $age,
            'years' => $years,
            'months' => $months,
        ]);

        if ($years > 0) {
            return "{$years} tahun";
        } else {
            return "{$months} bulan";
        }
    }
}
