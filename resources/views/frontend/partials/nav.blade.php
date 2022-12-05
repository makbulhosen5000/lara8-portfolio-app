
{{-- Start Navbar  --}}
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white" data-spy="affix" data-offset-top="510">
    <div class="container">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('resume') }}" class="nav-link active">Resume</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('portfolio') }}" class="nav-link active">Portfolio</a>
                </li>
            </ul>
            <ul class="navbar-nav brand">
                <img src="{{ asset('public/images/image/'.$contact->image) }}" height="180" alt="" class="brand-img">
                <li class="brand-txt">
                    <h5 class="brand-title title-name1">{{ $contact->name }}</h5>
                    <div class="title-name1">{{ $contact->designation }}</div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('package') }}" class="nav-link">Package</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('service') }}" class="nav-link">Service</a>
                </li>
                <li class="nav-item last-item">
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar -->
{{-- Start Navbar  --}}