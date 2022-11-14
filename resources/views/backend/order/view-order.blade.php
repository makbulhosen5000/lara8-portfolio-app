@extends('backend.layouts.admin-master')
@section('content')
    <!-- Content Wrapper. Contains page content start -->
    <div class="content-wrapper">
        <!-- Content Header start(Page header) -->
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
        <!-- /.content-header end -->
        <!-- card start -->
        <div class="card">
            <div class="head bg-muted">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12  d-flex justify-content-between align-items-center">
                            <h5 class="display-5">Customer Order List</h5>
                            <a href="{{ route('products.create') }}" class="btn btn-warning text-dark"><i
                                    class="fa fa-plus-circle"></i>Create Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card end -->

        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Customer ID</th>
                            <th> Name</th>
                            <th> Phone</th>
                            <th> Country </th>
                            <th> Address </th>
                            <th> City </th>
                            <th> Post Code </th>
                            <th> Message </th>
                            {{-- <th> Image </th> --}}
                            <th width="17%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $contents = Cart::content();
                        @endphp
                        @foreach ($contents as $content)
                                       
                        @php
                            $product = \App\Models\Product::find($content->id);
                            
                        @endphp
                        @foreach ($customers as $key => $item)
                            <tr class="">
                                {{-- <td> {{ $item->id }} </td> --}}
                                <td> {{ $product->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->phone }} </td>
                                <td> {{ $item->country }} </td>
                                <td> {{ $item->address }} </td>
                                <td> {{ $item->city }} </td>
                                <td> {{ $item->postcode }} </td>
                                <td> {{ $item->message }} </td>
                                {{-- <td><img src="{{asset('public/images/product_images/'.$item->image)}}" width="60px";height='60px' alt=""></td> --}}
                                {{-- <td>
                                    <img src="{{ !empty($item->image) ? url('public/images/product_images/' . $item->image) : url('public/images/not_found_img.png') }}"
                                        id="image" width="60px";height='60px'>
                                </td> --}}
                                <td>
                                
                                    <a href="{{ route('orders.details',$item->id) }}" class="btn btn-success btn-sm"
                                        title="Customer Details"><i class="fa fa-eye"></i></a>
                                    <a href=" {{ route('orders.destroy',$item->id) }} " id="delete"
                                        class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- card end -->
    </div>
    <!-- Content Wrapper. Contains page content end-->
@endsection
