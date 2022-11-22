<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Auth;
use Session;

class QualificationController extends Controller
{
     //view function is here......................................
     public function index()
     {
         $education=Qualification::all();
         return view('backend.education.education-view', compact('education'));
     }
 
       //Create function is here......................................
       public function create()
       {
           return view('backend.education.education-create');
       }
 
     //Store function is here..........................
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'qualification' => 'required',
             'deadline' => 'required',
             'address' => 'required',
         ]);
        $storeData=new Qualification();
        $storeData->qualification=$request->qualification;
        $storeData->deadline=$request->deadline;
        $storeData->address=$request->address;
        $storeData->description=$request->description;
        $storeData->save();
        Session::flash('success','Qualification Created successfully');
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
         $editData=Qualification::find($id);
         return view('backend.education.education-create',compact('editData'));
     }
 
     //update function is here.......................
     public function update(Request $request, $id)
     {
         $updateData=Qualification::find($id);
         $updateData->qualification=$request->qualification;
         $updateData->deadline=$request->deadline;
         $updateData->address=$request->address;
         $updateData->description=$request->description;
         $updateData->save();
         Session::flash('success','Qualification Updated Successfully');
         return redirect()->back();
     }
 
     //delete function is here...........................
     public function destroy($id)
     {
         $deleteData=Qualification::find($id);
         $deleteData->delete();
        return redirect()->route('educations.view');
     }
}
