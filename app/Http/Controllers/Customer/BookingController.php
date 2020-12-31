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
use Hash;
use Auth;
use DB;
use Validator;
use Mail;
use Carbon\Carbon;
use StdClass;

class BookingController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getbooking()
    {
        $booking = DB::table('bookings as b')
         ->where('b.user_id', Auth::user()->id)
         ->join('food_packages as f', 'f.id', '=', 'b.package_id')
         ->select('b.*','f.package_title_english')
         ->orderBy('b.id','DESC')
         ->get();
        $item = item::all();
        $kitchen_user = kitchen_user::all();
        $category = category::where('category_id','0')->get();
        return view('customer.booking',compact('booking','item','kitchen_user','category'));
    }

    public function viewPackage($id)
    {
    	$booking = booking::find($id);
        $food_package = DB::table('food_packages as f')
         ->where('f.id', $booking->package_id)
         ->join('categories as c', 'c.id', '=', 'f.category_id')
         ->select('f.*','c.category_name_english')
         ->first();
        $item = item::all();
        $kitchen_user = kitchen_user::all();
        $category = category::where('category_id','0')->get();
        return view('customer.view_package',compact('food_package','item','kitchen_user','category','booking'));
    }
}
