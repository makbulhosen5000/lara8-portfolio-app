@extends('backend.layouts.admin-master')
@section('content')

<!-- Content Wrapper. Contains page content start -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-light">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-dark">Home</a></li>
              <li class="breadcrumb-item active text-dark">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card">
    <div class="head bg-muted">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-12  d-flex justify-content-between align-items-center">
                    <h5 class="display-5">Costomer Orders</h5>
                    {{-- @if($category<1) --}}
                  <a href="{{route('orders.view')}}" class="btn btn-warning text-dark"><i class="fa fa-list"></i>View Customer</a>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        {{-- table start --}}

        @php
        $contents = Cart::content();                                        
        @endphp

        <tbody>

            @foreach ($contents as $content)
            @php
            $product = \App\Models\Product::find($content->id);
            @endphp
         
            <tr>
                <td width="25%"> Customer Id </td>
                <td>{{$product->id}}</td>
            </tr>
            <tr>
                <td width="25%"> Name </td>
                <td>{{$customerDetails->name}}</td>
            </tr>
            <tr>
                <td width="25%"> Phone </td>
                {{-- <td>{{$productDetails->subcategory->name??''}}</td> --}}
                <td>{{$customerDetails->phone}}</td>
            </tr>
           
            <tr>
                <td width="25%">Country</td>
                <td>{{$customerDetails->country}}</td>
            </tr>
            <tr>
                <td width="25%">Address</td>
                <td>{{$customerDetails->address}}</td>
            </tr>
            <tr>
                <td width="25%">City</td>
                <td>{{$customerDetails->city}}</td>
            </tr>
            <tr>
                <td width="25%">Post Code</td>
                <td>{{$customerDetails->postcode}}</td>
            </tr>
            <tr>
                <td width="25%">Message</td>
                <td>{{$customerDetails->message}}</td>
            </tr>
            <tr>
                <td width="25%" class="pt-5">Product Image</td>
                <td> <img src="{{(!empty($product->image))?url('public/images/product_images/'.$product->image):url('public/images/not_found_img.png')}}" id="image" width="50px";height='50px'></td>
            </tr>
            <tr>
                <td width="25%">Product Name</td>
                <td>{{$content->name}}</td>
            </tr>
            <tr>
                <td width="25%">Product Price</td>
                <td>&#163; {{ $content->price }}</td>
            </tr>
            <tr>
                <td width="25%">Product Quantity</td>
                <td>&#163; {{ Cart::count() }}</td>
            </tr>
            {{-- <tr>
                <td width="25%">Sub Total</td>
                <td>&#163; {{ Cart::priceTotal() }} </td>
            </tr> --}}
            <tr>
                <td width="25%">Total</td>
                <td>&#163; {{ Cart::priceTotal() }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
    {{-- table end --}}



</div>
{{-- card end --}}

  </div>
 <!-- Content Wrapper. Contains page content end-->
@endsection

