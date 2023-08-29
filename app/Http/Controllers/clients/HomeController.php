<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $flight = Flight::all();
        return view('clients.index',compact('flight'));
    }
    public function searchFlights(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $checkoutDate = $request->input('DepartureDate');

        $flights = DB::table('flights')
            ->join('routes', 'flights.route_id', '=', 'routes.id')
            ->where('routes.origin', $origin)
            ->where('routes.destination', $destination)
            ->whereDate('flights.DepartureDate', '=', $checkoutDate)
            ->select('flights.*', 'routes.origin', 'routes.destination')
            ->get();
            // dd($flights);

        return view('clients.flight',compact('flights'));
    }
}
