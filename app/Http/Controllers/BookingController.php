<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;

class BookingController extends Controller
{
    
    public function index()
    {
        $bookings = Booking::all();
        return view('admins.bookings.index', compact('bookings'));
    }

}
