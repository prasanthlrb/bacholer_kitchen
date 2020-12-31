<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\food_package;
use App\Models\item;
use App\Models\kitchen_user;
use App\Models\category;
use App\Models\User;
use App\Models\booking;
use App\Models\city;
use DB;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function City()
    {
        $city = city::all();
        return view('admin.city',compact('city'));
    }

    public function saveCity(Request $request){
        $request->validate([
            'city'=>'required',
        ]);

        $city = new city;
        $city->city = $request->city;
        $city->save();
        return response()->json('successfully save'); 
    }

    public function updateCity(Request $request){
        $request->validate([
            'city'=> 'required',
        ]);

        $city = city::find($request->id);
        $city->city = $request->city;
        $city->save();
        return response()->json('successfully update'); 
    }
    
    public function editCity($id){
        $city = city::find($id);
        return response()->json($city); 
    }

    public function deleteCity($id){
        $city = city::find($id);
        $city->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
}
