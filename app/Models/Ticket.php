<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'city_id',
        'date_e',
        'date_s',
    ];
    public function city():object
    {
        return $this->belongsTo(City::class);
    }
    public function bookings():object
    {
        return $this->hasMany(Booking::class);
    }
    public function company():object
    {
        return $this->belongsTo(Company::class);
    }

}
