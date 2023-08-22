<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = [
        'flight_id',
        'name',
        'date_of_birth',
        'nationality',
        'seat_number',
        'price',
        'booking_id'
    ];
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
    

  
}
