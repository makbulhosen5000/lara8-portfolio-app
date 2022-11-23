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
                            <h5 class="display-5">Create Work Documentary</h5>
                            <a href="{{ route('resumes.documentary.view') }}" class="btn btn-warning text-dark"> <i
                                    class="fa fa-list"></i> Work Documentary List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3 pt-3">
                    <form action="{{(@$editData)?route('resumes.documentary.update',$editData->id):route('resumes.documentary.store')}}  " method="POST" enctype="multipart/form-data">
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
                            <label for="my-input">Total_Work</label>
                            <input id="my-input" class="form-control" type="text" name="total_work" value="{{@$editData->total_work}}" 
                                placeholder="Enter Your Total Work" required>
                            <font style="color:red">{{ $errors->has('total_work') ? $errors->first('total_work') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Total_Project</label>
                            <input id="my-input" class="form-control" type="text" name="total_project" value="{{@$editData->total_project}}" 
                                placeholder="Enter Your Work Total Project" required>
                            <font style="color:red">{{ $errors->has('total_project') ? $errors->first('total_project') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Total Experience</label>
                            <input id="my-input" class="form-control" type="text" name="total_experience" value="{{@$editData->total_experience}}" 
                                placeholder="Enter Your Total Experience " required>
                            <font style="color:red">{{ $errors->has('total_experience') ? $errors->first('total_experience') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Total_Companies</label>
                            <input id="my-input" class="form-control" type="text" name="total_companies" value="{{@$editData->total_companies}}" 
                                placeholder=" Enter Your Total Companies " required>
                            <font style="color:red">{{ $errors->has('total_companies') ? $errors->first('total_companies') : '' }} </font>
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
