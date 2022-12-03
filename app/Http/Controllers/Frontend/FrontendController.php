<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\CompaniesBrandLogo;
use App\Models\Slider;
use App\Models\About;
use App\Models\Career;
use App\Models\Team;
use App\Models\Service;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Medicine;
use App\Models\News;
use App\Models\Product;
use App\Models\Qualification;
use App\Models\ReactProject;
use App\Models\RecentProject;
use App\Models\Skill;
use App\Models\TotalProject;
use App\Models\Training;
use App\Models\WorkDocumentary;
use Session;
use Mail;


class FrontendController extends Controller
{
    public function index(){
        $data['contact'] = Contact::first();
        $data['experiences'] = Experience::all();
        $data['qualifications'] = Qualification::all();
        $data['qualifications'] = Qualification::all();
        $data['trainings'] = Training::all();
        $data['skills'] = Skill::all();
        $data['languageSkill'] = Language::all();
        $data['workDocumentaries'] = WorkDocumentary::first();
        return view('frontend.layouts.home',$data);
    }
     //__ about function is here __//
     public function about(){
        $data['contact'] = Contact::first();
        return view('frontend.pages.about',$data);
    }

    //__ resume function is here __//
    public function resume(){
        $data['contact'] = Contact::first();
        $data['experiences'] = Experience::all();
        $data['qualifications'] = Qualification::all();
        $data['trainings'] = Training::all();
        $data['skills'] = Skill::all();
        $data['languageSkill'] = Language::all();
        return view('frontend.pages.resume',$data);
    }

     //__ service function is here __//
     public function service(){
        $data['services'] = Service::all();
        $data['contact'] = Contact::first();
        return view('frontend.pages.service',$data);
    }

    //__ portfolio function is here __//
    public function portfolio(){
        $data['contact'] = Contact::first();
        $data['reactProjects'] = ReactProject::all();
        $data['recentProjects'] = RecentProject::all();
        $data['laravelProjects'] = TotalProject::all();
        return view('frontend.pages.portfolio',$data);
    }

    //__ blog function is here __//
    public function blog(){
        $data['contact'] = Contact::first();
        return view('frontend.pages.blog',$data);
    }

    //__ package function is here __//
    public function package(){
    $data['contact'] = Contact::first();
    return view('frontend.pages.package',$data);
    }

    //__ contact function is here __//
    public function contact(){
        $data['contact'] = Contact::first();
        return view('frontend.pages.contact',$data);
    }

    //__ Store Contact Us function__ //
    public function ContactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'massage' => 'required',
        ]);
        $contactUs = new ContactUs();
        $contactUs->name = $request->name;
        $contactUs->phone = $request->phone;
        $contactUs->email = $request->email;
        $contactUs->massage = $request->massage;
        $contactUs->save();
        $data = array(
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'massage' => $request->massage,
        );

        Mail::send('frontend.email.email-contact', $data, function ($mass) {
            $mass->from('mhaakash5000@gmail.com', 'CodingDuck');
            $mass->to('mhaakash5000@gmail.com');
            $mass->subject('Thank you so much for contact with us');
        });
        Session::flash('success', 'Message Sent Successfully');
        return redirect()->back();
    }

    //__ User Email function for Contact Us__ //
    public function UserEmailView()
    {
        $mail['userEmail'] = ContactUs::orderBy('id', 'desc')->get();
        return view('frontend.email.user-email-view', $mail);
    }

    //__ Contact Us Delete function__ //
    public function destroy($id)
    {
        $contactUs = ContactUs::find($id);
        $contactUs->delete();
        return redirect()->back();
    }
}
