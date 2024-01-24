@section('navbar')
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div> <!-- .site-mobile-menu -->

  @php
  $user = auth()->guard('adopter')->user();
@endphp
  <div class="site-navbar-wrap">
    <div class="site-navbar-top">
        <div class="container py-3">
          <div class="row align-items-center">
            <div class="col-6">
              <div class="d-flex mr-auto">
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" id="profileDropdown" data-toggle="dropdown" style="color: #fff;" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('/' . $user->profile) }}" alt="{{ $user->profile }}" class="rounded-circle" alt="Profile Image" width="30" height="30">
                    <span class="d-none d-md-inline-block me-5"  style="color: #fff; font-size: 15px;";>{{ Auth::guard('adopter')->user()->username }}</span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('adopter.data.profile') }}"><i class="icofont-user me-2"></i></span>Edit Profile</a>
                    <a class="dropdown-item" href="{{ route('password.edit')}}"><i class="icofont-key me-2"></i>Update Password</a>
                    <a class="dropdown-item" href="{{ route('logout')}}"><i class="icofont-logout me-2"></i></span> Logout</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 text-right">
              <div class="mr-auto">
                <a href="https://www.facebook.com/profile.php?id=100086171755179" class="p-2 pl-0"><span class="icon-facebook"></span></a>
                <a href="https://www.instagram.com/sintesiaanimaliaindonesia/" class="p-2 pl-0"><span class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="site-navbar site-navbar-target js-sticky-header">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-2">
            <img src="{{ asset('landing-page/images/logo.png') }}" width="100px">
          </div>
          <div class="col-10">
            <nav class="site-navigation text-right" role="navigation">
              <div class="container">
                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-dark"><span class="icon-menu h3"></span></a></div>
                <ul class="site-menu main-menu js-clone-nav d-none d-lg-block">
                  <li><a href="{{ route('dashboard.adopter') }}" class="nav-link {{ request()->is('dashboard/adopter') ? 'active' : '' }}">Home</a></li>
                  <li><a href="{{ route('adopter.data.animal') }}" class="nav-link {{ request()->is('list/animal/adoption') ? 'active' : '' }}">Adoption</a></li>
                  <li><a href="{{ route('adopter.data.rescue') }}" class="nav-link {{ request()->is('list/rescue') ? 'active' : '' }}" class="nav-link">Rescue</a></li>
                  <li><a href="{{ route('adopter.data.status') }}" class="nav-link {{ request()->is('status') ? 'active' : '' }}">Status</a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
