<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use Session;
use Auth;
use Illuminate\Support\Str;


class CareerController extends Controller
{
    //__ view function is here __//
    public function index()
    {
        $allData=Career::all();
        $countData =Career::count();
        return view('backend.career.career-view', compact('allData','countData'));
    }

      //__ Create function is here __//
      public function create()
      {
          return view('backend.career.career-create');
      }

     //__ Store function is here __//
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'title' => 'required',
             'short_desc' => 'required',
             'long_desc' => 'required',
             'publish_date' => 'required',
             'expire_date' => 'required',
         ]);
        $storeData=new Career();
        $storeData->title=$request->title;
        $storeData->slug = Str::slug($request->title);
        $storeData->short_desc=$request->short_desc;
        $storeData->long_desc=$request->long_desc;
        $storeData->publish_date=$request->publish_date;
        $storeData->expire_date=$request->expire_date;
        $img=$request->file('image');
        if($img){
            $imgName=date('YmdHi').$img->getClientOriginalName();
            $img->move('public/images/career/',$imgName);
            $storeData['image']=$imgName;
        }
        $storeData->save();
        Session::flash('success','Career Created successfully');
        return redirect()->back();
     }

    //__ pdf view function is here __//
    public function viewPdf($id)
    {
        $showData = Career::find($id);
        return view('backend.career.show-pdf', compact('showData'));
    }
    //__ edit function is here __//
    public function edit($id)
    {
        $editData=Career::find($id);
        return view('backend.career.career-create',compact('editData'));
        // edit
    }

    //__ update function is here __//
    public function update(Request $request, $id)
    {
        $updateData=Career::find($id);
        $updateData->title=$request->title;
        $updateData->slug = Str::slug($request->title);
        $updateData->short_desc=$request->short_desc;
        $updateData->long_desc=$request->long_desc;
        $updateData->publish_date=$request->publish_date;
        $updateData->expire_date=$request->expire_date;
        $img=$request->file('image');
        if($img){
            $imgName=date('YmdHi').$img->getClientOriginalName();
            $img->move('public/images/career/',$imgName);
            if(file_exists('public/images/career/'.$updateData->image)AND ! empty($updateData->image))
            {
             unlink('public/images/career/'.$updateData->image);
            }
            $updateData['image']=$imgName;
        }
        $updateData->save();
        Session::flash('success','Career Updated successfully');
       return redirect()->back();
    }

    //__delete function is here __//
    public function destroy(Request $request, $id)
    { 
       $deleteData=Career::find($request->id);
       if(file_exists('public/images/career/'.$deleteData->image)AND ! empty($deleteData->image))
       {
        unlink('public/images/career/'.$deleteData->image);
       }
       $deleteData->delete();
       return redirect()->route('about.career.view');
    }
}
