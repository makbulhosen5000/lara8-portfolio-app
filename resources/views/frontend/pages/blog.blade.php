@extends('frontend.layouts.master')
@section('title')
     Blog || {{'Makbul Portfolio'}}
@endsection
@section('content')
{{-- blog section start --}}
<section class="section" id="blog">
    <div class="container">
        <h2 class="mb-5">Latest <span class="text-danger">News</span></h2>
        <div class="row">
            @foreach ($newses as $news)
                <div class="blog-card">
                    <div class="img-holder">
                        <img src="{{ asset('public/images/news/'.$news->image) }}" alt="">
                    </div>
                    <div class="content-holder">
                        <h6 class="title">{{ $news->title }}</h6>

                        <p class="post-details">
                            <a href="#">Post By: {{Auth::user()}}</a>
                            {{-- <a href="#"><i class="ti-heart text-danger"></i> 234</a>
                            <a href="#"><i class="ti-comment"></i> 123</a> --}}
                        </p>
                        
                        <p>{{ $news->short_desc }}</p>
                        <a href="#" class="read-more">Read more <i class="ti-angle-double-right"></i></a>
                    </div>
                </div><!-- end of blog wrapper -->           
            @endforeach

        </div>
    </div>
</section>
{{-- blog section end --}}
@endsection