<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\RecentProject;
use App\Models\Skill;
use Illuminate\Http\Request;
use Auth;
use Session;

class RecentProjectsController extends Controller
{
     //view function is here......................................
     public function index()
     {
         $recentProjects=RecentProject::all();
         return view('backend.project.recent-project.recent-project-view', compact('recentProjects'));
     }
 
       //Create function is here......................................
       public function create()
       {
           return view('backend.project.recent-project.recent-project-create');
       }
 
     //Store function is here..........................
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'title' => 'required',
             'url' => 'required',
             'image' => 'required',
         ]);
        $storeData=new RecentProject();
        $storeData->title=$request->title;
        $storeData->description=$request->description;
        $storeData->url=$request->url;
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
        Session::flash('success','Recent Project Created successfully');
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
         return view('backend.project.recent-project.recent-project-create',compact('editData'));
     }
 
     //update function is here.......................
     public function update(Request $request, $id)
     {
         $updateData=RecentProject::find($id);
         $updateData->title=$request->title;
         $updateData->description=$request->description;
         $updateData->url=$request->url;
         if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('public/images/project/',$myImage);
            $updateData->image=$myImage;
        }
         $updateData->save();
         Session::flash('success','Recent Project Updated Successfully');
         return redirect()->back();
     }
 
     //delete function is here...........................
     public function destroy($id)
     {
         $deleteData=RecentProject::find($id);
         if(file_exists('public/images/project/'.$deleteData->image)AND ! empty($deleteData->image))
         {
          unlink('public/images/project/'.$deleteData->image);
         }
         $deleteData->delete();
        return redirect()->route('resumes.recent.project.view');
     }
}
