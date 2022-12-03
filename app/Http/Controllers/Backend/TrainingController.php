<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Auth;
use Session;

class TrainingController extends Controller
{
     //view function is here......................................
     public function index()
     {
         $training=Training::all();
         return view('backend.training.training-view', compact('training'));
     }
 
       //Create function is here......................................
       public function create()
       {
           return view('backend.training.training-create');
       }
 
     //Store function is here..........................
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'training' => 'required',
             'institute' => 'required',
             'deadline' => 'required',
             'address' => 'required',
         ]);
        $storeData=new Training();
        $storeData->training=$request->training;
        $storeData->institute=$request->institute;
        $storeData->deadline=$request->deadline;
        $storeData->address=$request->address;
        $storeData->description=$request->description;
        $storeData->save();
        Session::flash('success','Training Created successfully');
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
         $editData=Training::find($id);
         return view('backend.training.training-create',compact('editData'));
     }
 
     //update function is here.......................
     public function update(Request $request, $id)
     {
         $updateData=Training::find($id);
         $updateData->training=$request->training;
         $updateData->institute=$request->institute;
         $updateData->deadline=$request->deadline;
         $updateData->address=$request->address;
         $updateData->description=$request->description;
         $updateData->save();
         Session::flash('success','Training Updated Successfully');
         return redirect()->back();
     }
 
     //delete function is here...........................
     public function destroy($id)
     {
         $deleteData=Training::find($id);
         $deleteData->delete();
        return redirect()->route('resumes.training.view');
     }
}
