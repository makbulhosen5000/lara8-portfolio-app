<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Auth;
use Session;

class ExperienceController extends Controller
{
     //view function is here......................................
     public function index()
     {
         $experience=Experience::all();
         return view('backend.experience.experience-view', compact('experience'));
     }
 
       //Create function is here......................................
       public function create()
       {
           return view('backend.experience.experience-create');
       }
 
     //Store function is here..........................
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'designation' => 'required',
             'deadline' => 'required',
             'company_name' => 'required',
             'company_address' => 'required',
         ]);
        $storeData=new Experience();
        $storeData->designation=$request->designation;
        $storeData->deadline=$request->deadline;
        $storeData->company_name=$request->company_name;
        $storeData->company_address=$request->company_address;
        $storeData->description=$request->description;
        $storeData->save();
        Session::flash('success','Experience Created successfully');
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
         $editData=Experience::find($id);
         return view('backend.experience.experience-create',compact('editData'));
     }
 
     //update function is here.......................
     public function update(Request $request, $id)
     {
         $updateData=Experience::find($id);
         $updateData->designation=$request->designation;
         $updateData->deadline=$request->deadline;
         $updateData->company_name=$request->company_name;
         $updateData->company_address=$request->company_address;
         $updateData->description=$request->description;
         $updateData->save();
         Session::flash('success','experience Updated Successfully');
         return redirect()->back();
     }
 
     //delete function is here...........................
     public function destroy($id)
     {
         $deleteData=Experience::find($id);
         $deleteData->delete();
        return redirect()->route('resumes.experience.view');
     }
}
