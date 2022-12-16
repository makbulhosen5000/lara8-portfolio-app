@extends('frontend.layouts.master')
@section('title')
    Contact || {{'Makbul Portfolio'}}
@endsection
@section('content')
<div class="section contact">
    <div  class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.620951667486!2d90.36119814892143!3d23.760892694220257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf58506ed899%3A0xbdf41da3342040b9!2sSalimullah%20Rd%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1669614238401!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="contact-form-card">
                    <h4 class="contact-title text-danger">DON'T FEEL HESITATE TO CATCH ME</h4>
                    <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input  class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Name *" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" value="{{ old('phone') }}"  placeholder="Phone *" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}"  placeholder="Email *" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('massage') is-invalid @enderror" id="" name="massage" value="{{ old('massage') }}"  placeholder="Message *" rows="7" required></textarea>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="form-control btn btn-primary" >Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-info-card">
                    <h4 class="contact-title">Get in touch</h4>
                    <div class="row mb-2">
                        <div class="col-1 pt-1 mr-1">
                            <i class="ti-mobile icon-md"></i>
                        </div>
                        <div class="col-10 ">
                            <h6 class="d-inline">Phone : <br> <span class="text-muted">+88{{ $contact->whatsapp }}</span></h6>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-1 pt-1 mr-1">
                            <i class="ti-map-alt icon-md"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="d-inline">Address :<br> <span class="text-muted">{{ $contact->address }}</span></h6>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-1 pt-1 mr-1">
                            <i class="ti-envelope icon-md"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="d-inline">Email :<br> <span class="text-muted">{{ $contact->email }}</span></h6>
                        </div>
                    </div>
                    <ul class="social-icons pt-4">
                        <li class="social-item"><a class="social-link text-dark" href="{{ $contact->linkedin }}"><i class="ti-linkedin" aria-hidden="true"></i></a></li>
                        <li class="social-item"><a class="social-link text-dark" href="{{ $contact->github }}"><i class="ti-github" aria-hidden="true"></i></a></li>
                        <li class="social-item"><a class="social-link text-dark" href="{{ $contact->facebook }}"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                        <li class="social-item"><a class="social-link text-dark" href="{{ $contact->twiter }}"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                        <li class="social-item"><a class="social-link text-dark" href="{{ $contact->google }}"><i class="ti-google" aria-hidden="true"></i></a></li>
                        <li class="social-item"><a class="social-link text-dark" href="{{ $contact->instagram }}"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                        <li class="social-item"><a class="social-link text-dark" href="{{ $contact->skype }}"><i class="ti-skype" aria-hidden="true"></i></a></li>
                    </ul> 
                </div>
            </div>
        </div>

    </div>
</div>
@endsection