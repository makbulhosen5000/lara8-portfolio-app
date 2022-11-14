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
use App\Models\Medicine;
use App\Models\News;
use App\Models\Product;

use Session;
use Mail;


class FrontendController extends Controller
{
    public function index(){
        return view('frontend.layouts.home');
    }
     //__ about function is here __//
     public function about(){
        return view('frontend.pages.about');
    }

    //__ resume function is here __//
    public function resume(){
        return view('frontend.pages.resume');
    }

     //__ service function is here __//
     public function service(){
        return view('frontend.pages.service');
    }

    //__ portfolio function is here __//
    public function portfolio(){
        return view('frontend.pages.portfolio');
    }

    //__ blog function is here __//
    public function blog(){
        return view('frontend.pages.blog');
    }

    //__ package function is here __//
    public function package(){
    return view('frontend.pages.package');
    }

    //__ contact function is here __//
    public function contact(){
        return view('frontend.pages.contact');
    }

    //__ Store Contact Us function__ //
    public function ContactStore(Request $request)
    {
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
            'massage' => $request->massage
        );

        Mail::send('frontend.email.email-contact', $data, function ($massage) {
            $massage->from('info@acelearningplus.co.uk', 'AceLearningPlus');
            $massage->to('info@acelearningplus.co.uk');
            $massage->subject('Thank you so much for contact with us');
        });
        Session::flash('success', 'Massage Sent Successfully');
        return redirect()->back();
    }

    //__ User Email function for Contact Us__ //
    public function UserEmailView()
    {
        $mail['userEmail'] = ContactUs::orderBy('id', 'desc')->get();
        return view('frontend.Email.user-email-view', $mail);
    }

    //__ Contact Us Delete function__ //
    public function destroy($id)
    {
        $contactUs = ContactUs::find($id);
        $contactUs->delete();
        return redirect()->back();
    }
}
