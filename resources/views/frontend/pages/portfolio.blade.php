@extends('frontend.layouts.master')
@section('title')
    portfolio || {{'Makbul Portfolio'}}
@endsection
@section('content')
 <!-- Portfolio Section -->
 <section class="section bg-custom-gray" id="portfolio">
    <div class="container">
        <h1 class="mb-5"><span class="text-danger">My</span> Projects</h1>
        <div class="portfolio">
            <div class="filters">
                <a href="#" data-filter=".advertising">
                    Recent Projects
                </a>
                <a href="#" data-filter=".new" class="active">
                    All Projects
                </a>
                <a href="#" data-filter=".branding">
                    Branding
                </a>
                <a href="#" data-filter=".web">
                    Web
                </a>
            </div>
            <div class="portfolio-container"> 
              
                <div class="col-md-6 col-lg-4 web new">
                    <div class="portfolio-item">
                        <img src="{{ asset('public/frontend') }}/assets/imgs/web-2.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                        <div class="content-holder">
                            <a class="img-popup" href="{{ asset('public/frontend') }}/assets/imgs/web-2.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">WEB</h6>
                                <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                            </div>
                        </div> 
                    </div>                         
                </div>
               

      

                <div class="col-md-6 col-lg-4 advertising new"> 
                    <div class="portfolio-item">
                        <img src="{{ asset('public/frontend') }}/assets/imgs/advertising-4.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">            
                        <div class="content-holder">
                            <a class="img-popup" href="{{ asset('public/frontend') }}/assets/imgs/advertising-4.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">ADVERTISING</h6>
                                <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                            </div>
                        </div>
                    </div>
                            
                </div> 
                <div class="col-md-6 col-lg-4 branding new">
                    <div class="portfolio-item">
                        <img src="{{ asset('public/frontend') }}/assets/imgs/branding-1.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                        
                        <div class="content-holder">
                            <a class="img-popup" href="{{ asset('public/frontend') }}/assets/imgs/branding-1.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">BRANDING</h6>
                                <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                            </div>
                        </div> 
                    </div>
                </div> 
               
            </div> 
        </div>  
    </div>            
</section>
<!-- End of portfolio section -->
@endsection