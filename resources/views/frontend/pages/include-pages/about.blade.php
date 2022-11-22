<!--About Section Start-->
<div class="container-fluid">
    <div id="about" class="row about-section">
        <div class="col-lg-4 about-card">
            <h3 class="font-weight-light">{{ $contact->title }}</h3>
            <span class="line mb-5"></span>
            <h5 class="mb-3">{{ $contact->short_desc }}</h5>
            <p class="mt-20">{{ $contact->long_desc }}</p>
            <a href="{{ asset('public/images/resume/'.$contact->resume) }}"> <button class="btn btn-outline-danger"><i class="icon-down-circled2 "></i>Download My Resume</button></a>
        </div>
        <div class="col-lg-4 about-card">
            <h3 class="font-weight-light">Personal Info</h3>
            <span class="line mb-5"></span>
            <ul class="mt40 info list-unstyled">
                <li><span>Birthdate</span> :{{ $contact->birthday }}</li>
                <li><span>Email</span> : {{ $contact->email }}</li>
                <li><span>Phone</span> : +88{{ $contact->phone }}</li>
                <li><span>WhatsApp</span> : +88{{ $contact->whatsapp }}</li>
                <li><span>Skype</span> : {{ $contact->skype }} </li>
                <li><span>Address</span> :  {{ $contact->address }}</li>
            </ul>
            <ul class="social-icons pt-3">
                <li class="social-item"><a class="social-link" href="{{ $contact->github }}"><i class="ti-github" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="{{ $contact->linkedin }}"><i class="ti-linkedin" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="{{ $contact->facebook }}"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="{{ $contact->twitter }}"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="{{ $contact->google }}"><i class="ti-google" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="{{ $contact->instagram }}"><i class="ti-instagram" aria-hidden="true"></i></a></li>
            </ul>  
        </div>
        <div class="col-lg-4 about-card">
            <h3 class="font-weight-light">My Expertise</h3>
            <span class="line mb-5"></span>
            <div class="row">
                <div class="col-1 text-danger pt-1"><i class="ti-widget icon-lg"></i></div>
                <div class="col-10 ml-auto mr-3">
                    <h6>Web Design</h6>
                    {{-- <p class="subtitle"> exercitat Repellendus,  corrupt.</p> --}}
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-1 text-danger pt-1"><i class="ti-paint-bucket icon-lg"></i></div>
                <div class="col-10 ml-auto mr-3">
                    <h6>Web Development</h6>
                    {{-- <p class="subtitle">Lorem ipsum dolor sit consectetur.</p> --}}
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-1 text-danger pt-1"><i class="ti-stats-up icon-lg"></i></div>
                <div class="col-10 ml-auto mr-3">
                    <h6>Graphic Design</h6>
                    {{-- <p class="subtitle">voluptate commodi illo voluptatib.</p> --}}
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<!--About Section End-->