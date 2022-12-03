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
                            @if(isset($editData))
                            <h5 class="display-5">Edit Laravel Project</h5>
                              @else
                              <h5 class="display-5">Create Laravel Project</h5>
                            @endif
                            <a href="{{ route('resumes.total.project.view') }}" class="btn btn-warning text-dark"> <i
                                    class="fa fa-list"></i> Laravel Project List </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3 pt-3">
                    <form action="{{(@$editData)?route('resumes.total.project.update',$editData->id):route('resumes.total.project.store')}}  " method="POST" enctype="multipart/form-data">
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
                            <input id="my-input" class="form-control" type="text" name="title" value="{{@$editData->title}}" 
                                placeholder="Enter Your Project Title" required>
                            <font style="color:red">{{ $errors->has('title') ? $errors->first('title') : '' }} </font>
                        </div>
                        <div class="form-group">
                          <label for="my-input">Description</label>
                          <textarea  id="" cols="55" rows="10" name="description" placeholder="Enter Your Description">{{@$editData->description}}</textarea>
                          <font style="color:red">{{ $errors->has('description') ? $errors->first('long_desc') : '' }}
                          </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Project URL</label>
                            <input id="my-input" class="form-control" type="url" name="url" value="{{@$editData->url}}" 
                                placeholder="Enter Your designation">
                            <font style="color:red">{{ $errors->has('url') ? $errors->first('url') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Github URL</label>
                            <input id="my-input" class="form-control" type="url" name="github" value="{{@$editData->github}}" 
                                placeholder="Enter Your designation">
                            <font style="color:red">{{ $errors->has('github') ? $errors->first('github') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Image</label>
                          <img src="{{(!empty($editData->image))?url('public/images/project/'.$editData->image):url('public/images/not_found_img.png')}}" id="image" style="width:420px;height:200px">
                          <input id="my-input" class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                          <font style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="button" class="btn btn-success">{{(@$editData)?"Update":"Submit"}}</button>
                        </div>

                    </form>
                </div>
            </div>




        </div>
        {{-- card end --}}

    </div>
    <!-- Content Wrapper. Contains page content end-->
@endsection
