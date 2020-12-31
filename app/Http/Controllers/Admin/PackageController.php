<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\food_package;
use App\Models\item;
use App\Models\kitchen_user;
use App\Models\category;
use App\Models\tags;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addPackage()
    {
        $tags = tags::all();
        $item = item::all();
        $category = category::all();
        $kitchen_user = kitchen_user::all();
        return view('admin.addpackage',compact('item','category','kitchen_user','tags'));
    }


    public function foodPackage()
    {
        $food_package = food_package::all();
        $item = item::all();
        $kitchen_user = kitchen_user::all();
        $category = category::all();
        return view('admin.food_package',compact('food_package','item','kitchen_user','category'));
    }

    public function saveFoodPackage(Request $request){
        $this->validate($request, [
            'package_title_arabic'=>'required',
            'package_title_english'=>'required',
            'category_id'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Package Image Field is Required',
            'category_id.required' => 'Category Field is Required',
        ]);
        

        $kitchen_ids='';
        $kitchen_id;
        foreach($request->kitchen_ids as $row){
            $kitchen_id[]=$row;
        }
        $kitchen_ids = collect($kitchen_id)->implode(',');
    $breakfast_sunday_items='';
    $breakfast_monday_items='';
    $breakfast_tuesday_items='';
    $breakfast_wednesday_items='';
    $breakfast_thursday_items='';
    $breakfast_friday_items='';
    $breakfast_saturday_items='';
    if($request->breakfast_enable == '1'){
        $breakfast_sunday_item;
        foreach($request->breakfast_sunday_items as $row){
            $breakfast_sunday_item[]=$row;
        }
        $breakfast_sunday_items = collect($breakfast_sunday_item)->implode(',');

        $breakfast_monday_item;
        foreach($request->breakfast_monday_items as $row){
            $breakfast_monday_item[]=$row;
        }
        $breakfast_monday_items = collect($breakfast_monday_item)->implode(',');

        $breakfast_tuesday_item;
        foreach($request->breakfast_tuesday_items as $row){
            $breakfast_tuesday_item[]=$row;
        }
        $breakfast_tuesday_items = collect($breakfast_tuesday_item)->implode(',');

        $breakfast_wednesday_item;
        foreach($request->breakfast_wednesday_items as $row){
            $breakfast_wednesday_item[]=$row;
        }
        $breakfast_wednesday_items = collect($breakfast_wednesday_item)->implode(',');

        $breakfast_thursday_item;
        foreach($request->breakfast_thursday_items as $row){
            $breakfast_thursday_item[]=$row;
        }
        $breakfast_thursday_items = collect($breakfast_thursday_item)->implode(',');

        $breakfast_friday_item;
        foreach($request->breakfast_friday_items as $row){
            $breakfast_friday_item[]=$row;
        }
        $breakfast_friday_items = collect($breakfast_friday_item)->implode(',');

        $breakfast_saturday_item;
        foreach($request->breakfast_saturday_items as $row){
            $breakfast_saturday_item[]=$row;
        }
        $breakfast_saturday_items = collect($breakfast_saturday_item)->implode(',');
    }
    $lunch_sunday_items='';
    $lunch_monday_items='';
    $lunch_tuesday_items='';
    $lunch_wednesday_items='';
    $lunch_thursday_items='';
    $lunch_friday_items='';
    $lunch_saturday_items='';
    if($request->lunch_enable == '1'){
        $lunch_sunday_item;
        foreach($request->lunch_sunday_items as $row){
            $lunch_sunday_item[]=$row;
        }
        $lunch_sunday_items = collect($lunch_sunday_item)->implode(',');

        $lunch_monday_item;
        foreach($request->lunch_monday_items as $row){
            $lunch_monday_item[]=$row;
        }
        $lunch_monday_items = collect($lunch_monday_item)->implode(',');

        $lunch_tuesday_item;
        foreach($request->lunch_tuesday_items as $row){
            $lunch_tuesday_item[]=$row;
        }
        $lunch_tuesday_items = collect($lunch_tuesday_item)->implode(',');

        $lunch_wednesday_item;
        foreach($request->lunch_wednesday_items as $row){
            $lunch_wednesday_item[]=$row;
        }
        $lunch_wednesday_items = collect($lunch_wednesday_item)->implode(',');

        $lunch_thursday_item;
        foreach($request->lunch_thursday_items as $row){
            $lunch_thursday_item[]=$row;
        }
        $lunch_thursday_items = collect($lunch_thursday_item)->implode(',');

        $lunch_friday_item;
        foreach($request->lunch_friday_items as $row){
            $lunch_friday_item[]=$row;
        }
        $lunch_friday_items = collect($lunch_friday_item)->implode(',');

        $lunch_saturday_item;
        foreach($request->lunch_saturday_items as $row){
            $lunch_saturday_item[]=$row;
        }
        $lunch_saturday_items = collect($lunch_saturday_item)->implode(',');
    }

    $dinner_sunday_items='';
    $dinner_monday_items='';
    $dinner_tuesday_items='';
    $dinner_wednesday_items='';
    $dinner_thursday_items='';
    $dinner_friday_items='';
    $dinner_saturday_items='';
    if($request->dinner_enable == '1'){
        $dinner_sunday_item;
        foreach($request->dinner_sunday_items as $row){
            $dinner_sunday_item[]=$row;
        }
        $dinner_sunday_items = collect($dinner_sunday_item)->implode(',');

        $dinner_monday_item;
        foreach($request->dinner_monday_items as $row){
            $dinner_monday_item[]=$row;
        }
        $dinner_monday_items = collect($dinner_monday_item)->implode(',');

        $dinner_tuesday_item;
        foreach($request->dinner_tuesday_items as $row){
            $dinner_tuesday_item[]=$row;
        }
        $dinner_tuesday_items = collect($dinner_tuesday_item)->implode(',');

        $dinner_wednesday_item;
        foreach($request->dinner_wednesday_items as $row){
            $dinner_wednesday_item[]=$row;
        }
        $dinner_wednesday_items = collect($dinner_wednesday_item)->implode(',');

        $dinner_thursday_item;
        foreach($request->dinner_thursday_items as $row){
            $dinner_thursday_item[]=$row;
        }
        $dinner_thursday_items = collect($dinner_thursday_item)->implode(',');

        $dinner_friday_item;
        foreach($request->dinner_friday_items as $row){
            $dinner_friday_item[]=$row;
        }
        $dinner_friday_items = collect($dinner_friday_item)->implode(',');

       
        $dinner_saturday_item;
        foreach($request->dinner_saturday_items as $row){
            $dinner_saturday_item[]=$row;
        }
        $dinner_saturday_items = collect($dinner_saturday_item)->implode(',');
    }
        

        $food_package = new food_package;
        $food_package->package_title_arabic = $request->package_title_arabic;
        $food_package->package_title_english = $request->package_title_english;
        $food_package->description_arabic = $request->description_arabic;
        $food_package->description_english = $request->description_english;
        $food_package->kitchen_ids = $kitchen_ids;
        $food_package->breakfast_enable = $request->breakfast_enable;
        $food_package->lunch_enable = $request->lunch_enable;
        $food_package->dinner_enable = $request->dinner_enable;
    if($request->breakfast_enable == '1'){ 
        $food_package->breakfast_price = $request->breakfast_price;
        $food_package->breakfast_sunday_items = $breakfast_sunday_items;
        $food_package->breakfast_monday_items = $breakfast_monday_items;
        $food_package->breakfast_tuesday_items = $breakfast_tuesday_items;
        $food_package->breakfast_wednesday_items = $breakfast_wednesday_items;
        $food_package->breakfast_thursday_items = $breakfast_thursday_items;
        $food_package->breakfast_friday_items = $breakfast_friday_items;
        $food_package->breakfast_saturday_items = $breakfast_saturday_items;
    }   
    if($request->lunch_enable == '1'){ 
        $food_package->lunch_price = $request->lunch_price;
        $food_package->lunch_sunday_items = $lunch_sunday_items;
        $food_package->lunch_monday_items = $lunch_monday_items;
        $food_package->lunch_tuesday_items = $lunch_tuesday_items;
        $food_package->lunch_wednesday_items = $lunch_wednesday_items;
        $food_package->lunch_thursday_items = $lunch_thursday_items;
        $food_package->lunch_friday_items = $lunch_friday_items;
        $food_package->lunch_saturday_items = $lunch_saturday_items;
    }
    if($request->dinner_enable == '1'){ 
        $food_package->dinner_price = $request->dinner_price;
        $food_package->dinner_sunday_items = $dinner_sunday_items;
        $food_package->dinner_monday_items = $dinner_monday_items;
        $food_package->dinner_tuesday_items = $dinner_tuesday_items;
        $food_package->dinner_wednesday_items = $dinner_wednesday_items;
        $food_package->dinner_thursday_items = $dinner_thursday_items;
        $food_package->dinner_friday_items = $dinner_friday_items;
        $food_package->dinner_saturday_items = $dinner_saturday_items;
    }
        $food_package->category_id = $request->category_id;
        
        if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('item_files/'), $upload_image);

            $food_package->image = $upload_image;
        } 
        $food_package->save();

        return response()->json('successfully save'); 
    }

    public function updateFoodPackage(Request $request){
        $this->validate($request, [
            'package_title_arabic'=>'required',
            'package_title_english'=>'required',
            'category_id'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'Package Image Field is Required',
            'category_id.required' => 'Category Field is Required',
        ]);

        $kitchen_ids='';
        $kitchen_id;
        foreach($request->kitchen_ids as $row){
            $kitchen_id[]=$row;
        }
        $kitchen_ids = collect($kitchen_id)->implode(',');
    $breakfast_sunday_items='';
    $breakfast_monday_items='';
    $breakfast_tuesday_items='';
    $breakfast_wednesday_items='';
    $breakfast_thursday_items='';
    $breakfast_friday_items='';
    $breakfast_saturday_items='';
    if($request->breakfast_enable == '1'){
        $breakfast_sunday_item;
        foreach($request->breakfast_sunday_items as $row){
            $breakfast_sunday_item[]=$row;
        }
        $breakfast_sunday_items = collect($breakfast_sunday_item)->implode(',');

        $breakfast_monday_item;
        foreach($request->breakfast_monday_items as $row){
            $breakfast_monday_item[]=$row;
        }
        $breakfast_monday_items = collect($breakfast_monday_item)->implode(',');

        $breakfast_tuesday_item;
        foreach($request->breakfast_tuesday_items as $row){
            $breakfast_tuesday_item[]=$row;
        }
        $breakfast_tuesday_items = collect($breakfast_tuesday_item)->implode(',');

        $breakfast_wednesday_item;
        foreach($request->breakfast_wednesday_items as $row){
            $breakfast_wednesday_item[]=$row;
        }
        $breakfast_wednesday_items = collect($breakfast_wednesday_item)->implode(',');

        $breakfast_thursday_item;
        foreach($request->breakfast_thursday_items as $row){
            $breakfast_thursday_item[]=$row;
        }
        $breakfast_thursday_items = collect($breakfast_thursday_item)->implode(',');

        $breakfast_friday_item;
        foreach($request->breakfast_friday_items as $row){
            $breakfast_friday_item[]=$row;
        }
        $breakfast_friday_items = collect($breakfast_friday_item)->implode(',');

        $breakfast_saturday_item;
        foreach($request->breakfast_saturday_items as $row){
            $breakfast_saturday_item[]=$row;
        }
        $breakfast_saturday_items = collect($breakfast_saturday_item)->implode(',');
    }
    $lunch_sunday_items='';
    $lunch_monday_items='';
    $lunch_tuesday_items='';
    $lunch_wednesday_items='';
    $lunch_thursday_items='';
    $lunch_friday_items='';
    $lunch_saturday_items='';
    if($request->lunch_enable == '1'){
        $lunch_sunday_item;
        foreach($request->lunch_sunday_items as $row){
            $lunch_sunday_item[]=$row;
        }
        $lunch_sunday_items = collect($lunch_sunday_item)->implode(',');

        $lunch_monday_item;
        foreach($request->lunch_monday_items as $row){
            $lunch_monday_item[]=$row;
        }
        $lunch_monday_items = collect($lunch_monday_item)->implode(',');

        $lunch_tuesday_item;
        foreach($request->lunch_tuesday_items as $row){
            $lunch_tuesday_item[]=$row;
        }
        $lunch_tuesday_items = collect($lunch_tuesday_item)->implode(',');

        $lunch_wednesday_item;
        foreach($request->lunch_wednesday_items as $row){
            $lunch_wednesday_item[]=$row;
        }
        $lunch_wednesday_items = collect($lunch_wednesday_item)->implode(',');

        $lunch_thursday_item;
        foreach($request->lunch_thursday_items as $row){
            $lunch_thursday_item[]=$row;
        }
        $lunch_thursday_items = collect($lunch_thursday_item)->implode(',');

        $lunch_friday_item;
        foreach($request->lunch_friday_items as $row){
            $lunch_friday_item[]=$row;
        }
        $lunch_friday_items = collect($lunch_friday_item)->implode(',');

        $lunch_saturday_item;
        foreach($request->lunch_saturday_items as $row){
            $lunch_saturday_item[]=$row;
        }
        $lunch_saturday_items = collect($lunch_saturday_item)->implode(',');
    }

    $dinner_sunday_items='';
    $dinner_monday_items='';
    $dinner_tuesday_items='';
    $dinner_wednesday_items='';
    $dinner_thursday_items='';
    $dinner_friday_items='';
    $dinner_saturday_items='';
    if($request->dinner_enable == '1'){
        $dinner_sunday_item;
        foreach($request->dinner_sunday_items as $row){
            $dinner_sunday_item[]=$row;
        }
        $dinner_sunday_items = collect($dinner_sunday_item)->implode(',');

        $dinner_monday_item;
        foreach($request->dinner_monday_items as $row){
            $dinner_monday_item[]=$row;
        }
        $dinner_monday_items = collect($dinner_monday_item)->implode(',');

        $dinner_tuesday_item;
        foreach($request->dinner_tuesday_items as $row){
            $dinner_tuesday_item[]=$row;
        }
        $dinner_tuesday_items = collect($dinner_tuesday_item)->implode(',');

        $dinner_wednesday_item;
        foreach($request->dinner_wednesday_items as $row){
            $dinner_wednesday_item[]=$row;
        }
        $dinner_wednesday_items = collect($dinner_wednesday_item)->implode(',');

        $dinner_thursday_item;
        foreach($request->dinner_thursday_items as $row){
            $dinner_thursday_item[]=$row;
        }
        $dinner_thursday_items = collect($dinner_thursday_item)->implode(',');

        $dinner_friday_item;
        foreach($request->dinner_friday_items as $row){
            $dinner_friday_item[]=$row;
        }
        $dinner_friday_items = collect($dinner_friday_item)->implode(',');

       
        $dinner_saturday_item;
        foreach($request->dinner_saturday_items as $row){
            $dinner_saturday_item[]=$row;
        }
        $dinner_saturday_items = collect($dinner_saturday_item)->implode(',');
    }

        $food_package = food_package::find($request->id);
        $food_package->package_title_arabic = $request->package_title_arabic;
        $food_package->package_title_english = $request->package_title_english;
        $food_package->description_arabic = $request->description_arabic;
        $food_package->description_english = $request->description_english;
        $food_package->kitchen_ids = $kitchen_ids;
        $food_package->breakfast_enable = $request->breakfast_enable;
        $food_package->lunch_enable = $request->lunch_enable;
        $food_package->dinner_enable = $request->dinner_enable;
    if($request->breakfast_enable == '1'){ 
        $food_package->breakfast_price = $request->breakfast_price;
        $food_package->breakfast_sunday_items = $breakfast_sunday_items;
        $food_package->breakfast_monday_items = $breakfast_monday_items;
        $food_package->breakfast_tuesday_items = $breakfast_tuesday_items;
        $food_package->breakfast_wednesday_items = $breakfast_wednesday_items;
        $food_package->breakfast_thursday_items = $breakfast_thursday_items;
        $food_package->breakfast_friday_items = $breakfast_friday_items;
        $food_package->breakfast_saturday_items = $breakfast_saturday_items;
    }   
    if($request->lunch_enable == '1'){ 
        $food_package->lunch_price = $request->lunch_price;
        $food_package->lunch_sunday_items = $lunch_sunday_items;
        $food_package->lunch_monday_items = $lunch_monday_items;
        $food_package->lunch_tuesday_items = $lunch_tuesday_items;
        $food_package->lunch_wednesday_items = $lunch_wednesday_items;
        $food_package->lunch_thursday_items = $lunch_thursday_items;
        $food_package->lunch_friday_items = $lunch_friday_items;
        $food_package->lunch_saturday_items = $lunch_saturday_items;
    }
    if($request->dinner_enable == '1'){ 
        $food_package->dinner_price = $request->dinner_price;
        $food_package->dinner_sunday_items = $dinner_sunday_items;
        $food_package->dinner_monday_items = $dinner_monday_items;
        $food_package->dinner_tuesday_items = $dinner_tuesday_items;
        $food_package->dinner_wednesday_items = $dinner_wednesday_items;
        $food_package->dinner_thursday_items = $dinner_thursday_items;
        $food_package->dinner_friday_items = $dinner_friday_items;
        $food_package->dinner_saturday_items = $dinner_saturday_items;
    }
        $food_package->category_id = $request->category_id;

        if($request->image!=""){
            $old_image = "item_files/".$food_package->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('item_files/'), $upload_image);
            $food_package->image = $upload_image;
            }
        }
        $food_package->save();

        return response()->json('successfully update'); 
    }
    
    public function editFoodPackage($id){
        $food_package = food_package::find($id);
        $tags = tags::all();
        $item = item::all();
        $category = category::all();
        $kitchen_user = kitchen_user::all();
        return view('admin.editpackage',compact('item','category','kitchen_user','food_package','tags'));
    }

    public function deleteFoodPackage($id){
        $food_package = food_package::find($id);
        $food_package->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }



}
