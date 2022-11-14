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
                                <h5 class="display-5">Edit Career</h5>
                            @else
                                <h5 class="display-5">Create Career</h5>
                            @endif
                            <a href="{{ route('about.career.view') }}" class="btn btn-warning text-dark"> <i
                                    class="fa fa-list"></i> Career List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3 pt-3">
                    <form action="{{ @$editData ? route('about.career.update',$editData->id) : route('about.career.store') }} "
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
                        <div class="form-group">
                            <label for="my-input">Title</label>
                            <input id="my-input" class="form-control" type="text" name="title"
                                placeholder="Enter  Career Title" value="{{ @$editData->title }}" required>
                            <font style="color:red">{{ $errors->has('title') ? $errors->first('title') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Short Description</label>
                            <textarea class="form-control" type="text" name="short_desc" id="#" rows="5"
                                placeholder="Enter Your Short Description" placeholder="Please Enter Short Description For Career">{{ @$editData->short_desc }}</textarea>
                            <font style="color:red">{{ $errors->has('short_desc') ? $errors->first('short_desc') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Long Description</label>
                            <textarea class="form-control" type="text" name="long_desc" id="" rows="15"
                                placeholder="Please Enter Description For Career">{{ @$editData->long_desc }}</textarea>
                            <font style="color:red">{{ $errors->has('long_desc') ? $errors->first('long_desc') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Publish Date</label>
                            <input id="my-input" class="form-control" type="date" name="publish_date"
                                value="{{ @$editData->publish_date }}">
                            <font style="color:red">{{ $errors->has('publish_date') ? $errors->first('publish_date') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">DateLine</label>
                            <input id="my-input" class="form-control" type="date" name="expire_date"
                                value="{{ @$editData->expire_date }}">
                            <font style="color:red">{{ $errors->has('expire_date') ? $errors->first('expire_date') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Upload Pdf</label>
                            <iframe src="{{(!empty($editData->image))?url('public/images/career/'.$editData->image):url('public/images/not_found_img.png')}}" id="image" width="540px";height='200px' frameborder="0"></iframe>
                            <input id="my-input" class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                          </div>
                        <div class="form-group">
                            <button type="submit" id="button"
                                class="btn btn-success">{{ @$editData ? 'Update' : 'Submit' }} </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- card end --}}
    </div>
    <!-- Content Wrapper. Contains page content end-->
@endsection
