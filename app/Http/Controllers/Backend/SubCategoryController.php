<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Auth; 
use Session;
use App\Http\Requests\SubCategoryRequest;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
       //__category view function is here__//
       public function index()
       {
           $subCategories=SubCategory::all();
           $dataCount=SubCategory::count();
           return view('backend.sub-category.view-sub-category', compact('subCategories','dataCount'));
       }
   
          //__category create function is here__//
         public function create()
         {
            $categories=Category::all();
            $subCategories=SubCategory::all();
             return view('backend.sub-category.create-sub-category',compact('categories','subCategories'));
         }
         public function get_sub_cat(Request $request) {
            // return $request->data;
             $subcate = SubCategory::where('category_id', '=', $request->cate)->get();
             return $subcate;
           }
   
        //__category store function is here__//
       public function store(SubCategoryRequest $request)
       {
           $validatedData = $request->validate([
               'category_id' => 'required',
            //    'name' => 'required'
   
           ]);
          $storeData=new SubCategory();
          $storeData->category_id=$request->category_id;
          $storeData->name=$request->name;
          $storeData->slug=Str::slug($request->name);
          $storeData->details=$request->details;
          $storeData->status=(isset($request['status'])) ? 'Active' : 'Inactive';
          $img=$request->file('image');
          if($img){
              $imgName=date('YmdHi').$img->getClientOriginalName();
              $img->move('public/images/sub_category_image/',$imgName);
              $storeData['image']=$imgName;
          }
          $storeData->save();
          Session::flash('success','Sub Category Created successfully');
          return redirect()->back();
       }
   
       /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
       public function show($id)
       {
           //
       }
       //edit function is here.......................
       public function edit($id)
       {
           $categories=Category::all();
           $editData=SubCategory::find($id);
           return view('backend.sub-category.create-sub-category',compact('editData','categories'));
       }
   
        //__category update function is here__//
       public function update(SubCategoryRequest $request, $id)
       {
           $updateData=SubCategory::find($id);
           $updateData->category_id=$request->category_id;
           $updateData->name=$request->name;
           $updateData->slug=Str::slug($request->name);
        //    $updateData->slug=$request->name;
           $updateData->details=$request->details;
           $updateData->status=(isset($request['status'])) ? 'Active' : 'Inactive';
           $img=$request->file('image');
         if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('public/images/sub_category_image/',$myImage);
            $updateData->image=$myImage;
        }
        $updateData->save();
           Session::flash('success','Sub Category Updated successfully');
          return redirect()->back();
       }
   
       //__category delete function is here__//
       public function destroy(Request $request, $id)
       {
          $deleteData=SubCategory::find($request->id);
          if(file_exists('public/images/sub_category_image/'.$deleteData->image)AND ! empty($deleteData->image))
          {
           unlink('public/images/sub_category_image/'.$deleteData->image);
          }
          $deleteData->delete();
         return redirect()->route('sub.categories.view');
       }
}
