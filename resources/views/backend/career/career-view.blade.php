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
                    <h5 class="display-5">Career List</h5>
                  @if($countData>1)
                  <a href="{{route('about.career.create')}}" class="btn btn-warning text-dark"><i class="fa fa-plus-circle"></i>Create Career</a>
                  @endif
                </div>
            </div>
        </div>
    </div>
            <table id="example2" class="table table-bordered table-hover text-center">
                {{-- table start --}}
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Sort_Description</th>
                        <th>Long_Description</th>
                        <th>Publish Date</th>
                        <th>Deadline</th>
                        {{-- <th>Image</th> --}}
                        <th width="17%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->slug}}</td>
                      
                        <td>
                          <textarea name="" id="" cols="32" rows="5">
                          {{$item->short_desc}}
                        </textarea></td>
                        <td>
                          <textarea name="" id="" cols="32" rows="5">
                          {{$item->long_desc}}
                        </textarea>
                      </td>
                       
                        <td>{{$item->publish_date}}</td>
                        <td>{{$item->expire_date}}</td>
                        {{-- <td><img src="{{(!empty($item->image))?url('public/images/career/'.$item->image):url('public/images/not_found_img.png')}}" id="image" width="60px";height='60px'></td> --}}
                        
                        <td>
                            <a href="{{route('about.career.pdf',$item->id)}}" class="btn-sm btn-success" title="PDF"><i class="fas fa-file-pdf"></i></a>
                            <a href="{{route('about.career.edit',$item->id)}}" class="btn-sm btn-warning" title="Edit"><i class="fa fa-user-edit"></i></a>
                            <a href="{{route('about.career.destroy',$item->id)}} " id="delete" class="btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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
