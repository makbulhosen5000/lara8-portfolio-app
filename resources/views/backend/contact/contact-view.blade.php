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
                    <h5 class="display-5">Contact List</h5>
                    @if($contact<1)
                  <a href="{{route('contacts.create')}}" class="btn btn-warning text-dark"><i class="fa fa-plus-circle"></i>Create Contact</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
            <table id="example2" class="table table-bordered table-hover text-center">
                {{-- table start --}}
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Intro</th>
                        <th>name</th>
                        <th>Designation</th>
                        <th>Resume</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Short_Desc</th>
                        <th>Description</th>
                        <th>BrithDay</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>address</th>
                        <th>Github</th>
                        <th>Linkedin</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>YouTube</th>
                        <th>google</th>
                        <th>WhatsApp</th>
                        <th>Instagram</th>
                        <th>Skype</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->intro}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->designation}}</td>
                        <td> <iframe src="{{ asset('public/images/resume/'.$item->resume) }}"  width="250" frameborder="0"></iframe> </td>
                        <td><img src="{{asset('public/images/image/'.$item->image)}}" width="60px";height='60px' alt=""></td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->short_desc}}</td>
                        <td>
                          <textarea name="" id="" cols="140" rows="10" style="text-align: justify">
                            {{ $item->long_desc }}
                          </textarea>
                        </td>
                        <td>{{$item->birthday}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->github}}</td>
                        <td>{{$item->linkedin}}</td>
                        <td>{{$item->facebook}}</td>
                        <td>{{$item->twitter}}</td>
                        <td>{{$item->instagram}}</td>
                        <td>{{$item->youtube}}</td>
                        <td>{{$item->google}}</td>
                        <td>{{$item->whatsapp}}</td>
                        <td>{{$item->skype}}</td>

                        <td>
                            <a href="{{route('contacts.edit',$item->id)}}" class="btn btn-warning" title="Edit"><i class="fa fa-user-edit"></i></a>
                            <a href="{{route('contacts.destroy',$item->id)}} " id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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
