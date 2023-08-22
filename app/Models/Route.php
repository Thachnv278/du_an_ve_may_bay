<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin',
        'destination',
    ];
    protected $table = 'routes';


    public function flight(){
        return $this->hasMany(Flight::class);
    }
    public function tickets()
    {
        return $this->hasManyThrough(Ticket::class, Flight::class, 'route_id', 'flight_id');
    }

}
