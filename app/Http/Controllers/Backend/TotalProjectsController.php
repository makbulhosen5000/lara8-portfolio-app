<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\TotalProject;
use App\Models\Skill;
use Illuminate\Http\Request;
use Auth;
use Session;

class TotalProjectsController extends Controller
{
     //view function is here......................................
     public function index()
     {
         $totalProjects=TotalProject::all();
         return view('backend.project.total-project.total-project-view', compact('totalProjects'));
     }
 
       //Create function is here......................................
       public function create()
       {
           return view('backend.project.total-project.total-project-create');
       }
 
     //Store function is here..........................
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'url' => 'required',
             'github' => 'required',
             'image' => 'required',
         ]);
        $storeData=new TotalProject();
        $storeData->title=$request->title;
        $storeData->description=$request->description;
        $storeData->url=$request->url;
        $storeData->github=$request->github;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $newImage=time().'.'.$extension;
            $file->move('public/images/project/',$newImage);
            $storeData->image=$newImage;
        }else{
            return $request;
            $storeData->image='';
        }
        $storeData->save();
        Session::flash('success','Total Project Created successfully');
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
         $editData=totalProject::find($id);
         return view('backend.project.total-project.total-project-create',compact('editData'));
     }
 
     //update function is here.......................
     public function update(Request $request, $id)
     {
         $updateData=totalProject::find($id);
         $updateData->title=$request->title;
         $updateData->description=$request->description;
         $updateData->url=$request->url;
         $updateData->github=$request->github;
         if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('public/images/project/',$myImage);
            $updateData->image=$myImage;
        }
         $updateData->save();
         Session::flash('success','Total Project Updated Successfully');
         return redirect()->back();
     }
 
     //delete function is here...........................
     public function destroy($id)
     {
         $deleteData=totalProject::find($id);
         if(file_exists('public/images/project/'.$deleteData->image)AND ! empty($deleteData->image))
         {
          unlink('public/images/project/'.$deleteData->image);
         }
         $deleteData->delete();
        return redirect()->route('resumes.total.project.view');
     }
}
