@extends('layout-adopter.main-layout')
@section('title', 'Beranda Pengguna')
@include('layout-adopter.navigation')
@section('container')

<style>
     // DASHBOARD ADOPTER //
     /* CARDS */

     @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

     * {
         box-sizing: border-box;
     }
     .courses-container {

     }

     .course {
         background-color: #fff;
         border-radius: 10px;
         box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
         display: flex;
         max-width: 100%;
         margin: 20px;
         overflow: hidden;
         height: 200px;
     }

     .course h6 {
         opacity: 0.6;
         margin: 0;
         letter-spacing: 1px;
         text-transform: uppercase;
     }

     .course h2 {
         letter-spacing: 1px;
         margin: 10px 0;
     }

     .course-preview {
         background-color:#061429;
         color: #fff;
         padding: 30px;
         max-width: 250px;
     }

     .course-preview a {
         color: #fff;
         display: inline-block;
         font-size: 12px;
         opacity: 0.6;
         margin-top: 30px;
         text-decoration: none;
     }

     .course-info {
         padding: 30px;
         position: relative;
         width: 100%;
     }

     .progress-container {
         position: absolute;
         top: 30px;
         right: 30px;
         text-align: right;
         width: 150px;
     }

     .progress {
         background-color: #ddd;
         border-radius: 3px;
         height: 5px;
         width: 100%;
     }

     .progress::after {
         border-radius: 3px;
         background-color: #ff3838;
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         height: 5px;
         width: 66%;
     }

     .progress-text {
         font-size: 10px;
         opacity: 0.6;
         letter-spacing: 1px;
     }

     .btn2 {
         background-color: #ff2d2d;;
         border: 0;
         border-radius: 50px;
         box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
         color: #fff;
         font-size: 13px;
         padding: 10px 20px;
         position: absolute;
         bottom: 20px;
         right: 30px;
         letter-spacing: 1px;
     }

     .container2 {
       max-width: 400px;
       width: 100%;
       background: #fff;
       padding: 30px;
       border-radius: 30px;
     }
     .img-area {
       position: relative;
       width: 100%;
       height: 240px;
       background: var(--grey);
       margin-bottom: 30px;
       border-radius: 15px;
       overflow: hidden;
       display: flex;
       justify-content: center;
       align-items: center;
       flex-direction: column;
     }
     .img-area .icon {
       font-size: 100px;
     }
     .img-area h3 {
       font-size: 20px;
       font-weight: 500;
       margin-bottom: 6px;
     }
     .img-area p {
       color: #999;
     }
     .img-area p span {
       font-weight: 600;
     }
     .img-area img {
       position: absolute;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       object-fit: cover;
       object-position: center;
       z-index: 100;
     }
     .img-area::before {
       content: attr(data-img);
       position: absolute;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       background: rgba(0, 0, 0, .5);
       color: #fff;
       font-weight: 500;
       text-align: center;
       display: flex;
       justify-content: center;
       align-items: center;
       pointer-events: none;
       opacity: 0;
       transition: all .3s ease;
       z-index: 200;
     }
     .img-area.active:hover::before {
       opacity: 1;
     }
     .select-image {
       display: block;
       width: 100%;
       padding: 16px 0;
       border-radius: 15px;
       background: var(--blue);
       color: #fff;
       font-weight: 500;
       font-size: 16px;
       border: none;
       cursor: pointer;
       transition: all .3s ease;
     }
     .select-image:hover {
       background: var(--dark-blue);
     }

     /* CSS UPLOAD FILE */
     .course2 {
       background-color: #fff;
       border-radius: 10px;
       box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
       display: flex;
       max-width: 100%;
       margin: 20px;
       overflow: hidden;
     }

     .course2 h6 {
       opacity: 0.6;
       margin: 0;
       letter-spacing: 1px;

       text-transform: uppercase;
     }

     .course2 h2 {
       letter-spacing: 1px;
       margin: 10px 0;
     }

     .course-preview {
       background-color:#ffc6c6;
       color: #fff;
       padding: 30px;
       max-width: 250px;
     }

     .course-preview a {
       color: #fff;
       display: inline-block;
       font-size: 12px;
       opacity: 0.6;
       margin-top: 30px;
       text-decoration: none;
     }

     .course-info {
       padding: 30px;
       position: relative;
       width: 100%;
     }

</style>

<div class="container text-center" style="padding-top: 190px;">
    <div class="row">
      @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show">
              <strong>Success!</strong> {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif

      @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show">
              <strong>Error!</strong> {{ session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
      <div class="col" height="200px">
        <div class="course" height="200px">
            <div class="course-preview">
                <img src="{{ asset('landing-page/images/login.png') }}"  width="150" alt="">
            </div>
            <div class="course-info">
                <div class="progress-container">
                    <div class="progress"></div>
                </div>
                <div class="mt-3">
                    <h6>Selamat Datang, {{ Auth::guard('adopter')->user()->username }}!</h6>
                </div>
                @if (!$isDataFilled)
                <div class="mt-2">
                    <p class="text-left"  style="font-size:14px; color:#061429"> Lengkapi data diri sebelum melakukan adopsi.</p>
                </div>
                <div class="mt-5">
                    <a href="{{ route('add.data.adopter') }}" class="btn2">Tambah Data</a>
                </div>
                @else
                <div class="mt-2">
                    <p class="text-left"  style="font-size:14px; color:#061429"> Terima kasih sudah melengkapi data diri.</p>

                </div>
                @endif
            </div>
        </div>
      </div>
      <div class="col">
        <div class="course">
            <div class="course-info" height="200px">
                <div class="progress-container">
                    <div class="progress"></div>
                </div>
                <div class="mt-3">
                <h6 class="text-left" >Formulir Adopsi </h6>
                </div>
                <div class="mt-3">
                    <p class="text-left" style="font-size:14px; color:#061429">Lengkapi formulir untuk melakukan adopsi.</p>
                </div>
                <div class="mt-5">
                    <a href="{{ route('exportlaporan') }}" target="_blank" class="btn2">Unduh</a>
                </div>
            </div>
        </div>
      </div>
    </div>
    @if (!$isDataFilledForms)
    <div class="row">
        <div class="col">
            <div class="course2">
                <div class="course-info">
                    <div class="progress-container" height="200px">
                        <div class="progress"></div>
                    </div>
                    <form action="{{ route('forms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3">
                            <h6 class="text-left">Upload Formulir Adopsi </h6>
                        </div>
                        <div class="mb-3 mt-2">
                            <p class="text-center">Please upload documents only in 'pdf', 'docx', & 'text' format.</p>
                            <input type="file" class="form-control @error('document') is-invalid @enderror" id="document" name="document">
                            @error('document')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('form') is-invalid @enderror" id="form" name="form" value="filled" readonly hidden>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn2"><i class="fa fa-plus"></i> Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        @endif
        <div class="container mt-5 mb-5">
            <h1 class="card-title">
                <div class="mb-3 mt-3 border-bottom">
                    <h3 class="text-center"> Tata Cara Adopsi </h3>
                </div>
            </h1>
        <div class="card-group">
            <div class="card">
              <img src="{{ asset('landing-page/images/asset-5.png') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title fw-bold">1</h5>
                <p class="card-text text-dark" style="font-size: 14px;">Mengisi data diri yang dengan benar dan lengkap serta menyediakan keamanan tempat tinggal yang layak bagi hewan</p>
              </div>
            </div>
            <div class="card">
              <img src="{{ asset('landing-page/images/asset-3.png') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title fw-bold">2</h5>
                <p class="card-text text-dark" style="font-size: 14px;">Mengisi nama dan tanda tangan pengadopsi lalu upload formulir adopsi</p>
              </div>
            </div>
            <div class="card">
              <img src="{{ asset('landing-page/images/asset-4.png') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title fw-bold">3</h5>
                <p class="card-text text-dark" style="font-size: 14px;">Memilih hewan yang ingin diadopsi</p>
              </div>
            </div>
              <div class="card">
                <img src="{{ asset('landing-page/images/asset-7.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title fw-bold">4</h5>
                  <p class="card-text text-dark" style="font-size: 14px;">admin menghubungi adopter untuk verifikasi identitas, serta tim akan melakukan kunjungan ke rumah calon pemilik, dan wawancara mengenai pengalaman dan pengetahuan tentang merawat hewan.</p>
                </div>
              </div>
              <div class="card">
                <img src="{{ asset('landing-page/images/asset-8.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title fw-bold">5</h5>
                  <p class="card-text text-dark" style="font-size: 14px;">Tunggu hingga kurang lebih 3 hari, admin akan menginformasikan status adopsi hewan</p>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
