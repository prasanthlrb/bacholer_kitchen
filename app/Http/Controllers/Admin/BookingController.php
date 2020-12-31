<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('auth:admin');
    }

    public function bookingDetails()
    {
        $booking = DB::table('bookings as b')
         ->join('food_packages as f', 'f.id', '=', 'b.package_id')
         ->select('b.*','f.package_title_english')
         ->orderBy('b.id','DESC')
         ->get();
        $item = item::all();
        $kitchen_user = kitchen_user::all();
        $category = category::where('category_id','0')->get();
        return view('admin.booking',compact('booking','item','kitchen_user','category'));
    }
}
