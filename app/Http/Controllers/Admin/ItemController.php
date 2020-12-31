<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\food_package;
use App\Models\item;
use App\Models\kitchen_user;
use App\Models\category;
use App\Models\tags;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $item = item::all();
        $category = category::all();
        return view('admin.item',compact('item','category'));
    }

    public function saveItem(Request $request){
        $this->validate($request, [
            'item_name_english'=>'required',
            'item_name_arabic'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Item Image Field is Required',
            'category_id.required' => 'Category Field is Required',
        ]);

        $item = new item;
        $item->item_name_english = $request->item_name_english;
        $item->item_name_arabic = $request->item_name_arabic;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        
        if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('item_files/'), $upload_image);

            $item->image = $upload_image;
        } 
        $item->save();

        return response()->json('successfully save'); 
    }

    public function updateItem(Request $request){
        $this->validate($request, [
            'item_name_english'=>'required',
            'item_name_arabic'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'Item Image Field is Required',
            'category_id.required' => 'Category Field is Required',
        ]);

        $item = item::find($request->id);
        $item->item_name_english = $request->item_name_english;
        $item->item_name_arabic = $request->item_name_arabic;
        $item->price = $request->price;
        $item->category_id = $request->category_id;

        if($request->image!=""){
            $old_image = "item_files/".$item->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('item_files/'), $upload_image);
            $item->image = $upload_image;
            }
        }
        $item->save();

        return response()->json('successfully update'); 
    }
    
    public function editItem($id){
        $item = item::find($id);
        return response()->json($item); 
    }

    public function deleteItem($id){
        $item = item::find($id);
        $item->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function Tags()
    {
    	$tags = tags::all();
        return view('admin.tags',compact('tags'));
    }

    public function saveTags(Request $request){
        $this->validate($request, [
            'tag_name_english'=>'required',
            'tag_name_arabic'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Tag Image Field is Required',
        ]);

        $tags = new tags;
        $tags->tag_name_english = $request->tag_name_english;
        $tags->tag_name_arabic = $request->tag_name_arabic;
        
        if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('item_files/'), $upload_image);

            $tags->image = $upload_image;
        } 
        $tags->save();

        return response()->json('successfully save'); 
    }

    public function updateTags(Request $request){
        $this->validate($request, [
            'tag_name_english'=>'required',
            'tag_name_arabic'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'category Image Field is Required',
        ]);

        $tags = tags::find($request->id);
        $tags->tag_name_english = $request->tag_name_english;
        $tags->tag_name_arabic = $request->tag_name_arabic;

        if($request->image!=""){
            $old_image = "item_files/".$tags->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('item_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        $tags->save();

        return response()->json('successfully update'); 
    }
    
    public function editTags($id){
        $tags = tags::find($id);
        return response()->json($tags); 
    }

    public function deleteTags($id){
        $tags = tags::find($id);
        $tags->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function Category()
    {
    	$category = category::where('category_id','0')->get();
        return view('admin.category',compact('category'));
    }

    public function saveCategory(Request $request){
        $this->validate($request, [
            'category_name_english'=>'required',
            'category_name_arabic'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
        ]);

        $category = new category;
        $category->category_name_english = $request->category_name_english;
        $category->category_name_arabic = $request->category_name_arabic;
        $category->category_id = 0;
        
        if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('item_files/'), $upload_image);

            $category->image = $upload_image;
        } 
        $category->save();

        return response()->json('successfully save'); 
    }

    public function updateCategory(Request $request){
        $this->validate($request, [
            'category_name_english'=>'required',
            'category_name_arabic'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'category Image Field is Required',
        ]);

        $category = category::find($request->id);
        $category->category_name_english = $request->category_name_english;
        $category->category_name_arabic = $request->category_name_arabic;
        $category->category_id = 0;

        if($request->image!=""){
            $old_image = "item_files/".$category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('item_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        $category->save();

        return response()->json('successfully update'); 
    }
    
    public function editCategory($id){
        $category = category::find($id);
        return response()->json($category); 
    }

    public function deleteCategory($id){
        $category = category::find($id);
        $category->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function SubCategory($id)
    {
    	$category = category::where('category_id',$id)->get();
        return view('admin.subcategory',compact('category','id'));
    }

    public function saveSubCategory(Request $request){
        $this->validate($request, [
            'category_name_english'=>'required',
            'category_name_arabic'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
        ]);

        $category = new category;
        $category->category_name_english = $request->category_name_english;
        $category->category_name_arabic = $request->category_name_arabic;
        $category->category_id = $request->category_id;
        
        if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('item_files/'), $upload_image);

            $category->image = $upload_image;
        } 
        $category->save();

        return response()->json('successfully save'); 
    }

    public function updateSubCategory(Request $request){
        $this->validate($request, [
            'category_name_english'=>'required',
            'category_name_arabic'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'category Image Field is Required',
        ]);

        $category = category::find($request->id);
        $category->category_name_english = $request->category_name_english;
        $category->category_name_arabic = $request->category_name_arabic;
        $category->category_id = $request->category_id;

        if($request->image!=""){
            $old_image = "item_files/".$category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('item_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        $category->save();

        return response()->json('successfully update'); 
    }
    
    public function editSubCategory($id){
        $category = category::find($id);
        return response()->json($category); 
    }

    public function deleteSubCategory($id){
        $category = category::find($id);
        $category->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


}
