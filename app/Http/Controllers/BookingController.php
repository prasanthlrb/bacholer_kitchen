<?php

namespace App\Http\Controllers;

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

class BookingController extends Controller
{
	public function orderPage($id)
    {
        $cart = cart::find($id);
        $food_package = food_package::find($cart->package_id);
        $user = User::find($cart->user_id);
        $user_address = user_address::where('user_id',$cart->user_id)->get();

        $category = category::where('category_id','0')->get();
        return view('page.order_page',compact('cart','category','food_package','user','user_address'));
    }

    public function saveAddress(Request $request){
        $this->validate($request, [
            'addr_type'=>'required',
            'addr_title'=>'required',
            'city'=>'required',
            'pincode'=>'required',
          ],[
            'addr_type.required' => 'Address Title Field is Required',
            'addr_title.required' => 'Buliding/Community Field is Required',
            'pincode.required' => 'Postal Code Field is Required',
        ]);

        $user_address = new user_address;
        $user_address->map_title = $request->map_title;
        $user_address->lat = $request->lat;
        $user_address->lng = $request->lng;
        $user_address->addr_type = $request->addr_type;
        $user_address->addr_title = $request->addr_title;
        $user_address->city = $request->city;
        $user_address->pincode = $request->pincode;
        $user_address->address1 = $request->address1;
        $user_address->address2 = $request->address2;
        $user_address->address3 = $request->address3;
        $user_address->user_id = $request->user_id;
        $user_address->save();

        $customer = User::find($request->user_id);
        $customer->address_id =  $user_address->id;
        $customer->save();

        return response()->json('successfully save'); 
    }

    public function saveCart(Request $request){
        $this->validate($request, [
            'no_of_person'=>'required|numeric',
            'no_of_days'=>'required|numeric',
          ],[
            'no_of_person.required' => 'No of Person Field is Required',
            'no_of_days.required' => 'No of Days Field is Required',
        ]);

        $cart = new cart;
        $cart->date = date('Y-m-d');
        $cart->user_id = $request->user_id;
        $cart->package_id = $request->package_id;
        if($request->breakfast_enable == '1'){
        $cart->breakfast_price = $request->breakfast_price;
    	}
    	if($request->lunch_enable == '1'){
        $cart->lunch_price = $request->lunch_price;
    	}
    	if($request->dinner_enable == '1'){
        $cart->dinner_price = $request->dinner_price;
    	}
        $cart->no_of_person = $request->no_of_person;
        $cart->no_of_days = $request->no_of_days;
        $cart->no_of_days = $request->no_of_days;
        $cart->start_date = date('Y-m-d', strtotime($request->start_date));;
        $cart->end_date = date('Y-m-d', strtotime($request->end_date));;
        $cart->subtotal = $request->subtotal;
        $cart->coupon_id = $request->coupon_id;
        $cart->discount_amount = $request->discount_amount;
        $cart->after_discount = $request->after_discount;
        $cart->tax = $request->tax;
        $cart->total = $request->total;
        $cart->save();

        //return response()->json('successfully save'); 
        return response()->json(['message' => 'successfully save','id'=> $cart->id,'status'=>400], 200);
    }




	private function getAccessToken(){
        $apikey="YmZjY2MwZjktMjhjNS00Njk1LWFjN2UtNDJmNWJjYTBhOGExOjY2MWI3OWRjLTRkODgtNDAzYi05MWY0LTM0YTBhZjY3YTE5MA==";
        
        // enter your API key here
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://api-gateway.sandbox.ngenius-payments.com/identity/auth/access-token"); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "accept: application/vnd.ni-identity.v1+json",
            "authorization: Basic ".$apikey,
            "content-type: application/vnd.ni-identity.v1+json",
            //"APP_KEY:8Shm171pe2oTGvJlql7nxe2Ys/tHJaiiVq6vr5wIu5EJhEEmI3gVi",
          )); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS,  "{\"realmName\":\"ni\"}"); 
        $output = json_decode(curl_exec($ch)); 
        return $output->access_token;
    }
        
        
        
    private function createPaymentOrder($total,$id){
        // foreach(explode('.', $d) as $info) {
            
        $amount = $total.'00';
        $customer = User::find($id);
        $postData = new StdClass(); 
        $postData->action = "SALE"; 
        $postData->firstName = $customer->name; 
        $postData->email = $customer->email; 
        $postData->merchantAttributes = new StdClass();
        $postData->merchantAttributes->redirectUrl = "http://127.0.0.1:8000/order-confirm/";
        $postData->amount = new StdClass();
        $postData->amount->currencyCode = "AED"; 
        $postData->amount->value = $amount; 
        
        $outlet = "ae35008c-52e8-485a-92c0-c3fa31350e36";
        $token=$this->getAccessToken();
         
        $json = json_encode($postData);
        $ch = curl_init(); 
         
        curl_setopt($ch, CURLOPT_URL, "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/$outlet/orders"); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token, 
            "Content-Type: application/vnd.ni-payment.v2+json", 
            "Accept: application/vnd.ni-payment.v2+json",
            "APP_KEY:8Shm171pe2oTGvJlql7nxe2Ys/tHJaiiVq6vr5wIu5EJhEEmI3gVi",
          )); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json); 
         
        $output = json_decode(curl_exec($ch)); 
        $order_reference = $output->reference; 
        $order_paypage_url = $output->_links->payment->href; 
        curl_close ($ch);
        $data = array(
        'pay_url' => $order_paypage_url,
        'order_reference' => $order_reference,
        );
        return $data;
        //$this->paymentPay($order_paypage_url);
    }

    private function getRetrivePayment($id){
        $booking = booking::find($id);
        $orderID = $booking->order_id;
        $outlet = "ae35008c-52e8-485a-92c0-c3fa31350e36";
        $token=$this->getAccessToken();
      
      $curl = curl_init();
      
      curl_setopt_array($curl, [
        CURLOPT_URL => "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/$outlet/orders/$orderID",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
          "Authorization: Bearer $token",
          "Accept: application/vnd.ni-payment.v2+json",
          "APP_KEY:8Shm171pe2oTGvJlql7nxe2Ys/tHJaiiVq6vr5wIu5EJhEEmI3gVi",
        ],
      ]);
      
      $response = curl_exec($curl);
      $err = curl_error($curl);
      
       $output = json_decode(curl_exec($curl)); 
       $payment_referrance_id = $output->_embedded->payment[0]->_id;
       $status = $output->_embedded->payment[0]->{'3ds'}->status; 
       
       $payment_id = str_replace('urn:payment:','',$payment_referrance_id);;
       
       $booking->payment_id = $payment_id;
       if($status == "SUCCESS"){
        $booking->payment_status = 1;
       }
       else{
        $booking->payment_status = 0;
       }
       $booking->save();

      curl_close($curl);
      
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        //echo $response;
        //return $status;
        return response()->json(['message' => 'Save Successfully'], 200);
      }


    }


    public function saveBooking(Request $request){
        try{
        $booking = new booking;        
        $booking->date = date('Y-m-d');
        $booking->user_id = $request->user_id;
        $booking->package_id = $request->package_id;
        $booking->breakfast_price = $request->breakfast_price;
        $booking->lunch_price = $request->lunch_price;
        $booking->dinner_price = $request->dinner_price;
        $booking->no_of_person = $request->no_of_person;
        $booking->no_of_days = $request->no_of_days;
        $booking->no_of_days = $request->no_of_days;
        $booking->start_date = date('Y-m-d', strtotime($request->start_date));;
        $booking->end_date = date('Y-m-d', strtotime($request->end_date));;
        $booking->subtotal = $request->subtotal;
        $booking->coupon_id = $request->coupon_id;
        $booking->discount_amount = $request->discount_amount;
        $booking->after_discount = $request->after_discount;
        $booking->tax = $request->tax;
        $booking->total = $request->total;
        $booking->address_id = $request->address_id;
        $booking->payment_type = $request->payment_type;
        $booking->payment_status = 0;
        
        if($request->payment_type == 1){
        //$totalData = explode('.',$request->total);
        $totalData = round($request->total);
        $output = $this->createPaymentOrder($totalData,$request->user_id);
        $booking->order_id = $output['order_reference'];
        $booking->pay_url = $output['pay_url'];
        }
        $booking->save();       
        
        $cart_delete = cart::find($request->cart_id);
        $cart_delete->delete();
        //$this->getRetrivePayment($booking->id);

        if($request->payment_type == 1){
            return response()->json(
            ['message' => 'Save Successfully',
            'booking_id'=>$booking->id, 
            'pay_url'=>$output['pay_url'],
            'payment_type'=>$booking->payment_type,
            'order_id'=>$booking->order_id,
            ], 200);
        }
        else{
            return response()->json(
                ['message' => 'Save Successfully',
                'booking_id'=>$booking->id,
                'pay_url'=>'',
                'payment_type'=>$booking->payment_type,
                'order_id'=>$booking->order_id,
                ], 200);
        }
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function orderConfirm($id)
    {
        $booking = booking::find($id);
        $food_package = food_package::find($booking->package_id);
        $user = User::find($booking->user_id);

        return view('page.order_confirm',compact('booking','food_package','user'));
    }



public function couponApply($id,$code,$value){
$coupon = coupon::where('coupon_code',$code)->where('status',1)->get();
if(count($coupon)>0){
    // if($kitchen_id == $coupon[0]->kitchen_id || $coupon[0]->kitchen_id == 'admin'){
        if($value >= $coupon[0]->min_order_val){
            if($coupon[0]->start_date <= date('Y-m-d') && $coupon[0]->end_date >= date('Y-m-d')){
                // return response()->json(['message' => 'Valid Date',], 200);
                if($coupon[0]->user_type ==1){
                    $arraydata=0;
                    foreach(explode(',',$coupon[0]->user_id) as $user1){
                        if($id == $user1){
                            $arraydata=1;
                        }
                    }
                    if($arraydata==0){
                        return response()->json(['message' => 'Coupon Not Valid for You!','status' => 1], 200);
                    }else{
                        if($coupon[0]->limit_per_user !=null){
                        $booking_count = booking::where('user_id',$id)->where('coupon_id',$coupon[0]->id)->get();
                        if(count($booking_count)< $coupon[0]->limit_per_user){
                            $amount = 0;
                            if($coupon[0]->discount_type == 4){
                            $amount = ($value/100) * $coupon[0]->amount;
                            }
                            else{
                                $amount = $coupon[0]->amount;
                            }
                            return response()->json([
                                'message' => 'Coupon Applied Succssfully',
                                'coupon_id' => $coupon[0]->id,
                                'coupon_code' => $coupon[0]->coupon_code,
                                'discount_type' => $coupon[0]->discount_type,
                                'max_value' => $coupon[0]->max_value,
                                'discount'=>$amount,
                                'status' => 0
                            ], 200);
                        }else{
                            return response()->json(['message' => 'Coupon Already Used!','status' => 1], 200);
                        }
                        }
                        $amount = 0;
                        if($coupon[0]->discount_type == 4){
                        $amount = ($value/100) * $coupon[0]->amount;
                        }
                        else{
                            $amount = $coupon[0]->amount;
                        }
                        return response()->json([
                            'message' => 'Coupon Applied Succssfully',
                            'coupon_id' => $coupon[0]->id,
                            'coupon_code' => $coupon[0]->coupon_code,
                            'discount_type' => $coupon[0]->discount_type,
                            'max_value' => $coupon[0]->max_value,
                            'discount'=>$amount,
                            'status' => 0
                        ], 200);

                    }
                }else{
                    if($coupon[0]->limit_per_user !=null){
                        $booking_count = booking::where('user_id',$id)->where('coupon_id',$coupon[0]->id)->get();
                        if(count($booking_count)< $coupon[0]->limit_per_user){
                            $amount = 0;
                            if($coupon[0]->discount_type == 4){
                            $amount = ($value/100) * $coupon[0]->amount;
                            }
                            else{
                                $amount = $coupon[0]->amount;
                            }
                            return response()->json([
                                'message' => 'Coupon Applied Succssfully',
                                'coupon_id' => $coupon[0]->id,
                                'coupon_code' => $coupon[0]->coupon_code,
                                'discount_type' => $coupon[0]->discount_type,
                                'max_value' => $coupon[0]->max_value,
                                'discount'=>$amount,
                                'status' => 0
                            ], 200);
                        }else{
                            return response()->json(['message' => 'Coupon Already Used!','status' => 1], 200);
                        }
                    }
                    $amount = 0;
                    if($coupon[0]->discount_type == 4){
                    $amount = ($value/100) * $coupon[0]->amount;
                    }
                    else{
                        $amount = $coupon[0]->amount;
                    }
                    return response()->json([
                        'message' => 'Coupon Applied Succssfully',
                        'coupon_id' => $coupon[0]->id,
                        'coupon_code' => $coupon[0]->coupon_code,
                        'discount_type' => $coupon[0]->discount_type,
                        'max_value' => $coupon[0]->max_value,
                        'discount'=>$amount,
                        'status' => 0
                    ], 200);
                }
            }
            return response()->json(['message' => 'Coupon Expired!','status' => 1], 200);
        }else{
            return response()->json(['message' => 'Cart Value Not Enough!','status' => 1], 200);
        }
    // }else{
    //     return response()->json(['message' => 'Coupon Code Not for this Kitchen',], 400);
    // }
}else{
    return response()->json(['message' => 'Invalid Coupon Code!','status' => 1], 200);
}
    
}



}