<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupon;
use App\Models\User;
use Hash;
use Auth;
use DB;

class CouponController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $coupon = coupon::all();
        return view('admin.view_coupon',compact('coupon'));
    }

    public function addCoupon(){
        $customer = User::all();
        return view('admin.addcoupon',compact('customer'));
    }

    public function CouponSave(Request $request){
        $request->validate([
            'coupon_code'=>'required|unique:coupons',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'discount_type'=>'required',
            'amount'=>'required',
            'limit_per_user'=>'required',
            'min_order_val'=>'required'
        ]);
        $user_id='';
        if($request->user_type == '1'){
            $user1;
            foreach($request->user_id as $row){
                $user1[]=$row;
            }
            $user_id = collect($user1)->implode(',');
        }

        $coupon = new coupon;
        $coupon->kitchen_id = 'admin';
        $coupon->coupon_code = $request->coupon_code;
        $coupon->description = $request->description;
        $coupon->start_date = date('Y-m-d',strtotime($request->start_date));
        $coupon->end_date = date('Y-m-d',strtotime($request->end_date));
        $coupon->discount_type = $request->discount_type;
        $coupon->amount = $request->amount;
        $coupon->max_value = $request->max_value;
        $coupon->min_order_val = $request->min_order_val;
        $coupon->limit_per_user = $request->limit_per_user;
        $coupon->user_type = $request->user_type;
        $coupon->user_id = $user_id;
        $coupon->status = 1;
        $coupon->save();
        return response()->json($coupon); 
    }
   
    public function CouponEdit($id){
        $coupon = coupon::find($id);
        return response()->json($coupon); 
    }

    public function viewCoupon($id){ 
        $customer = User::all();
        return view('admin.addcoupon',compact('id','customer'));
    }

    public function CouponUpdate(Request $request){
        $request->validate([
            'coupon_code'=>'required|unique:coupons,coupon_code,'.$request->id,
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'discount_type'=>'required',
            'amount'=>'required',
            'limit_per_user'=>'required',
            'min_order_val'=>'required'
        ]);
        $user_id='';
        if($request->user_type == '1'){
            $user1;
            foreach($request->user_id as $row){
                $user1[]=$row;
            }
            $user_id = collect($user1)->implode(',');
        }

        $coupon = coupon::find($request->id);
        $coupon->coupon_code = $request->coupon_code;
        $coupon->description = $request->description;
        $coupon->start_date = date('Y-m-d',strtotime($request->start_date));
        $coupon->end_date = date('Y-m-d',strtotime($request->end_date));
        $coupon->discount_type = $request->discount_type;
        $coupon->amount = $request->amount;
        $coupon->max_value = $request->max_value;
        $coupon->min_order_val = $request->min_order_val;
        $coupon->limit_per_user = $request->limit_per_user;
        $coupon->user_type = $request->user_type;
        $coupon->user_id = $user_id;
        $coupon->save();
        return response()->json($coupon);
    }

    public function CouponDelete($id){
        $coupon = coupon::find($id);
        $coupon->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    
    public function get_coupon_user($id){ 
        //$data = newsletter::find($id);
        $data  = coupon::find($id);

        $user = User::all();

      $arraydata=array();
      foreach(explode(',',$data->user_id) as $user1){
        $arraydata[]=$user1;
      }
      $output = '<optgroup label="Select User">';
        foreach ($user as $value){
            if(in_array($value->id , $arraydata))
            {
                $output .='<option selected="true" value="'.$value->id.'">'.$value->email.'</option>'; 
            }
            else{
                $output .='<option value="'.$value->id.'">'.$value->email.'</option>'; 
            }
        }
      $output .='</optgroup>';
      
      echo $output;
      
    }


}
