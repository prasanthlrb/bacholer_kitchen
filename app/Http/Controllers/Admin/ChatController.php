<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('auth:admin');
    }

    public function chatToCustomer(){
        $all_customer = User::all();
        return view('admin.chat_to_customer',compact('all_customer'));
    }

    public function saveCustomerChat(Request $request){
      $request->validate([
          'customer_text'=>'required',
      ]);
      date_default_timezone_set("Asia/Dubai");
      date_default_timezone_get();
      $chat_to_customer = new chat_to_customer;
      $chat_to_customer->text = $request->customer_text;
      $chat_to_customer->customer_id = $request->customer_id;
      $chat_to_customer->message_from = 0;
      $chat_to_customer->save();

      $dateTime = new Carbon($chat_to_customer->updated_at, new \DateTimeZone('Asia/Dubai'));
        $message =  array(
           'message'=> $chat_to_customer->text,
           'message_from'=> '0',
           'date'=> $dateTime->diffForHumans(),
           'channel_name'=> $chat_to_customer->customer_id,
        );
      event(new ChatEvent($message));
      return response()->json($request->customer_id); 
    }

    public function getCustomerChat($id){
        $chat = chat_to_customer::where('customer_id',$id)->get();
        $customer = User::find($id);
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $output1='<div class="media">
      <span class="chat-app-sidebar-toggle ft-align-justify font-large-1 mr-2 d-none d-block d-sm-block d-md-none"></span>
      <div class="media-body">
        <img src="/app-assets/img/portrait/small/avatar-s-3.png" width="37" class="rounded-circle mr-1" alt="avatar" />
        <span>'.$customer->first_name.' '.$customer->last_name.'</span>
      </div>
    </div>';

    $output='<div class="badge badge-dark mb-1">Chat History</div>
    <div class="chats">
      <div class="chats">';

        foreach($chat as $row){
        $dateTime = new Carbon($row->updated_at, new \DateTimeZone('Asia/Dubai'));
        if($row->message_from == 1){
        $output.='
    	<div class="chat chat-left">
          <div class="chat-avatar">
            <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
              <img src="/app-assets/img/portrait/small/avatar-s-7.png" class="width-50 rounded-circle" alt="avatar" />
            </a>
          </div>
          <div class="chat-body">
            <div class="chat-content">
              <p>'.$row->text.'</p>
            </div>
          </div>
        </div>';
        }
        else{
        $output.='
        <div class="chat">
          <div class="chat-avatar">
            <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
              <img src="/app-assets/img/portrait/small/avatar-s-1.png" class="width-50 rounded-circle" alt="avatar" />
            </a>
          </div>
          <div class="chat-body">
            <div class="chat-content">
              <p>'.$row->text.'</p>
            </div>
          </div>
        </div>';
        }
    }
        
      $output.='</div>
    </div>'; 
         
        return response()->json(['html'=>$output,'html1'=>$output1,'customer_id'=>$customer->id],200); 
    }
}
