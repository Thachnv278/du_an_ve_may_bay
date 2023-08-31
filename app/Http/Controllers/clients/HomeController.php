<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
    public function Details_1(Request $request ,$id){
        $item=Flight::find($id);
        $cart = session()->get('cart');
        $cart = [
            'id' => $item->id,
            'aircraft_id' => $item->aircraft_id,
            'route_id' => $item->route_id,
            'DepartureDate' => $item->DepartureDate,
            'DepartureTime' => $item->DepartureTime,
            'ArrivalTime' => $item->ArrivalTime,
            'price_1' => $item->price_1

        ];
        session()->put('cart', $cart);
        return view('clients.detail',compact('cart'));
    }
    public function Details_2(Request $request ,$id){
        $item=Flight::find($id);
        $cart = session()->get('cart');
        $cart = [
            'id' => $item->id,
            'aircraft_id' => $item->aircraft_id,
            'route_id' => $item->route_id,
            'DepartureDate' => $item->DepartureDate,
            'DepartureTime' => $item->DepartureTime,
            'ArrivalTime' => $item->ArrivalTime,
            'price_2' => $item->price_2

        ];
        dd($cart);
        session()->put('cart', $cart);
        return view('clients.detail',compact('cart'));
    }
    
}
