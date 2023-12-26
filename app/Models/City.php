<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country'
    ];
    public function hotels():object
    {
        return $this->hasMany(Hotel::class);
    }
    public function tickets():object
    {
        return $this->hasMany(Ticket::class);
    }
}
