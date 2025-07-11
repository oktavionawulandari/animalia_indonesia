<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{ asset('landing-page/images/logo.png') }}" type="image/x-icon"/>

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('landing-page/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('landing-page/css/owl.carousel.min.css') }}">
    {{-- <link href="{{ asset('landing-page/css/carousel.css') }}" rel="stylesheet"> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('landing-page/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<!-- Fonts and icons -->
    <link rel="stylesheet" href="{{ asset('assets/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome.min.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('landing-page/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/background.css') }}">

    <title>Sintesia Animalia Indonesia</title>
  </head>
  <body>

    @yield('navbar')

      <main role="main">
        @yield('container')
      </main>

    <footer class="footer" style="background: #ce2127; padding-bottom:10px">
        @include('landing-page.layout.footer')
    </footer>


    <script src="{{ asset('landing-page/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('landing-page/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing-page/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing-page/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('landing-page/js/main.js') }}"></script>
  </body>
</html>
