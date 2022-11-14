@extends('frontend.layouts.master')
@section('title')
    Home || {{'Makbul Portfolio'}}
@endsection

@section('content')
<!--About Section Start-->
<div class="container-fluid">
    <div id="about" class="row about-section">
        <div class="col-lg-4 about-card">
            <h3 class="font-weight-light">Who am I ?</h3>
            <span class="line mb-5"></span>
            <h5 class="mb-3">A Web Designer / Developer Located In Our Lovely Earth</h5>
            <p class="mt-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit.sit amet, Qui deserunt consequatur fugit repellendusillo voluptas?</p>
            <button class="btn btn-outline-danger"><i class="icon-down-circled2 "></i>Download My CV</button>
        </div>
        <div class="col-lg-4 about-card">
            <h3 class="font-weight-light">Personal Info</h3>
            <span class="line mb-5"></span>
            <ul class="mt40 info list-unstyled">
                <li><span>Birthdate</span> : 09/13/1996</li>
                <li><span>Email</span> : info@website.com</li>
                <li><span>Phone</span> : + (123) 456-7890</li>
                <li><span>Skype</span> : John_Doe </li>
                <li><span>Address</span> :  12345 Fake ST NoWhere AB Country.</li>
            </ul>
            <ul class="social-icons pt-3">
                <li class="social-item"><a class="social-link" href="#"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="#"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="#"><i class="ti-google" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="#"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="#"><i class="ti-github" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="#"><i class="ti-linkedin" aria-hidden="true"></i></a></li>
            </ul>  
        </div>
        <div class="col-lg-4 about-card">
            <h3 class="font-weight-light">My Expertise</h3>
            <span class="line mb-5"></span>
            <div class="row">
                <div class="col-1 text-danger pt-1"><i class="ti-widget icon-lg"></i></div>
                <div class="col-10 ml-auto mr-3">
                    <h6>UX Design</h6>
                    <p class="subtitle"> exercitat Repellendus,  corrupt.</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-1 text-danger pt-1"><i class="ti-paint-bucket icon-lg"></i></div>
                <div class="col-10 ml-auto mr-3">
                    <h6>Web Development</h6>
                    <p class="subtitle">Lorem ipsum dolor sit consectetur.</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-1 text-danger pt-1"><i class="ti-stats-up icon-lg"></i></div>
                <div class="col-10 ml-auto mr-3">
                    <h6>Digital Marketing</h6>
                    <p class="subtitle">voluptate commodi illo voluptatib.</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<!--About Section End-->

<!--Resume Section Start-->
<section class="section" id="resume">
    <div class="container">
        <h2 class="mb-5"><span class="text-danger">My</span> Resume</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                   <div class="card-header">
                        <div class="mt-2">
                            <h4>Expertise</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="title text-danger">2017 - Present</h6>
                        <P>UX Developer</P>
                        <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                        <hr>
                        <h6 class="title text-danger">2016 - 2017</h6>
                        <P>Front-end Developer</P>
                        <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                        <hr>
                        <h6 class="title text-danger">2015 - 2016</h6>
                        <P>UX Designer</P>
                        <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                   <div class="card-header">
                        <div class="mt-2">
                            <h4>Education</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="title text-danger">2017 - Present</h6>
                        <P>B.E Computer Engineering</P>
                        <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error corrupti recusandae obcaecati odit repellat ducimus cum, minus tempora aperiam at.</P>
                        <hr>
                        <h6 class="title text-danger">2016 - 2017</h6>
                        <P>Diploma in Computer Engineering</P>
                        <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, id officiis quas placeat quia voluptas dolorum rem animi nostrum quae.aliquid repudiandae saepe!.</P>
                        <hr>
                        <h6 class="title text-danger">2015 - 2016</h6>
                        <P>High School Degree</P>
                        <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                   <div class="card-header">
                        <div class="pull-left">
                            <h4 class="mt-2">Skills</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body pb-2">
                       <h6>hTL5 &amp; CSS3</h6>
                        <div class="progress mb-3 progress-height">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark progress-bar" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="50"></div>
                        </div>
                        <h6>JavaScript</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6>PHP</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6>SQL</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6>Laborum</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6>Tempora</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                   <div class="card-header">
                        <div class="pull-left">
                            <h4 class="mt-2">Languages</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body pb-2">
                       <h6>English</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6>French</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6>Spanish</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 67%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <!--Resume Section End-->

<section class="section bg-dark text-center">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-6 col-lg-3">
                <div class="row ">
                    <div class="col-5 text-right text-light border-right py-3">
                        {{-- <div class="m-auto"><i class="ti-alarm-clock icon-xl"></i></div> --}}
                        <div class="m-auto"><img src="{{ asset('frontend/assets/imgs/logo.png') }}" class="icon-xl" width="65" alt=""></div>
                    </div>
                    <div class="col-7 text-left py-3">
                        <h1 class="text-danger font-weight-bold font40">500</h1>
                        <p class="text-light mb-1">Hours Worked</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="row">
                    <div class="col-5 text-right text-light border-right py-3">
                        <div class="m-auto"><i class="ti-layers-alt icon-xl"></i></div>
                    </div>
                    <div class="col-7 text-left py-3">
                        <h1 class="text-danger font-weight-bold font40">50K</h1>
                        <p class="text-light mb-1">Project Finished</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="row">
                    <div class="col-5 text-right text-light border-right py-3">
                        <div class="m-auto"><i class="ti-face-smile icon-xl"></i></div>
                    </div>
                    <div class="col-7 text-left py-3">
                        <h1 class="text-danger font-weight-bold font40">200K</h1>
                        <p class="text-light mb-1">Happy Clients</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="row">
                    <div class="col-5 text-right text-light border-right py-3">
                        <div class="m-auto"><i class="ti-heart-broken icon-xl"></i></div>
                    </div>
                    <div class="col-7 text-left py-3">
                        <h1 class="text-danger font-weight-bold font40">2k</h1>
                        <p class="text-light mb-1">Coffee Drinked</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-dark py-5">
    <div class="container text-center">
        <h2 class="text-light mb-5 font-weight-normal">I Am Available For FreeLance</h2>
        <button class="btn bg-primary w-lg" >Hire me</button>
    </div>
</section>

@endsection
