<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food_package;
use App\Models\item;
use App\Models\kitchen_user;
use App\Models\category;
use App\Models\User;
use Hash;
use DB;

class PageController extends Controller
{
    private function send_sms($phone,$msg)
    {
      $requestParams = array(
        //'Unicode' => '0',
        //'route_id' => '2',
        'datetime' => '2020-09-27',
        'username' => 'isalonuae',
        'password' => 'Ms5sbqBxif',
        'senderid' => 'ISalon UAE',
        'type' => 'text',
        'to' => '+971'.$phone,
        'text' => $msg
      );
      
      //merge API url and parameters
      $apiUrl = 'https://smartsmsgateway.com/api/api_http.php?';
      foreach($requestParams as $key => $val){
          $apiUrl .= $key.'='.urlencode($val).'&';
      }
      $apiUrl = rtrim($apiUrl, "&");
    
      //API call
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $apiUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
      curl_exec($ch);
      curl_close($ch);
    }

    public function home()
    {
        $category = category::where('category_id','0')->get();
        $basic_plan = DB::table('food_packages as f')
         ->where('f.category_id', '16')
         ->join('categories as c', 'c.id', '=', 'f.category_id')
         ->select('f.*','c.category_name_english')
         ->orderBy('f.id','desc')
         ->limit(4)->get();
         $diet_plan = DB::table('food_packages as f')
         ->where('f.category_id', '17')
         ->join('categories as c', 'c.id', '=', 'f.category_id')
         ->select('f.*','c.category_name_english')
         ->orderBy('f.id','desc')
         ->limit(6)->get();
        return view('page.home',compact('category','diet_plan','basic_plan'));
    }

    public function ItemList($id)
    {
        $food_package = DB::table('food_packages as f')
         ->where('f.category_id', $id)
         ->join('categories as c', 'c.id', '=', 'f.category_id')
         ->select('f.*','c.category_name_english')
         ->orderBy('f.id','desc')
         ->paginate(6);
        $item = item::all();
        $kitchen_user = kitchen_user::all();
        $category = category::where('category_id','0')->get();
        return view('page.item_list',compact('food_package','item','kitchen_user','category'));
    }

    public function SingleItem($id)
    {
        $food_package = DB::table('food_packages as f')
         ->where('f.id', $id)
         ->join('categories as c', 'c.id', '=', 'f.category_id')
         ->select('f.*','c.category_name_english')
         ->first();
        $item = item::all();
        $kitchen_user = kitchen_user::all();
        $category = category::where('category_id','0')->get();
        return view('page.single_item',compact('food_package','item','kitchen_user','category'));
    }

    public function About()
    {
        return view('page.about');
    }

    public function Contact()
    {
        return view('page.contact');
    }

    public function CustomerRegister()
    {
        return view('page.customer_register');
    }

    public function saveCustomer(Request $request){
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'phone' => 'required|max:9|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $randomid = mt_rand(1000,9999); 

        $customer = new User;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        $customer->otp = $randomid;
        $customer->save();

        $msg= "Dear Customer, Please use the code ".$customer->otp." to verify your Bachelor kitchen Account";

        //$this->send_sms($customer->phone,$msg);
        $id=$customer->id;
        return view('page.verify_customer',compact('id'));
    }


    public function verifyCustomer(Request $request)
    {
        if($request->customer_id !=null){
            $customer = User::find($request->customer_id);
            if($customer->otp == $request->otp){
                $customer->status = 1;
                $customer->save();
                return response()->json(['message' => 'Verified Your Account','status'=>200], 200);
            }else{
                return response()->json(['message' => 'Otp Not Valid','status'=>400], 200);
            }
        }else{
            return response()->json(['message' => 'Customer id not found'], 200);
        }
    }


}
