<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
    ];
    public function tickets():object
    {
        return $this->hasMany(Ticket::class);
    }
}
