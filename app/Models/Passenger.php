<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    protected $table = 'passengers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',

    ];
    
}
