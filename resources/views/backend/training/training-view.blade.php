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
                    <h5 class="display-5">Training List</h5>
                  <a href="{{route('resumes.training.create')}}" class="btn btn-warning text-dark"><i class="fa fa-plus-circle"></i>Create Training</a>
                </div>
            </div>
        </div>
    </div>
            <table id="example2" class="table table-bordered table-hover text-center">
                {{-- table start --}}
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Training</th>
                        <th>Institue</th>
                        <th>Deadline</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($training as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->training}}</td>
                        <td>{{$item->institute}}</td>
                        <td>{{$item->deadline}}</td>
                        <td>{{$item->address}}</td>
                        <td>{!! $item->description !!}</td>
                        {{-- <td>
                          <textarea name="" id="" cols="14" rows="5" style="text-align: justify">
                            {{ $item->description }}
                          </textarea>
                        </td> --}}
                        <td width="15%">
                            <a href="{{route('resumes.training.edit',$item->id)}}" class="btn btn-warning" title="Edit"><i class="fa fa-user-edit"></i></a>
                            <a href="{{route('resumes.training.destroy',$item->id)}} " id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
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
