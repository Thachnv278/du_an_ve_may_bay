<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightRequest;
use App\Models\Aircraft;
use App\Models\Flight;
use App\Models\Route;
use Illuminate\Support\Facades\Http;

class FlightController extends Controller
{
   
    public function index()
    {
        $flights = Flight::all();
        return view('admins.flights.index',compact('flights'));
    }
    public function add(FlightRequest $request)
    {  
        $route = Route::all();
        $aircraft = Aircraft::all();
        if($request->isMethod('post')){
             $param = $request->except('_token');
             $Flight = Flight::create($param);
             if($Flight->id){
                return redirect()->route('flights.index')->with('success','Thêm  thành công');
             }  
        }
        return view('admins.flights.add',compact('route','aircraft'));
    }
    public function edit( FlightRequest $request,$id){
        $flight = Flight::find($id);
        $route = Route::all();
        $aircraft = Aircraft::all();
        if($request->isMethod('post')){
            $param = $request->except('_token');
           $result = Flight::where('id',$id)->update($param);
          if($result){
               return redirect()->route('flights.index')->with('success','Sửa thành công');
          }
       }
       return view('admins.flights.edit',compact('flight','route','aircraft'));

    }
    public function delete($id){
        Flight::destroy($id);
        return redirect()->route('flights.index')->with('error','Xóa thành công');
    }

 
}
