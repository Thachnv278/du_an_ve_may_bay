<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $fillable = ['route_id','aircraft_id','DepartureTime','ArrivalTime','status','price_1','price_2'];
    protected $table = 'flights';

   


    public function route(){
        return $this->belongsTo(Route::class);
    }
   public function aircraft(){
       return $this->belongsTo(Aircraft::class);
   }
    
}

