<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\UserLocation;
use Auth;
use Session;


class UserLocationController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $data['userLocations']=UserLocation::all();
        return view('backend.user-location.location-view',$data);
    }

      //Create function is here......................................
      public function create()
      {
        return view('backend.user-location.location-create');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
        ]);
       $userData=new UserLocation();
       $userData->created_by=Auth::user()->id;
       $userData->created_by=$request->created_by;
       $userData->updated_by=$request->updated_by;
       
       $userData->save();
       Session::flash('success','User Location Created successfully');
       return redirect()->route('users.location.view');
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


   

  
}
