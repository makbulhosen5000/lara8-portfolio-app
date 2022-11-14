<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth; 
use Session;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
     //__category view function is here__//
     public function index()
     {
         $category=Category::all();
         // $catCount=Category::count();
         return view('backend.category.view-category', compact('category'));
     }
 
        //__category create function is here__//
       public function create()
       {
           return view('backend.category.create-category');
       }
      //__category store function is here__//
     public function store(CategoryRequest $request)
     {
         $validatedData = $request->validate([
             'name' => 'required|unique:categories,name',
            //  'details' => 'required',
 
         ]);
        $storeData=new Category();
        $storeData->name=$request->name;
        $storeData->slug=Str::slug($request->name);
        $storeData->details=$request->details;
        $storeData->status = (isset($request['status'])) ? 'Active' : 'Inactive';    
        $img=$request->file('image');
        if($img){
          $imgName=date('YmdHi').$img->getClientOriginalName();
          $img->move('public/images/category_image/',$imgName);
          $storeData['image']=$imgName;
         }
      $storeData->save();
      Session::flash('success','Category Created successfully');
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
         $editData=Category::find($id);
         return view('backend.category.create-category',compact('editData'));
     }
 
      //__category update function is here__//
     public function update(CategoryRequest $request, $id)
     {
         $updateData=Category::find($id);
         $updateData->name=$request->name;
         $updateData->slug = Str::slug($request->name);
         $updateData->details=$request->details;
         $updateData->status=(isset($request['status'])) ? 'Active' : 'Inactive';
         $img=$request->file('image');
         if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('public/images/category_image/',$myImage);
            $updateData->image=$myImage;
        }
        $updateData->save();
         Session::flash('success','Category Updated successfully');
        return redirect()->back();
     }
 
     //__category delete function is here__//
     public function destroy(Request $request, $id)
     {
        $deleteData=Category::find($id);
        if(file_exists('public/images/category_image/'.$deleteData->image)AND ! empty($deleteData->image))
        {
         unlink('public/images/category_image/'.$deleteData->image);
        }
       return redirect()->route('categories.view');
     }
}
