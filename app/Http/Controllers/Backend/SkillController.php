<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Auth;
use Session;

class SkillController extends Controller
{
     //view function is here......................................
     public function index()
     {
         $skill=Skill::all();
         return view('backend.skill.skill-view', compact('skill'));
     }
 
       //Create function is here......................................
       public function create()
       {
           return view('backend.skill.skill-create');
       }
 
     //Store function is here..........................
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'skill' => 'required',
         ]);
        $storeData=new Skill();
        $storeData->skill=$request->skill;
        $storeData->percentage=$request->percentage;
        $storeData->save();
        Session::flash('success','Skill Created successfully');
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
         $editData=Skill::find($id);
         return view('backend.skill.skill-create',compact('editData'));
     }
 
     //update function is here.......................
     public function update(Request $request, $id)
     {
         $updateData=Skill::find($id);
         $updateData->skill=$request->skill;
         $updateData->percentage=$request->percentage;
         $updateData->save();
         Session::flash('success','skill Updated Successfully');
         return redirect()->back();
     }
 
     //delete function is here...........................
     public function destroy($id)
     {
         $deleteData=Skill::find($id);
         $deleteData->delete();
        return redirect()->route('resumes.skill.view');
     }
}
