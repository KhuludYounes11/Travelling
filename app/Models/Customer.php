<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = [
        'name',
        'phone',
        'gender',
        'email',
    ];
    protected $casts = [
        'name' => 'string',
        'phone' => 'string',
        'gender' => 'string',
        'email' => 'string',
    ];

  
    use HasFactory;
    public function bookings():object
    {
        return $this->hasMany(Booking::class);
    }
    public function ratings():object
    {
        return $this->hasMany(Rating::class);
    }

}
