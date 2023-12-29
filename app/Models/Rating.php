<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'star','hotel_id',
        'comment',
    ];
    protected $casts = [
        'customer_id' => 'integer',
        'hotel_id' => 'integer',
        'star' => 'integer',
        'comment' => 'string'
    ];
    public function customer():object
    {
        return $this->belongsTo(Customer::class);
    }
    public function hotel():object
    {
        return $this->belongsTo(Hotel::class);
    }
   
}
