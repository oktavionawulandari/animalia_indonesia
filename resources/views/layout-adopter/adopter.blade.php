@extends('layout-adopter.main-layout')
@section('title', 'Beranda Pengguna')
@include('layout-adopter.navigation')
@section('container')

<div class="content">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="image-slide" src="{{ asset('landing-page/images/yayasan2.png') }}" alt="Second slide">
          <div class="container">
            <div class="carousel-caption text-left">
              <h1>SINTESIA ANIMALIA INDONESIA</h1>
              <h3>Sintesia Animalia Indonesia adalah metamorfosis dari Bali Animal Defender yang konsen pada bidang edukasi, advokasi dan implementasi penegakan hukum perlindungan hewan di Bali pada khususnya dan di Indonesia. Salah satu program keunggulan yayasan yaitu adopsi hewan dan rescue hewan.</h3>
                <div class="button-container1">
                    <p><a href="{{ route('login') }}" class="highlight-button2 btn2 btn-small2 button xs-margin-bottom-five" data-abc="true"><i class="fa fa-info-circle"></i>Login</a><p>
                    <p><a href="{{ route('register.user') }}" class="highlight-button btn btn-small button xs-margin-bottom-five" data-abc="true"><i class="fa fa-info-circle"></i>Registrasi</a><p>
                </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
            <img class="image-slide" src="{{ asset('landing-page/images/adoption2.jpeg') }}" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Adopsi</h1>
                <h3>Mengambil tanggung jawab untuk merawat, menjaga, memperhatikan perkembangan, dan memberikan tempat tinggal bagi hewan yang tidak memiliki rumah yang memadai.</h3>
                <div class="button-container">
                    <p><a href="{{ route('login') }}" class="highlight-button2 btn2 btn-small2 button xs-margin-bottom-five" data-abc="true"><i class="fa fa-info-circle"></i>Login</a><p>
                    <p><a href="{{ route('register.user') }}" class="highlight-button btn btn-small button xs-margin-bottom-five" data-abc="true"><i class="fa fa-info-circle"></i>Registrasi</a><p>
                </div>
              </div>
            </div>
          </div>
        <div class="carousel-item">
          <img class="image-slide" src="{{ asset('landing-page/images/adoption.jpeg') }}" alt="Third slide">
          <div class="container">
            <div class="carousel-caption text-right">
              <h1>Rescue</h1>
              <h3>Proses penyelamatan hewan yang telantar, terluka, atau terancam bahaya.</h3>
              <div class="button-container2">
                <p><a href="{{ route('login') }}" class="highlight-button2 btn2 btn-small2 button xs-margin-bottom-five" data-abc="true"><i class="fa fa-info-circle"></i>Login</a><p>
                <p><a href{{ route('register.user') }}" class="highlight-button btn btn-small button xs-margin-bottom-five" data-abc="true"><i class="fa fa-info-circle"></i>Registrasi</a><p>
            </div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</div>


<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="{{ asset('landing-page/images/logo.png') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
        <h2 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">About US</h2>
        <h1 class="display-2 fw-bold text-body-emphasis lh-1 mb-3">Sintesia</h1>
        <p class="custom-lead">
            Diambil dari kata “synthesis” yang berarti gabungan gagasan untuk membentuk teori atau sistem baru, atau percampuran gagasan, pengaruh, dan hal-hal yang berbeda menjadi satu kesatuan yang berbeda atau baru.
        </p>
        <p class="custom-lead">
            Sintesia mengacu pada apa yang ingin kami lakukan melalui organisasi ini, yaitu membentuk sistem yang membangun kesejahteraan hewan dengan menggabungkan beberapa ide, teori, dan basis pengetahuan yang kami miliki.
        </p>
    </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2 class="custom-heading">Animalia</h2>
            <p class="custom-lead">Animalia mengacu pada kerajaan animalia, yang mencakup setiap spesies hewan dan juga manusia. Menjadi target kami untuk membantu setiap hewan dan bahkan mendukung kesejahteraan manusia untuk kesejahteraan hewan dengan cara yang juga mendukung lingkungan kita.</p>
        </div>
        <div class="col-md-6">
            <h2 class="custom-heading">Indonesia</h2>
            <p class="custom-lead">Indonesia mengacu pada tempat kita ingin bekerja.</p>
        </div>
    </div>
</div>

<section class="features" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                            <div class="header">
                                <h3>Features</h3>
                                <h2>Tata Cara Adopsi</h2>
                            </div>
                    </div>
                    <div class="heading">
                        <div class="box-container">
                            <div class="card">
                                <div class="image">
                                    <img src ="{{ asset('landing-page/images/asset-1.png') }}">
                                </div>
                            <div class="test">
                                <h3>1</h3>
                                <p>membuat akun terlebih dahulu</p>
                            </div>
                            </div>
                            <div class="card">
                                <div class="image">
                                    <img src ="{{ asset('landing-page/images/asset-2.png') }}">
                                </div>
                                <div class = "test">
                                <h3>2</h3>
                                <p>melakukan sign in, dan melengkapi data diri pada halaman dashboard</p>
                                </div>
                            </div>
                            <div class = card>
                                <div class="image">
                                    <img src="{{ asset('landing-page/images/asset-3.png') }}">
                                </div>
                                <div class="test">
                                <h3>3</h3>
                                <p>Melengkapi formulir adopsi dan mengupload ke sistem</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="image">
                                    <img src="{{ asset('landing-page/images/asset-4.png') }}">
                                </div>
                                <div class="test">
                                <h3>4</h3>
                                <p>pilih hewan yang akan diadopsi</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="image">
                                    <img src ="{{ asset('landing-page/images/asset-5.png') }}">
                                </div>
                                <div class="test">
                                <h3>5</h3>
                                <p>yayasan akan melakukan survei ke rumah untuk melihat kondisi rumah apakah memungkinkan untuk memelihara hewan</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="image">
                                    <img src ="{{ asset('landing-page/images/asset-6.png') }}">
                                </div>
                                <div class="test">
                                <h3>6</h3>
                                <p>yayasan akan melakukan kunjungan berkala untuk mengecek hewan apakah dirawat dengan baik atau tidak</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
