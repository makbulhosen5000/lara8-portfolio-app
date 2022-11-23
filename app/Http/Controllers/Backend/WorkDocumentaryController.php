<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\WorkDocumentary;
use Illuminate\Http\Request;
use Auth;
use Session;

class WorkDocumentaryController extends Controller
{
     //view function is here......................................
     public function index()
     {
         $workDocumentary= WorkDocumentary::all();
         return view('backend.work-documentary.work-documentary-view', compact('workDocumentary'));
     }
 
       //Create function is here......................................
       public function create()
       {
           return view('backend.work-documentary.work-documentary-create');
       }
 
     //Store function is here..........................
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'total_work' => 'required',
             'total_project' => 'required',
             'total_experience' => 'required',
             'total_companies' => 'required',
         ]);
        $storeData=new WorkDocumentary();
        $storeData->total_work=$request->total_work;
        $storeData->total_project=$request->total_project;
        $storeData->total_experience=$request->total_experience;
        $storeData->total_companies=$request->total_companies;
        $storeData->save();
        Session::flash('success','Work Documentary Created successfully');
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
         $editData=WorkDocumentary::find($id);
         return view('backend.work-documentary.work-documentary-create',compact('editData'));
     }
 
     //update function is here.......................
     public function update(Request $request, $id)
     {
        $updateData=WorkDocumentary::find($id);
        $updateData->total_work=$request->total_work;
        $updateData->total_project=$request->total_project;
        $updateData->total_experience=$request->total_experience;
        $updateData->total_companies=$request->total_companies;
        $updateData->save();
        Session::flash('success','Work Documentary Updated Successfully');
         return redirect()->back();
     }
 
     //delete function is here...........................
     public function destroy($id)
     {
         $deleteData=WorkDocumentary::find($id);
         $deleteData->delete();
        return redirect()->route("resumes.documentary.view");
     }
}
