<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $ticket = Ticket::all()->where('booking_id', $id);
        return view('admins.tickets.index', compact('ticket'));
    }

    
}
