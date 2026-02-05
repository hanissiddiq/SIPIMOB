<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = [
        'name',
        'image',
        'brand',
        'model',
        'year',
        'color',
        'plate_number',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
