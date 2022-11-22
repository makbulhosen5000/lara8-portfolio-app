<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Session;
use Auth;


class ContactController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $user=Contact::all();
        $contact=Contact::count();
        return view('backend.contact.contact-view', compact('user','contact'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.contact.create-contact');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
       $storeData=new Contact();
       $storeData->created_by=Auth::user()->id;
       $storeData->intro=$request->intro;
       $storeData->name=$request->name;
       $storeData->designation=$request->designation;
       //for resume
       if($request->hasFile('resume')){
        $file=$request->file('resume');
        $extension=$file->getClientOriginalExtension();
        $newImage=time().'.'.$extension;
        $file->move('public/images/resume/',$newImage);
        $storeData->resume=$newImage;
    }else{
        return $request;
        $storeData->resume='';
    }
       //for image
       if($request->hasFile('image')){
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $newImage=time().'.'.$extension;
        $file->move('public/images/image/',$newImage);
        $storeData->image=$newImage;
        }else{
        return $request;
        $storeData->image='';
        }
       $storeData->title=$request->title;
       $storeData->short_desc=$request->short_desc;
       $storeData->long_desc=$request->long_desc;
       $storeData->phone=$request->phone;
       $storeData->email=$request->email;
       $storeData->address=$request->address;
       $storeData->birthday=$request->birthday;
       $storeData->github=$request->github;
       $storeData->linkedin=$request->linkedin;
       $storeData->facebook=$request->facebook;
       $storeData->twitter=$request->twitter;
       $storeData->instagram=$request->instagram;
       $storeData->youtube=$request->youtube;
       $storeData->google=$request->google;
       $storeData->whatsapp=$request->whatsapp;
       $storeData->skype=$request->skype;
       $storeData->created_by=$request->created_by;
       $storeData->updated_by=$request->updated_by;
       $storeData->save();
       Session::flash('success','Contact Created successfully');
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
        $editData=Contact::find($id);
        return view('backend.contact.create-contact',compact('editData'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $updateData=Contact::find($id);
        $updateData->intro=$request->intro;
        $updateData->name=$request->name;
        $updateData->designation=$request->designation;
        // for resume
        if($request->hasFile('resume')){
            $file=$request->file('resume');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('public/images/resume/',$myImage);
            $updateData->resume=$myImage;
        }
           // for image
           if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('public/images/image/',$myImage);
            $updateData->image=$myImage;
        }
        $updateData->title=$request->title;
        $updateData->short_desc=$request->short_desc;
        $updateData->long_desc=$request->long_desc;
        $updateData->phone=$request->phone;
        $updateData->email=$request->email;
        $updateData->address=$request->address;
        $updateData->birthday=$request->birthday;
        $updateData->github=$request->github;
        $updateData->linkedin=$request->linkedin;
        $updateData->facebook=$request->facebook;
        $updateData->twitter=$request->twitter;
        $updateData->instagram=$request->instagram;
        $updateData->youtube=$request->youtube;
        $updateData->google=$request->google;
        $updateData->whatsapp=$request->whatsapp;
        $updateData->skype=$request->skype;
        $updateData->created_by=$request->created_by;
        $updateData->updated_by=$request->updated_by;
        $updateData->save();
        Session::flash('success','Contact Updated Successfully');
        return redirect()->back();
    }

    //delete function is here...........................
    public function destroy(Request $request, $id)
    {
        $deleteData=Contact::find($request->id);
        if(file_exists('public/images/resume/'.$deleteData->resume)AND ! empty($deleteData->resume))
        {
         unlink('public/images/resume/'.$deleteData->resume);
        }
        $deleteData->delete();
       return redirect()->route('contacts.view');
    }
}
