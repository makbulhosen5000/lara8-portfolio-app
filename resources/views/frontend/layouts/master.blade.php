@include('frontend.partials.style')

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    @include('frontend.partials.header')
    @include('frontend.partials.nav')
    

    @yield('content')


    @include('frontend.partials.footer')
	@include('frontend.partials.script')


</body>
</html>
