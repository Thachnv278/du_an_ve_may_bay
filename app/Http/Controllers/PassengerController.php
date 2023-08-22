<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassengerRequest;
use App\Models\Passenger;
use App\Http\Requests\StorePassengerRequest;
use App\Http\Requests\UpdatePassengerRequest;

class PassengerController extends Controller
{
    
    public function index()
    {
        $passengers = Passenger::all();
        return view('admins.passengers.index', compact('passengers'));
    }
    public function add(PassengerRequest $request)
    { 
        if($request->isMethod('post')){
             $param = $request->except('_token');
             $passengers = Passenger::create($param);
             if($passengers->id){
                return redirect()->route('passengers.index')->with('success','Thêm  thành công');
             }  
        }
        return view('admins.passengers.add');
    }
    public function edit( PassengerRequest $request,$id){
        $passenger = Passenger::find($id);
        if($request->isMethod('post')){
            $param = $request->except('_token');
           $result = Passenger::where('id',$id)->update($param);
          if($result){
               return redirect()->route('passengers.index')->with('success','Sửa thành công');
          }
       }
       return view('admins.passengers.edit',compact('passenger'));

    }
    public function delete($id){
        Passenger::destroy($id);
        return redirect()->route('passengers.index')->with('error','Xóa thành công');
    }
    

}
