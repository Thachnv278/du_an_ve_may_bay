<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;
    protected $fillable = [
        'aircraft_name',
        'seat_type_1',
        'seat_count_type_1',
        'seat_type_2',
        'seat_count_type_2',
        'seating_capacity',

    ];
    protected $table = 'aircraft';
    public function flight(){
        return $this->hasMany(Flight::class);
    }
    

    public function tickets()
    {
        return $this->hasManyThrough(Ticket::class, Flight::class, 'aircraft_id', 'flight_id');
    }
}
