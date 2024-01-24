@section('navbar')
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div> <!-- .site-mobile-menu -->


  <div class="site-navbar-wrap">
    <div class="site-navbar-top">
      <div class="container py-3">
        <div class="row align-items-center">
          <div class="col-6">
            <div class="d-flex mr-auto">
              <a href="{{ route('login') }}" class="d-flex align-items-center mr-4">
                <span class="icon-user mr-2"></span>
                <span class="d-none d-md-inline-block">Login</span>
              </a>
              <a href="{{ route('register.user') }}" class="d-flex align-items-center mr-auto">
                <span class="icon-user-plus mr-2"></span>
                <span class="d-none d-md-inline-block">Registrasi</span>
              </a>
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
                  <li class="#classes-section"><a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                  <li><a href="{{ route('landing.adoption.list') }}"class="nav-link {{ request()->is('landing/adoption/list') ? 'active' : '' }}">Adoption</a></li>
                  <li><a href="{{ route('landing.rescue.list') }}" class="nav-link {{ request()->is('landing/rescue/list') ? 'active' : '' }}">Rescue</a></li>
                  <li><a href="{{ route('landing.about') }}" class="nav-link {{ request()->is('about/us') ? 'active' : '' }}">Tentang Kami</a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
