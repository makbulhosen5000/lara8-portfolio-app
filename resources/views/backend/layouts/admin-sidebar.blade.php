@php
    $prefix=Request::route()->getPrefix();
    $route=Route::current()->getName();
@endphp
{{-- @dd($prefix); --}}

  <!-- Main Sidebar Container start -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('home')}}" class="brand-link">
      <img src="{{asset('public')}}/backend/dist/img/logo.png" alt="logo.png" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public')}}/backend/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->role}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->role=='admin')
        {{-- user info start --}}
        <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}} ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
            Manage User 
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('users.all')}}" class="nav-link {{($route=='users.all')?'active':''}} ">
                <i class="far fa-circle nav-icon"></i>
                <p>User List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('users.change.password')}}" class="nav-link {{($route=='users.change.password')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>User Password Change</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('users.location.view')}}" class="nav-link {{($route=='users.location.view')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>User Location</p>
              </a>
            </li>
          
          </ul>
      </li>
      {{-- user info end --}}
      {{-- logo start --}}
        <li class="nav-item has-treeview {{($prefix=='/logos')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Manage Logo 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('logos.view')}} " class="nav-link {{($route=='logos.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('companies.logo.view')}} " class="nav-link {{($route=='companies.logo.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brands Logo</p>
                </a>
              </li>
            </ul>
        </li>
        {{-- logo end --}}
                {{-- slider start --}}
                <li class="nav-item has-treeview {{($prefix=='/sliders')?'menu-open':''}} ">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                    Manage Slider
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('sliders.view')}} " class="nav-link {{($route=='sliders.view')?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Slider</p>
                      </a>
                    </li>
                  </ul>
              </li>
              {{-- slider end --}}
        {{-- contact start --}}
        <li class="nav-item has-treeview {{($prefix=='/contacts')?'menu-open':''}} ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
            Manage Contact 
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('contacts.view')}} " class="nav-link {{($route=='contacts.view')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact</p>
              </a>
            </li>
          </ul>
      </li>
      {{-- contact end --}}
      {{-- about, team, news,career start --}}
      <li class="nav-item has-treeview {{($prefix=='/about')?'menu-open':''}} ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
             Manage About & More
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('about.view')}} " class="nav-link {{($route=='about.view')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>About Us</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('about.team.view')}} " class="nav-link {{($route=='about.team.view')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Our Team</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('about.news.view')}} " class="nav-link {{($route=='about.news.view')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>News</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('about.career.view')}} " class="nav-link {{($route=='about.career.view')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Career</p>
              </a>
            </li>
          </ul>
      </li>
      {{-- about, team, news,career end --}}
       {{-- contact start --}}
       <li class="nav-item has-treeview {{($prefix=='/resumes')?'menu-open':''}} ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
           Manage Resume*
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('resumes.experience.view')}} " class="nav-link {{($route=='resumes.experience.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Job Experineces</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('resumes.education.view')}} " class="nav-link {{($route=='resumes.education.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Education</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('resumes.training.view')}} " class="nav-link {{($route=='resumes.training.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Training</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('resumes.skill.view')}} " class="nav-link {{($route=='resumes.skill.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Skill</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('resumes.language.view')}} " class="nav-link {{($route=='resumes.language.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Language</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('resumes.documentary.view')}} " class="nav-link {{($route=='resumes.documentary.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Work Documentary</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('resumes.recent.project.view')}} " class="nav-link {{($route=='resumes.recent.project.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Recent Project</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('resumes.total.project.view')}} " class="nav-link {{($route=='resumes.total.project.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Laravel Project</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('resumes.react.project.view')}} " class="nav-link {{($route=='resumes.react.project.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>React Project</p>
            </a>
          </li>
      </ul>
    </li>
    {{-- contact end --}}
      {{-- services start--}}
      <li class="nav-item has-treeview {{($prefix=='/services')?'menu-open':''}} ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Service
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('services.view')}} " class="nav-link {{($route=='services.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Service</p>
            </a>
          </li>
        </ul>
        {{-- service end --}}
    </li>
        <li class="nav-item has-treeview {{($prefix=='/timers')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Manage CountDownTimer 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('timers.view')}} " class="nav-link {{($route=='timers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timer</p>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item has-treeview {{($prefix=='/categories')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.view')}}" class="nav-link {{($route=='categories.view')?'active':''}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('sub.categories.view')}}" class="nav-link {{($route=='sub.categories.view')?'active':''}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub-Category</p>
                </a>
              </li>
            </ul>
        </li>
        {{-- <li class="nav-item has-treeview {{($prefix=='/brands')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Manage Brand 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('brands.view')}}" class="nav-link {{($route=='brands.view')?'active':''}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand List</p>
                </a>
              </li>
            </ul>
        </li> --}}
        {{-- <li class="nav-item has-treeview {{($prefix=='/brands')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Manage Color
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('colors.view')}}" class="nav-link {{($route=='colors.view')?'active':''}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Color List</p>
                </a>
              </li>
            </ul>
        </li> --}}
        {{-- <li class="nav-item has-treeview {{($prefix=='/brands')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Manage Size
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sizes.view')}}" class="nav-link {{($route=='sizes.view')?'active':''}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Size List</p>
                </a>
              </li>
            </ul>
        </li> --}}
        <li class="nav-item has-treeview {{($prefix=='/products')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Manage Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.view')}}" class="nav-link {{($route=='products.view')?'active':''}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/email')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Manage Email
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user-email.view')}} " class="nav-link {{($route=='user-email.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Email</p>
                </a>
              </li>
            </ul>
        </li>
        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 <!-- Main Sidebar Container end -->
