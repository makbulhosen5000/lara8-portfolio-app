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
                            <h5 class="display-5">Edit Experience</h5>
                              @else
                              <h5 class="display-5">Create Experience</h5>
                            @endif
                            <a href="{{ route('resumes.experience.view') }}" class="btn btn-warning text-dark"> <i
                                    class="fa fa-list"></i> Experinece List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3 pt-3">
                    <form action="{{(@$editData)?route('resumes.experience.update',$editData->id):route('resumes.experience.store')}}  " method="POST" enctype="multipart/form-data">
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
                            <label for="my-input">Designation</label>
                            <input id="my-input" class="form-control" type="text" name="designation" value="{{@$editData->designation}}" 
                                placeholder="Enter Your Designation" required>
                            <font style="color:red">{{ $errors->has('designation') ? $errors->first('designation') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Work Deadline</label>
                            <input id="my-input" class="form-control" type="text" name="deadline" value="{{@$editData->deadline}}" 
                                placeholder="Enter Your Work deadline" required>
                            <font style="color:red">{{ $errors->has('deadline') ? $errors->first('deadline') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Company_Name</label>
                            <input id="my-input" class="form-control" type="text" name="company_name" value="{{@$editData->company_name}}" 
                                placeholder="Enter Your Company's Name " required>
                            <font style="color:red">{{ $errors->has('company_name') ? $errors->first('company_name') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Company_Address</label>
                            <input id="my-input" class="form-control" type="text" name="company_address" value="{{@$editData->company_address}}" 
                                placeholder=" Enter Your Company's Address " required>
                            <font style="color:red">{{ $errors->has('company_address') ? $errors->first('company_address') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Description</label>
                            <textarea  id="" cols="55" rows="10" name="description" placeholder="Enter Your Description">{{@$editData->description}}</textarea>
                            <font style="color:red">{{ $errors->has('description') ? $errors->first('description') : '' }}
                            </font>
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
