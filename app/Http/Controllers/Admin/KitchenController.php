<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\food_package;
use App\Models\item;
use App\Models\kitchen_user;
use App\Models\category;
use App\Models\User;

class KitchenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Kitchen()
    {
        $item = item::all();
        $category = category::all();
        $kitchen_user = kitchen_user::all();
        return view('admin.kitchen_user',compact('item','category','kitchen_user'));
    }

    public function saveKitchen(Request $request){
        $request->validate([
            'kitchen_name'=>'required',
            'email'=>'required',
            //'role_id'=>'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $admin = new kitchen_user;
        $admin->kitchen_name = $request->kitchen_name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return response()->json('successfully save'); 
    }

    public function updateKitchen(Request $request){
        $request->validate([
            'kitchen_name'=> 'required',
            'email'=>'required',
            //'role_id'=>'required',
            'password' => 'min:6|nullable|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'nullable|min:6'
        ]);

        $admin = kitchen_user::find($request->id);
        $admin->kitchen_name = $request->kitchen_name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if($request->password != ''){
        $admin->password = Hash::make($request->password);
        }
        $admin->save();
        return response()->json('successfully update'); 
    }
    
    public function editKitchen($id){
        $user = kitchen_user::find($id);
        return response()->json($user); 
    }

    public function deleteKitchen($id){
        $user = kitchen_user::find($id);
        $user->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

}
