@extends('backend.layouts.admin-master')
@section('content')

    <!-- Content Wrapper. Contains page content start -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header bg-muted">
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
                                @if (isset($editData))
                                    <h5 class="display-5">Edit Blog</h5>
                                @else
                                    <h5 class="display-5">Create Blog</h5>
                                @endif
                                <a href="{{ route('about.news.view') }}" class="btn btn-warning text-dark"> <i
                                        class="fa fa-list"></i> Blog List</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main p-2">
                    <form action="{{ @$editData ? route('about.news.update', $editData->id) : route('about.news.store') }} "
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="my-input">Blog Title</label>
                                    <input id="my-input" class="form-control" type="text" name="title"
                                        placeholder="Enter  News Title For Heading" value="{{ @$editData->title }}" required>
                                    <font style="color:red">{{ $errors->has('title') ? $errors->first('title') : '' }} </font>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="my-input">Short Description</label>
                                    <input id="my-input" class="form-control" type="text" name="short_desc"
                                        placeholder="Enter  Short Description" value="{{ @$editData->short_desc }}" required>
                                    <font style="color:red">{{ $errors->has('short_desc') ? $errors->first('short_desc') : '' }} </font>
                                </div> 
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="my-input">Description</label>
                                    <textarea name="description" id="" cols="" rows="">{{ @$editData->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="my-input">Image</label>
                                    <img src="{{(!empty($editData->image))?url('public/images/news/'.$editData->image):url('public/images/not_found_img.png')}}" id="image" width="430";height='200'>
                                    <input id="my-input" class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-input"> Date</label>
                                    <input id="my-input" class="form-control" type="date" name="date"
                                        placeholder="Enter  Post Date" value="{{ @$editData->date }}" required>
                                    <font style="color:red">{{ $errors->has('date') ? $errors->first('date') : '' }} </font>
                                </div>
                            </div>
                        </div>
                        {{--<div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="my-input">Upload Pdf</label>
                                <iframe src="{{(!empty($editData->pdf))?url('public/images/news/'.$editData->pdf):url('public/images/not_found_img.png')}}" id="image" width="540px";height='200px' frameborder="0"></iframe>
                                <input id="my-input" class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                                </div>
                            </div>
                        </div>--}}
                        <div class="form-group text-center">
                            <button type="submit" id="button"
                                class="btn btn-success">{{ @$editData ? 'Update' : 'Submit' }} </button>
                        </div>
                    </form>
                </div>
              
            </div>
       
        {{-- card end --}}
    </div>
    <!-- Content Wrapper. Contains page content end-->
@endsection
