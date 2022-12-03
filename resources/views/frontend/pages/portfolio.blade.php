@extends('frontend.layouts.master')
@section('title')
    portfolio || {{'Makbul Portfolio'}}
@endsection
@section('content')
 <!-- Portfolio Section -->
 <section class="section bg-custom-gray" id="portfolio">
    <div class="container">
        <h1 class="mb-5"><span class="text-danger">My</span> Portfolio</h1>
        {{-- portfolio start --}}
        <div class="portfolio">
            <div class="filters">
                <a href="#" data-filter=".advertising" class="">
                    Recent Project
                </a>
                <a href="#" data-filter=".web">
                    Laravel Project
                </a>
                <a href="#" data-filter=".branding" class="">
                    React Project
                </a>
                <a href="#" data-filter=".new" class="active">
                    Whole Project
                </a>
            </div>
            {{-- Recent Project foreach start--}}
            <div class="portfolio-container" style="position: relative; height: 687.145px;"> 
                @foreach ($recentProjects as $item)          
                <div class="col-md-6 col-lg-4 advertising new" style="position: absolute; left: 619.994px; top: 0px;">
                    <div class="portfolio-item">
                            <img src="{{ asset('public/images/project/'.$item->image) }}" class="img-fluid" alt=""  style="height: 180px; width:300px" >                         
                            <div class="content-holder"> 
                                <div class="text-holder">
                                    {{-- <h6 class="title">{{ $item->title }}</h6> --}}
                                    <div>
                                        <a href="{{ $item->url }}" class="subtitle" target="_blank">LIVE PREVIEW</a>
                                    </div>
                                    <div>
                                        <a href="{{ $item->github }}" class="subtitle" target="_blank">GITHUB</a>
                                    </div>
                                    {{-- <p class="subtitle">{!! $item->description !!}</p> --}}
                                </div>
                            </div>   
                    </div>              
                </div> 
                @endforeach 
                {{-- Recent Project foreach end --}}

                {{-- Laravel Project foreach start --}}
                 @foreach ($laravelProjects as $item) 
                <div class="col-md-6 col-lg-4 web new" style="position: absolute; left: 0px; top: 0px;">
                    <a href="{{ $item->url }}" target="_blank">
                    <div class="portfolio-item">
                        <img src="{{ asset('public/images/project/'.$item->image) }}"  class="img-fluid" alt="" style="height: 180px; width:300px">                        
                        <div class="content-holder">
                            <div class="text-holder">
                                {{-- <h6 class="title">{{ $item->title }}</h6> --}}
                                <div>
                                    <a href="{{ $item->url }}" class="subtitle" target="_blank">LIVE PREVIEW</a>
                                </div>
                                <div>
                                    <a href="{{ $item->github }}" class="subtitle" target="_blank">GITHUB</a>
                                </div>
                                {{-- <p class="subtitle">{!! $item->description !!}</p> --}}
                            </div>
                        </div>   
                    </div>             
                </div>
                @endforeach
                {{-- Laravel Project foreach start --}}

                {{-- React Project foreach start --}}
                @foreach ($reactProjects as $item)
                <div class="col-md-6 col-lg-4 branding new" style="position: absolute; left: 0px; top: 455.373px;">
                    <a href="{{ $item->url }}" target="_blank">
                        <div class="portfolio-item">
                            <img src="{{ asset('public/images/project/'.$item->image) }}" class="img-fluid" alt="" style="height: 180px; width:300px">                        
                            <div class="content-holder">
                                <div class="text-holder">
                                    {{-- <h6 class="title">{{ $item->title }}</h6> --}}
                                    <div>
                                        <a href="{{ $item->url }}" class="subtitle" target="_blank">LIVE PREVIEW</a>
                                    </div>
                                    <div>
                                        <a href="{{ $item->github }}" class="subtitle" target="_blank">GITHUB</a>
                                    </div>
                                    {{-- <p class="subtitle">{!! $item->description !!}</p> --}}
                                </div>
                            </div>   
                        </div> 
                    </a>
                </div>              
                @endforeach
               {{-- React Project foreach end --}}
            </div> 
        </div>  
        {{-- portfilio end --}}
    </div>            
</section>

<!-- End of portfolio section -->
@endsection