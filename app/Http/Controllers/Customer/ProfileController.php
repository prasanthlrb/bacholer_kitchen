<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\booking;
use App\Models\user_address;
use App\Models\cart;
use App\Models\food_package;
use App\Models\item;
use App\Models\kitchen_user;
use App\Models\category;
use App\Models\tags;
use App\Models\coupon;
use Hash;
use Auth;
use DB;
use Validator;
use Mail;
use Carbon\Carbon;
use StdClass;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function availableCoupon(){
        $coupon = coupon::all();
        return view('customer.couponlist',compact('coupon'));
    }

    public function viewProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('customer.edit_profile',compact('user'));
    }

    public function viewChangePassword()
    {
        $user = User::find(Auth::user()->id);
        return view('customer.change_password',compact('user'));
    }

    public function updateChangePassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        
        $hashedPassword = Auth::user()->password;
 
        if (\Hash::check($request->oldpassword , $hashedPassword )) {
 
            if (!\Hash::check($request->password , $hashedPassword)) {
 
                $customer = User::find($request->id);
                $customer->password = Hash::make($request->password);
                $customer->save();
 
                return response()->json(['message' => 'Password Updated Successfully!' , 'status' => 1], 200);
            }
 
            else{
                return response()->json(['message' => 'new password can not be the old password!' , 'status' => 0]);
            }
 
           }
 
        else{
            return response()->json(['message' => 'old password doesnt matched!' , 'status' => 0]);
        }
    }

    public function updateProfile(Request $request){
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            //'email'=>'required|email|max:255|unique:users',
            //'phone' => 'required|max:9|unique:users',
        ]);
        $randomid = mt_rand(1000,9999); 

        $customer = User::find($request->id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        return response()->json('Update Successfully', 200);
    }

    public function viewLocation()
    {
        $user = User::find(Auth::user()->id);
        $user_address = user_address::where('user_id',Auth::user()->id)->get();
        return view('customer.location',compact('user','user_address'));
    }
}
