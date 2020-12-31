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
use Hash;
use Auth;
use DB;
use Validator;
use Mail;
use Carbon\Carbon;
use StdClass;

class AutoCompleteController extends Controller
{
    public function getPackage(Request $request){
        $search_term = $request->term;

        $availableResults = DB::table('food_packages')
            //->select('id,name,register_number,mobile')
            ->where('package_title_english', 'like', '%' . $search_term . '%')
            ->orWhere('package_title_arabic', 'like', '%' . $search_term . '%')
            ->get();
    
        if(!empty($availableResults)){     
            $data['response'] = 'true'; //If username exists set true
            $data['message'] = array();       
            foreach ($availableResults as $key => $value) {                
                $data['message'][] = array(  
                    'label' => $value->package_title_english,
                    'value' => $value->package_title_english,
                    'id'=>$value->id
                );
            }        
        }else{
            $data['response'] = 'false';
        }

        echo json_encode($data); 
        exit;
    }

    public function getPackageID($id)
    {
      $data = food_package::find($id);
      return response()->json($data); 
    }

    public function searchPackage(Request $request)
    {
        $food_package = DB::table('food_packages as f')
         ->where('f.id', $request->package_id)
         ->join('categories as c', 'c.id', '=', 'f.category_id')
         ->select('f.*','c.category_name_english')
         ->first();
        $item = item::all();
        $kitchen_user = kitchen_user::all();
        $category = category::where('category_id','0')->get();
        return view('page.single_item',compact('food_package','item','kitchen_user','category'));
    }
}
