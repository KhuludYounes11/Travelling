<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'city_id'
    ];
    protected $casts = [
        'name' => 'string',
        'phone' => 'string',
        'city_id' => 'integer',
    ];
    public function bookings():object
    {
        return $this->hasMany(Booking::class);
    }
    public function city():object
    {
        return $this->belongsTo(City::class);
    }
    public function ratings():object
    {
        return $this->hasMany(Rating::class);
    }

}
