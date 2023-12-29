<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'ticket_id','hotel_id',
        'date',
    ];
    protected $casts = [
        'customer_id' => 'integer',
        'hotel_id' => 'integer',
        'ticket_id' => 'integer',
        'date' => 'date'
    ];
    use HasFactory;
    public function customer():object
    {
        return $this->belongsTo(Customer::class);
    }
    public function hotel():object
    {
        return $this->belongsTo(Hotel::class);
    }
    public function ticket():object
    {
        return $this->belongsTo(Ticket::class);
    }
}
