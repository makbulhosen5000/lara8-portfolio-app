<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Auth;
use Session;

class MedicineFishFeedController extends Controller
{
    //__category view function is here__//
    public function index()
    {
        $medicine=Medicine::all();
        // $catCount=Category::count();
        return view('backend.medicine-fish-feed.view-medicine', compact('medicine'));
    }

       //__category create function is here__//
      public function create()
      {

          return view('backend..medicine-fish-feed.create-medicine');
      }

     //__category store function is here__//
   //Store function is here..........................
   public function store(Request $request)
   {

           $validatedData = $request->validate([
               'name' => 'required|unique:medicines,name',
               'image' => 'required',
           ]);


      $storeData=new Medicine();
      $storeData->name=$request->name;
      $storeData->slug=Str::slug($request->name);
      $storeData->price=$request->price;
      $storeData->short_desc=$request->short_desc;
      $storeData->long_desc=$request->long_desc;
      $img=$request->file('image');
      if($img){
          $imgName=date('YmdHi').$img->getClientOriginalName();
          $img->move('public/images/medicine/',$imgName);
          $storeData['image']=$imgName;
      }
      $storeData->save();
     
      Session::flash('success','Medicine Fish Feed Created successfully');
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
        $data['editData']=Medicine::find($id);
        return view('backend.medicine-fish-feed.create-medicine',$data);
    } 
     //__category update function is here__//
    public function update(Request $request, $id)
    {
       $updateData=Medicine::find($id);
       $updateData->name=$request->name;
       $updateData->slug=str_slug($request->name);
       $updateData->price=$request->price;
       $updateData->short_desc=$request->short_desc;
       $updateData->long_desc=$request->long_desc;
       $img=$request->file('image');
       if($img){
           $imgName=date('YmdHi').$img->getClientOriginalName();
           $img->move('public/images/medicine/',$imgName);
           if(file_exists('public/images/medicine/'.$updateData->image)AND ! empty($updateData->image))
           {
            unlink('public/images/medicine/'.$updateData->image);
           }
           $updateData['image']=$imgName;
       }
       $updateData->save();
       Session::flash('success','Medicine Fish Feed Updated Successfully');
       return redirect()->back();
    }
    
    //__ Product delete function is here __//
    public function destroy(Request $request, $id)
    { 
        $deleteData=Medicine::find($request->id);
        if(file_exists('public/images/medicine/'.$deleteData->image)AND ! empty($deleteData->image))
        {
         unlink('public/images/medicine/'.$deleteData->image);
        }
        $deleteData->delete();
        return redirect()->route('products.medicine.view');
    }

}
