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
              <li class="breadcrumb-item"><a href="#" class="text-dark" >Home</a></li>
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

                    <h5 class="display-5">Create User Locatin</h5>

                  <a href="{{route('users.location.view')}}" class="btn btn-warning text-dark"> <i class="fa fa-list"></i> User Location List</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-3 pt-3">
        <form action="route('users.location.store')}}" method="POST" enctype="multipart/form-data">
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
                    <label for="my-input">Latitude</label>
                    <input id="my-input" class="form-control" id="latitude" type="text" name="latitude" value="" 
                        placeholder="Enter Your Latitude" required>
                    <font style="color:red">{{ $errors->has('latitude') ? $errors->first('latitude') : '' }} </font>
                </div>
                <div class="form-group">
                    <label for="my-input">Longitude</label>
                    <input id="my-input" class="form-control" id="longitude" type="text" name="longitude" value="" 
                        placeholder="Enter Your Longitude" required>
                    <font style="color:red">{{ $errors->has('longitude') ? $errors->first('longitude') : '' }} </font>
                </div>
                <div class="form-group">
                    <label for="my-input">Ip</label>
                    <input id="my-input" class="form-control" id="ip" type="text" name="ip" value="" 
                        placeholder="Enter Your IP" required>
                    <font style="color:red">{{ $errors->has('ip') ? $errors->first('ip') : '' }} </font>
                </div>
               
                <div class="form-group">
                <button type="submit" id="button" class="btn btn-success"> Submit </button>
                </div>
          </form>
        </div>
    </div>




</div>
{{-- card end --}}

  </div>
 <!-- Content Wrapper. Contains page content end-->
@endsection
