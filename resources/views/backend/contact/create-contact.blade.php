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
                            <h5 class="display-5">Edit Contact</h5>
                              @else
                              <h5 class="display-5">Create Contact</h5>
                            @endif
                            <a href="{{ route('contacts.view') }}" class="btn btn-warning text-dark"> <i
                                    class="fa fa-list"></i> Contact List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3 pt-3">
                    <form action="{{(@$editData)?route('contacts.update',$editData->id):route('contacts.store')}}  " method="POST" enctype="multipart/form-data">
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
                            <label for="my-input">Intro</label>
                            <input id="my-input" class="form-control" type="text" name="intro" value="{{@$editData->intro}}" 
                                placeholder="Enter Your Introduction Title" required>
                            <font style="color:red">{{ $errors->has('intro') ? $errors->first('intro') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Name</label>
                            <input id="my-input" class="form-control" type="text" name="name" value="{{@$editData->name}}" 
                                placeholder="Enter Your Name">
                            <font style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Designation</label>
                            <input id="my-input" class="form-control" type="text" name="designation" value="{{@$editData->designation}}" 
                                placeholder="Enter Your designation">
                            <font style="color:red">{{ $errors->has('designation') ? $errors->first('designation') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Resume</label>
                            <iframe src="{{(!empty($editData->resume))?url('public/images/resume/'.$editData->resume):url('public/images/not_found_img.png')}}" id="image" style="width:420px;height:300px" frameborder="0"></iframe>
                            <input id="my-input" class="form-control" type="file" name="resume" id="file" onchange="showImage(this,'image')" value=''>
                            <font style="color:red">{{ $errors->has('resume') ? $errors->first('resume') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Image</label>
                          <img src="{{(!empty($editData->image))?url('public/images/image/'.$editData->image):url('public/images/not_found_img.png')}}" id="image" style="width:420px;height:200px">
                          <input id="my-input" class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                          <font style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Title</label>
                            <input id="my-input" class="form-control" type="text" name="title"  value="{{@$editData->title}}"
                                placeholder="Enter Your title">
                            <font style="color:red">{{ $errors->has('title') ? $errors->first('title') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Short Descrption</label>
                            <input id="my-input" class="form-control" type="text" name="short_desc"  value="{{@$editData->short_desc}}"
                                placeholder="Enter Your Address" required>
                            <font style="color:red">{{ $errors->has('short_desc') ? $errors->first('short_desc') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Description</label>
                            <textarea  id="" cols="55" rows="10" name="long_desc" placeholder="Enter Your Description">{{@$editData->long_desc}}</textarea>
                            <font style="color:red">{{ $errors->has('long_desc') ? $errors->first('long_desc') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Date Of Brith</label>
                            <input id="my-input" class="form-control" type="date" name="birthday">  value="{{@$editData->birthday}}"
                            <font style="color:red">{{ $errors->has('birthday') ? $errors->first('birthday') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">phone</label>
                            <input id="my-input" class="form-control" type="tel" name="phone"  value="{{@$editData->phone}}"
                                placeholder="Enter Your Phone" required>
                            <font style="color:red">{{ $errors->has('phone') ? $errors->first('phone') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">email</label>
                            <input id="my-input" class="form-control" type="email" name="email"  value="{{@$editData->email}}"
                                placeholder="Enter Your Email" required>
                            <font style="color:red">{{ $errors->has('email') ? $errors->first('email') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">address</label>
                            <input id="my-input" class="form-control" type="address" name="address"  value="{{@$editData->address}}"
                                placeholder="Enter Your Address" required>
                            <font style="color:red">{{ $errors->has('address') ? $errors->first('address') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Github</label>
                            <input id="my-input" class="form-control" type="url" name="github"  value="{{@$editData->github}}"
                                placeholder="Enter Your Email" required>
                            <font style="color:red">{{ $errors->has('github') ? $errors->first('github') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Linkedin</label>
                            <input id="my-input" class="form-control" type="url" name="linkedin" value="{{@$editData->linkedin}}"
                                placeholder="Enter Your Email">
                            <font style="color:red">{{ $errors->has('linkedin') ? $errors->first('linkedin') : '' }}
                            </font>
                        </div>


                        <div class="form-group">
                            <label for="my-input">facebook</label>
                            <input id="my-input" class="form-control" type="url" name="facebook"  value="{{@$editData->facebook}}"
                                placeholder="Enter Your Facebook Account">
                            <font style="color:red">{{ $errors->has('facebook') ? $errors->first('facebook') : '' }}
                            </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Twitter</label>
                            <input id="my-input" class="form-control" type="url" name="twitter"  value="{{@$editData->twitter}}"
                                placeholder="Enter Your Twitter Account">
                            <font style="color:red">{{ $errors->has('twitter') ? $errors->first('twitter') : '' }} </font>
                        </div>
                        <div class="form-group">
                          <label for="my-input">Instagram</label>
                          <input id="my-input" class="form-control" type="url" name="instagram"  value="{{@$editData->instagram}}"
                              placeholder="Enter Your Twitter Instagram">
                          <font style="color:red">{{ $errors->has('instagram') ? $errors->first('instagram') : '' }} </font>
                      </div>
                        <div class="form-group">
                            <label for="my-input">Youtube</label>
                            <input id="my-input" class="form-control" type="url" name="youtube"  value="{{@$editData->youtube}}"
                                placeholder="Enter Your Account">
                            <font style="color:red">{{ $errors->has('youtube') ? $errors->first('youtube') : '' }} </font>
                        </div>

                        <div class="form-group">
                            <label for="my-input">WhatsApp</label>
                            <input id="my-input" class="form-control" type="tel" name="whatsapp"  value="{{@$editData->whatsapp}}"
                                placeholder="Enter Your whatsApp Number">
                            <font style="color:red">{{ $errors->has('whatsapp') ? $errors->first('whatsapp') : '' }} </font>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Skype</label>
                            <input id="my-input" class="form-control" type="url" name="skype"  value="{{@$editData->skype}}"
                                placeholder="Enter Your Skype Account">
                            <font style="color:red">{{ $errors->has('skype') ? $errors->first('skype') : '' }} </font>
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
