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
use DB;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Customer()
    {
        $item = item::all();
        $category = category::all();
        $customer = User::all();
        return view('admin.customer',compact('item','category','customer'));
    }

    public function customerDetails($id){
        $customer = User::find($id);
        $all_customer = User::all();
        $booking = DB::table('bookings as b')
         ->where('b.user_id', $id)
         ->join('food_packages as f', 'f.id', '=', 'b.package_id')
         ->select('b.*','f.package_title_english')
         ->orderBy('b.id','DESC')
         ->get();
        return view('admin.customer_details',compact('customer','all_customer','booking'));
    }
}
