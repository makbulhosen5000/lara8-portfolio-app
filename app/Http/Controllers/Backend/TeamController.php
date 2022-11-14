<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Session;
use Auth;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $user =Team::all();
        $team=Team::count();
        return view('backend.team.view-team', compact('user','team'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.team.create-team');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required',

        ]);
       $storeData=new team();
       $storeData->name=$request->name;
       $storeData->slug=Str::slug($request->name);
       $storeData->designation=$request->designation;
       $storeData->description=$request->description;
       if($request->hasFile('image')){
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $newImage=time().'.'.$extension;
        $file->move('public/images/team/',$newImage);
        $storeData->image=$newImage;
       }else{
        return $request;
        $storeData->image='';
       }
       $storeData->save();
       Session::flash('success','Team Created successfully');
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
        $editData=Team::find($id);

        return view('backend.team.edit-team',compact('editData'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $updateData=Team::find($request->id);
        $updateData->name=$request->name;
        $updateData->slug=Str::slug($request->name);
        $updateData->designation=$request->designation;
        $updateData->description=$request->description;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('public/images/team/',$myImage);
            $updateData->image=$myImage;
        }
        $updateData->save();
        Session::flash('success','Team Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy(Request $request,$id)
    {
        $deleteData=Team::find($request->id);
       if(file_exists('public/images/team/'.$deleteData->image)AND ! empty($deleteData->image))
       {
        unlink('public/images/team/'.$deleteData->image);
       }
       $deleteData->delete();
       return redirect()->route('about.team.view');
    }
}
