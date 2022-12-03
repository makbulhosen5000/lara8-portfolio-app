<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ReactProject;
use Illuminate\Http\Request;
use Auth;
use Session;

class ReactProjectController extends Controller
{
     //view function is here......................................
     public function index()
     {
         $reactProjects=ReactProject::all();
         return view('backend.project.react-project.react-project-view', compact('reactProjects'));
     }
 
       //Create function is here......................................
       public function create()
       {
           return view('backend.project.react-project.react-project-create');
       }
 
     //Store function is here..........................
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'url' => 'required',
             'github' => 'required',
             'image' => 'required',
         ]);
        $storeData=new ReactProject();
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
        Session::flash('success','React Project Created successfully');
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
         $editData=ReactProject::find($id);
         return view('backend.project.react-project.react-project-create',compact('editData'));
     }
 
     //update function is here.......................
     public function update(Request $request, $id)
     {
         $updateData=ReactProject::find($id);
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
         Session::flash('success','react Project Updated Successfully');
         return redirect()->back();
     }
 
     //delete function is here...........................
     public function destroy($id)
     {
         $deleteData=ReactProject::find($id);
         if(file_exists('public/images/project/'.$deleteData->image)AND ! empty($deleteData->image))
         {
          unlink('public/images/project/'.$deleteData->image);
         }
         $deleteData->delete();
        return redirect()->route('resumes.react.project.view');
     }
}
