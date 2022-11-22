<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;


class UserController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $user=User::all();
        return view('backend.user.all-user', compact('user') );
    }

    //Create function is here......................................
    public function create()
    {
        return view('backend.user.create-user');
    }

    //Store function is here......................................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'image' => 'required',

        ]);
       $userData=new User();
       $userData->role=$request->role;
       $userData->name=$request->name;
       $userData->phone=$request->phone;
       $userData->email=$request->email;
       $userData->password=bcrypt($request->password);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $newImage=time().'.'.$extension;
            $file->move('upload/user_images/',$newImage);
            $userData->image=$newImage;
        }else{
            return $request;
            $userData->image='';
        }
       $userData->save();
       Session::flash('success','User Created successfully');
       return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    //Edit function is here......................................
    public function edit($id)
    {
        $data=User::find($id);
        return view('backend.user.edit-user',compact('data'));
    }

   //Update function is here......................................
    public function update(Request $request, $id)
    {

        $update=User::find($id);

        $update->role=$request->role;
        $update->name=$request->name;
        $update->phone=$request->phone;
        $update->email=$request->email;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('upload/user_images/',$myImage);
            $update->image=$myImage;
        }
        $update->save();
        Session::flash('success','User Updated successfully');
       return redirect()->back();
    }

    //Delete function is here......................................
    public function destroy($id)
    {
        $data=User::find($id);
        $data->delete();
       return redirect()->route('users.all');
    }
    //password change function here.....................
    public function ChangePassword(){

        return view('backend.user.change-password');

    }
    public function UpdatePassword(Request $request){
        if(Auth::attempt(['id'=>Auth()->id(),'password'=>$request->current_password])){
            $userPass=User::find(Auth()->id());
            $userPass->password=bcrypt($request->new_password);
            $userPass->save();
            Session::flash('success','Password Change Successfully');
            return redirect()->back();
        }else{
            Session::flash('error','Wrong Password!Please Enter the Correct Password');
            return redirect()->back();
        }

    }
}
