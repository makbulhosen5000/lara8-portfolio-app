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
                    <h5 class="display-5">Blog List</h5>

                  <a href="{{route('about.news.create')}}" class="btn btn-warning text-dark"><i class="fa fa-plus-circle"></i>Create Blog</a>

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
                        <th>Short_Description</th>
                        <th width="50%">Description</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->short_desc}}</td>
                        <td>{!! $item->description !!}</td>
                        {{-- <td>
                          <textarea name="description" id="" cols="" rows="" style="text-align: justify">
                           {{!! $item->description !!}}
                        </textarea>
                        </td> --}}
                        <td>{{$item->date}}</td>
                        <td><img src="{{(!empty($item->image))?url('public/images/news/'.$item->image):url('public/images/not_found_img.png')}}" id="image" width="60px";height='60px'></td>
                        <td>
                            {{-- <a href="{{route('about.news.pdf',$item->id)}}" class="btn btn-success" title="PDF"><i class="fas fa-file-pdf"></i></a> --}}
                            <a href="{{route('about.news.edit',$item->id)}}" class="btn btn-warning" title="Edit"><i class="fa fa-user-edit"></i></a>
                            <a href="{{route('about.news.destroy',$item->id)}} " id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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
