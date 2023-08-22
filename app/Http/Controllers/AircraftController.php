<?php

namespace App\Http\Controllers;

use App\Http\Requests\AircraftRequest;
use App\Models\Aircraft;
use App\Http\Requests\StoreAircraftRequest;
use App\Http\Requests\UpdateAircraftRequest;

class AircraftController extends Controller
{
    
    public function index()
    {
       $aircrafts = Aircraft::all();
       return view('admins.aircrafts.index',compact('aircrafts'));
    }
    public function add(AircraftRequest $request)
    { 
        if($request->isMethod('post')){
             $param = $request->except('_token');
             $aircrafts = Aircraft::create($param);
             if($aircrafts->id){
                return redirect()->route('aircrafts.index')->with('success','Thêm  thành công');
             }  
        }
        return view('admins.aircrafts.add');
    }
    public function edit( AircraftRequest $request,$id){
        $aircrafts = Aircraft::find($id);
        if($request->isMethod('post')){
            $param = $request->except('_token');
           $result = Aircraft::where('id',$id)->update($param);
          if($result){
               return redirect()->route('aircrafts.index')->with('success','Sửa thành công');
          }
       }
       return view('admins.aircrafts.edit',compact('aircrafts'));

    }
    public function delete($id){
        Aircraft::destroy($id);
        return redirect()->route('aircrafts.index')->with('error','Xóa thành công');
    }

   
}
