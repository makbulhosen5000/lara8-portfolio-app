@extends('frontend.layouts.master')
@section('title')
    Home || {{'Makbul Portfolio'}}
@endsection

@section('content')
<!--About Section Start-->
@include('frontend.pages.include-pages.about')
<!--About Section End-->

<!--Resume Section Start-->
@include('frontend.pages.include-pages.resume')
 <!--Resume Section End-->

 <!--Work Documentory Section start-->
  @include('frontend.pages.include-pages.work-documentory')
 <!--Work Documentory Section start-->

@endsection
