<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'color',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
