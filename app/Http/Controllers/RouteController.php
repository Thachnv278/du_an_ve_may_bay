<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteRequest;
use App\Models\Route;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class RouteController extends Controller
{
    
    public function index()
    {
       $routes = Route::all();
       return view('admins.routes.index',compact('routes'));
    }
    public function add(RouteRequest $request)
    { 
        if($request->isMethod('post')){
             $param = $request->except('_token');
             $Route = Route::create($param);
             if($Route->id){
                return redirect()->route('routes.index')->with('success','Thêm  thành công');
             }  
        }
        return view('admins.routes.add');
    }
    public function edit( RouteRequest $request,$id){
        $route = Route::find($id);
        if($request->isMethod('post')){
            $param = $request->except('_token');
           $result = Route::where('id',$id)->update($param);
          if($result){
               return redirect()->route('routes.index')->with('success','Sửa thành công');
          }
       }
       return view('admins.routes.edit',compact('route'));

    }
    public function delete($id){
        Route::destroy($id);
        return redirect()->route('routes.index')->with('error','Xóa thành công');
    }


   
}
