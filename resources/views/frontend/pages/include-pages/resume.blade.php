<!--Resume Section Start-->
<section class="section" id="resume">
    <div class="container">
        <h2 class="mb-5"><span class="text-danger">My</span> Resume</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                   <div class="card-header">
                        <div class="mt-2">
                            <h4>Experience</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($experiences as $experience)
                        <h6 class="title text-danger">{{ $experience->designation }}</h6>      
                        <P class="subtitle"><span class="resume">DeadLine:</span>{{ $experience->deadline }}</P>
                        <P class="subtitle"><span class="resume">Company_Name:</span>{{ $experience->company_name }}</P>
                        <P class="subtitle"><span class="resume">Company_Address:</span>{{ $experience->company_address }}</P>
                        <hr>
                        @endforeach
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
                        @foreach ($qualifications as $qualification)
                        <h6 class="title text-danger">{{ $qualification->qualification }}</h6>
                        <P>{{ $qualification->deadline }}</P>
                        <P class="subtitle">{{ $qualification->address }}</P>
                        <P class="subtitle">{{ $qualification->description }}</P>
                        <hr>                        
                        @endforeach
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
                    @foreach ($skills as $skill)
                    <div class="card-body pb-2">
                       <h6>{{ $skill->skill }}</h6>
                        <div class="progress mb-3 progress-height">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark progress-bar" role="progressbar" style="width:{{ $skill->percentage }}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="50"></div>
                        </div>
                    </div>                  
                    @endforeach
                </div>
                <div class="card">
                   <div class="card-header">
                        <div class="pull-left">
                            <h4 class="mt-2">Languages</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    @foreach($languageSkill as $language)
                    <div class="card-body pb-2">
                       <h6>{{ $language->language }}</h6>
                        <div class="progress mb-3 progress-height">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary progress-bar" role="progressbar" style="width:{{ $language->percentage }}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="50"></div>
                        </div>
                    </div>                  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
 <!--Resume Section End-->