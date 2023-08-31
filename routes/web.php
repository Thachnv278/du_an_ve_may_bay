<?php

use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AircraftController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\SeatTypeController;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// chuyến bay
Route::get('list', [FlightController::class, 'index'])->name('flights.index'); 
Route::match(['get','post'], '/add', [FlightController::class, 'add'])->name('flights.add');
Route::match(['get','post'], '/edit/{id}', [FlightController::class, 'edit'])->name('flights.edit');
Route::get('/delete/{id}', [FlightController::class, 'delete'])->name('flights.delete');
// lịch trình
Route::get('/routelist', [RouteController::class, 'index'])->name('routes.index'); 
Route::match(['get','post'], '/routeadd', [RouteController::class, 'add'])->name('routes.add');
Route::match(['get','post'], '/routeedit/{id}', [RouteController::class, 'edit'])->name('routes.edit');
Route::get('/routedelete/{id}', [RouteController::class, 'delete'])->name('routes.delete'); 
// tên máy bay 
Route::get('/aircraftlist', [AircraftController::class, 'index'])->name('aircrafts.index'); 
Route::match(['get','post'], '/aircraftadd', [AircraftController::class, 'add'])->name('aircrafts.add');
Route::match(['get','post'], '/aircraftedit/{id}', [AircraftController::class, 'edit'])->name('aircrafts.edit');
Route::get('/aircraftdelete/{id}', [AircraftController::class, 'delete'])->name('aircrafts.delete'); 
// loại ghế
// Route::get('/seatTypelist', [SeatTypeController::class, 'index'])->name('seatTypes.index'); 
// Route::match(['get','post'], '/seatTypeadd', [SeatTypeController::class, 'add'])->name('seatTypes.add');
// Route::match(['get','post'], '/seatTypeedit/{id}', [SeatTypeController::class, 'edit'])->name('seatTypes.edit');
// Route::get('/seatTypedelete/{id}', [SeatTypeController::class, 'delete'])->name('seatTypes.delete'); 
// //ghế
// Route::get('/seatlist', [SeatController::class, 'index'])->name('seats.index'); 
// Route::match(['get','post'], '/seatadd', [SeatController::class, 'add'])->name('seats.add');
// Route::match(['get','post'], '/seatedit/{id}', [SeatController::class, 'edit'])->name('seats.edit');
// Route::get('/seatdelete/{id}', [SeatController::class, 'delete'])->name('seats.delete'); 
// hành khách
Route::get('/passengerlist', [PassengerController::class, 'index'])->name('passengers.index'); 
Route::match(['get','post'], '/passengeradd', [PassengerController::class, 'add'])->name('passengers.add');
Route::match(['get','post'], '/passengeredit/{id}', [PassengerController::class, 'edit'])->name('passengers.edit');
Route::get('/passengerdelete/{id}', [PassengerController::class, 'delete'])->name('passengers.delete'); 
// vé máy bay
Route::get('/ticketlist/{id}', [TicketController::class, 'index'])->name('tickets.index'); 
// đặt vé
Route::get('/bookinglist', [BookingController::class, 'index'])->name('bookings.index'); 



//
Route::get('/', [HomeController::class, 'index'])->name('home.index'); 
Route::post('flight', [HomeController::class, 'searchFlights'])->name('home.flight'); 
Route::get('flight_detail_1/{id}', [HomeController::class, 'Details_1'])->name('home.detail_1');
Route::get('flight_detail_2/{id}', [HomeController::class, 'Details_2'])->name('home.detail_2');
  








