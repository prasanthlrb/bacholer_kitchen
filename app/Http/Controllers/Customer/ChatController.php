<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\User;
use App\Models\user_address;
use App\Models\cart;
use App\Models\food_package;
use App\Models\item;
use App\Models\kitchen_user;
use App\Models\category;
use App\Models\tags;
use App\Models\coupon;
use App\Models\chat_to_customer;
use Hash;
use Auth;
use DB;
use Validator;
use Mail;
use Carbon\Carbon;
use StdClass;
use App\Events\ChatEvent;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chatToAdmin(){
        $customer = User::find(Auth::user()->id);
        return view('customer.chat_to_admin',compact('customer'));
    }

    public function saveCustomerChat(Request $request){
      $request->validate([
          'customer_text'=>'required',
      ]);
      date_default_timezone_set("Asia/Dubai");
      date_default_timezone_get();
      $chat_to_customer = new chat_to_customer;
      $chat_to_customer->text = $request->customer_text;
      $chat_to_customer->customer_id = Auth::user()->id;
      $chat_to_customer->message_from = 1;
      $chat_to_customer->save();

      $dateTime = new Carbon($chat_to_customer->updated_at, new \DateTimeZone('Asia/Dubai'));
        $message =  array(
           'message'=> $chat_to_customer->text,
           'message_from'=> '1',
           'date'=> $dateTime->diffForHumans(),
           'channel_name'=> $chat_to_customer->customer_id,
        );
      event(new ChatEvent($message));
      return response()->json($chat_to_customer->customer_id); 
    }

    public function getCustomerChat($id){
        $chat = chat_to_customer::where('customer_id',$id)->get();

        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $output=''; 
    foreach($chat as $row){
        $dateTime = new Carbon($row->updated_at, new \DateTimeZone('Asia/Dubai'));
        if($row->message_from == 0){
        $output.='
    <div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">ADMIN</div>
          <div class="msg-info-time">'.$dateTime->diffForHumans().'</div>
        </div>

        <div class="msg-text">
          '.$row->text.'
        </div>
      </div>
    </div>';
        }
        else{
        $output.='
    <div class="msg right-msg">
      <div
       class="msg-img"
       style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">You</div>
          <div class="msg-info-time">'.$dateTime->diffForHumans().'</div>
        </div>

        <div class="msg-text">
          '.$row->text.'
        </div>
      </div>
    </div>';
        }
    }
         
        return response()->json(['html'=>$output],200); 
    }
}
