<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class OrderController extends Controller
{

    public function customerOrder()
    {
        // $mail['userEmail'] = ContactUs::orderBy('id', 'desc')->get();
        $data['customers'] = Customer::all();
        return view('backend.order.view-order',$data);
    }


    public function customerOrderDetails($id)
    {
        $customerDetails=Customer::find($id);
        return view('backend.order.order-details',compact('customerDetails'));
    }


    public function orderDestroy($id)
    {
        $customerDelete = Customer::find($id);
        $customerDelete->delete();
        return redirect()->back();
    }
}
