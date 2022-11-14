<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompaniesBrandLogo;
use Auth;
use Session;

class CompaniesBrandLogoController extends Controller
{
      //view function is here......................................
      public function index()
      {
          $user=CompaniesBrandLogo::all();
          return view('backend.companies-logo.companies-logo-view', compact('user') );
      }
  
        //Create function is here......................................
        public function create()
        {
            return view('backend.companies-logo.companies-logo-create');
        }
  
      //Store function is here..........................
      public function store(Request $request)
      {
          $validatedData = $request->validate([
            //   'title' => 'required',
              'image' => 'required',
          ]);
         $userData=new CompaniesBrandLogo();
        //  $userData->title=$request->title;
          if($request->hasFile('image')){
              $file=$request->file('image');
              $extension=$file->getClientOriginalExtension();
              $newImage=time().'.'.$extension;
              $file->move('public/images/companies-image/',$newImage);
              $userData->image=$newImage;
          }else{
              return $request;
              $userData->image='';
          }
         $userData->save();
         Session::flash('success','Companies Brand Logo Created successfully');
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
          $data=CompaniesBrandLogo::find($id);
          return view('backend.companies-logo.companies-logo-edit',compact('data'));
      }
  
      //update function is here.......................
      public function update(Request $request, $id)
      {
          $update=CompaniesBrandLogo::find($id);
        //   $update->title=$request->title;
          $update->image=$request->image;
          if($request->hasFile('image')){
              $file=$request->file('image');
              $extension=$file->getClientOriginalExtension();
              $myImage=time().'.'.$extension;
              $file->move('public/images/companies-image/',$myImage);
              $update->image=$myImage;
          }
          $update->save();
          Session::flash('success','Companies Brand Logo Updated successfully');
         return redirect()->back();
      }
  
      //delete function is here...........................
      public function destroy(Request $request,$id)
      {
          $deleteData=CompaniesBrandLogo::find($request->id);
          if(file_exists('public/images/companies-image/'.$deleteData->image)AND ! empty($deleteData->image))
          {
           unlink('public/images/companies-image/'.$deleteData->image);
          }
          $deleteData->delete();
   
         return redirect()->route('companies.logo.view');
  
      }
}
