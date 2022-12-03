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
                            <h5 class="display-5">Edit Training</h5>
                              @else
                              <h5 class="display-5">Create Training</h5>
                            @endif
                            <a href="{{ route('resumes.training.view') }}" class="btn btn-warning text-dark"> <i
                                    class="fa fa-list"></i> Training List </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3 pt-3">
                    <form action="{{(@$editData)?route('resumes.training.update',$editData->id):route('resumes.training.store')}}  " method="POST" enctype="multipart/form-data">
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
                            <label for="my-input">Training</label>
                            <input id="my-input" class="form-control" type="text" name="training" value="{{@$editData->training}}" 
                                placeholder="Enter Your training training" required>
                            <font style="color:red">{{ $errors->has('training') ? $errors->first('training') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Institute</label>
                            <input id="my-input" class="form-control" type="text" name="institute" value="{{@$editData->institute}}" 
                                placeholder="Enter Your training Institute" required>
                            <font style="color:red">{{ $errors->has('institute') ? $errors->first('institute') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Deadline</label>
                            <input id="my-input" class="form-control" type="text" name="deadline" value="{{@$editData->deadline}}" 
                                placeholder="Enter Deadline" required>
                            <font style="color:red">{{ $errors->has('deadline') ? $errors->first('deadline') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Address</label>
                            <input id="my-input" class="form-control" type="text" name="address" value="{{@$editData->address}}" 
                                placeholder="Enter Institute Address">
                            <font style="color:red">{{ $errors->has('address') ? $errors->first('address') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Description</label>
                            <textarea  id="" cols="55" rows="10" name="description" placeholder="Enter Your Institute Description">{{@$editData->description}}</textarea>
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
