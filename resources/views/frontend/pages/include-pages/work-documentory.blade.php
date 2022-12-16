<!--Work Documentory Section start-->
<section class="section bg-dark text-center">

    <div class="container">
        <div class="row text-center">
            <div class="col-md-6 col-lg-3">
                <div class="row ">
                    <div class="col-5 text-right text-light border-right py-3">
                        <div class="m-auto"><i class="ti-alarm-clock icon-xl"></i></div>
                    </div>
                    <div class="col-7 text-left py-3">
                        <h1 class="text-danger font-weight-bold font40">{{ $workDocumentaries->total_work }}+</h1>
                        <p class="text-light mb-1">Hours Work </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="row">
                    <div class="col-5 text-right text-light border-right py-3">
                        <div class="m-auto"><i class="ti-layers-alt icon-xl"></i></div>
                    </div>
                    <div class="col-7 text-left py-3">
                        <h1 class="text-danger font-weight-bold font40">{{ $workDocumentaries->total_project }}+</h1>
                        <p class="text-light mb-1">Projects Finished</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="row">
                    <div class="col-5 text-right text-light border-right py-3">
                        <div class="m-auto"><i class="ti-user icon-xl"></i></div>
                        {{-- <div class="m-auto"><i class="ti-face-smile icon-xl"></i></div> --}}
                    </div>
                    <div class="col-7 text-left py-3">
                        <h1 class="text-danger font-weight-bold font40">{{ $workDocumentaries->total_experience }}+</h1>
                        <p class="text-light mb-1">Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="row">
                    <div class="col-5 text-right text-light border-right py-3">
                        <div class="m-auto"><i class="ti-home icon-xl"></i></div>
                    </div>
                    <div class="col-7 text-left py-3">
                        <h1 class="text-danger font-weight-bold font40">{{ $workDocumentaries->total_companies }}+</h1>
                        <p class="text-light mb-1">Companies Work</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-dark py-5">
    
    {{-- <div class="whatsup">
    <a href="{{ URL::to('/chat') }}"><img src="{{asset('public')}}/images/whatsapp/chat.png" width="100px" class="whatsapp_float_btn" alt=""></a>
    </div> --}}

    <div class="container text-center">
        <h2 class="text-light mb-5 font-weight-normal">I Am Available For FreeLance</h2>
        <a href="{{ asset('public/images/resume/'.$contact->resume) }}"> <button class="btn btn-outline-success">Hire Me</button></a>
    </div>
    

</section>
 <!--Work Documentory Section start-->