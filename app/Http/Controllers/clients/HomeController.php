<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $flight = Flight::all();
        return view('clients.index',compact('flight'));
    }
}
