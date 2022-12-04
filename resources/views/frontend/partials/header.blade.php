<header class="header">
    <div class="container">
        <ul class="social-icons pt-3">
            <li class="social-item"><a class="social-link text-light" href="{{ $contact->linkedin }}"><i class="ti-linkedin" aria-hidden="true"></i></a></li>
            <li class="social-item"><a class="social-link text-light" href="{{ $contact->github }}"><i class="ti-github" aria-hidden="true"></i></a></li>
            <li class="social-item"><a class="social-link text-light" href="{{ $contact->facebook }}"><i class="ti-facebook" aria-hidden="true"></i></a></li>
            <li class="social-item"><a class="social-link text-light" href="{{ $contact->twitter }}"><i class="ti-twitter" aria-hidden="true"></i></a></li>
            <li class="social-item"><a class="social-link text-light" href="{{ $contact->google }}"><i class="ti-google" aria-hidden="true"></i></a></li>
            <li class="social-item"><a class="social-link text-light" href="{{ $contact->instagram }}"><i class="ti-instagram" aria-hidden="true"></i></a></li>
            <li class="social-item"><a class="social-link text-light" href="{{ $contact->skype }}"><i class="ti-skype" aria-hidden="true"></i></a></li>
        </ul>

        

        <div class="header-content">
            <h4 class="header-subtitle"> {{ $contact->intro }} </h4>
            <h1 class="animate__animated animate__bounce title-name">{{ $contact->name }}</h1>
            <h6 class="header-mono" >{{ $contact->designation }}</h6>
            <a href="{{ asset('public/images/resume/'.$contact->resume) }}"><button class="btn btn-primary btn-rounded"><i class="pr-2"></i>Download My Resume</button></a>
        </div> 
    </div>
</header>
