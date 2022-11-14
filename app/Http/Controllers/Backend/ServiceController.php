<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Session;
use Auth;


class ServiceController extends Controller
{
     //__ view function is here __//
     public function index()
     {
         $allData=Service::all();
         return view('backend.service.service-view', compact('allData'));
     }
 
       //__ Create function is here __//
       public function create()
       {
           return view('backend.service.service-create');
       }
 
      //__ Store function is here __//
      public function store(Request $request)
      {
          $validatedData = $request->validate([
              'title' => 'required',

          ]);
         $storeData=new Service();
         $storeData->title=$request->title;
         $storeData->description=$request->description;
        //   if($request->hasFile('image')){
        //       $file=$request->file('image');
        //       $extension=$file->getClientOriginalExtension();
        //       $newImage=time().'.'.$extension;
        //       $file->move('public/images/service_images/',$newImage);
        //       $storeData->image=$newImage;
        //   }else{
        //       return $request;
        //       $storeData->image='';
        //   }
         $storeData->save();
         Session::flash('success','Service Created successfully');
         return redirect()->back();
      }
 
     public function show($id)
     {
         //
     }
     //__ edit function is here __//
     public function edit($id)
     {
         $editData=service::find($id);
         return view('backend.service.service-create',compact('editData'));
         // edit
     }
 
     //__ update function is here __//
     public function update(Request $request, $id)
     {
         $updateData=Service::find($id);
         $updateData->title=$request->title;
         $updateData->description=$request->description;
        //  if($request->hasFile('image')){
        //      $file=$request->file('image');
        //      $extension=$file->getClientOriginalExtension();
        //      $myImage=time().'.'.$extension;
        //      $file->move('public/images/service_images/',$myImage);
        //      $updateData->image=$myImage;
        //  }
         $updateData->save();
         Session::flash('success','Service Updated successfully');
        return redirect()->back();
     }
 
     //__delete function is here __//
     public function destroy(Request $request, $id)
     { 
        $deleteData=Service::find($request->id);
        // if(file_exists('public/images/service_images/'.$deleteData->image)AND ! empty($service->image))
        // {
        //  unlink('public/images/service_images/'.$deleteData->image);
        // }
        $deleteData->delete();
        return redirect()->route('services.view');
     }
}
