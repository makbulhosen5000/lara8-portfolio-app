<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Skill;
use Illuminate\Http\Request;
use Auth;
use Session;

class LanguageController extends Controller
{
     //view function is here......................................
     public function index()
     {
         $language=Language::all();
         return view('backend.skill.language.language-view', compact('language'));
     }
 
       //Create function is here......................................
       public function create()
       {
           return view('backend.skill.language.language-create');
       }
 
     //Store function is here..........................
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'language' => 'required',
         ]);
        $storeData=new Language();
        $storeData->language=$request->language;
        $storeData->percentage=$request->percentage;
        $storeData->save();
        Session::flash('success','Language Created successfully');
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
         $editData=Language::find($id);
         return view('backend.skill.language.language-create',compact('editData'));
     }
 
     //update function is here.......................
     public function update(Request $request, $id)
     {
         $updateData=Language::find($id);
         $updateData->language=$request->language;
         $updateData->percentage=$request->percentage;
         $updateData->save();
         Session::flash('success','Language Updated Successfully');
         return redirect()->back();
     }
 
     //delete function is here...........................
     public function destroy($id)
     {
         $deleteData=Language::find($id);
         $deleteData->delete();
        return redirect()->route('resumes.language.view');
     }
}
