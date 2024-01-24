@extends('landing-page.layout.main-layout')
@section('title', 'Login')
@include('landing-page.layout.navigation')
@section('container')
<div class="content">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{ asset('landing-page/images/login.png') }}" class="img-fluid" style="margin-top: 150px;" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" style="margin-top:250px">
                <form class="input" action="{{ route('post.login') }}" method="POST">
                    @csrf
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong></strong>  {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong></strong>  {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong></strong>  {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="d-flex flex-row align-items-center justify-content-center">
                        <h1 class="lead fw-normal mb-0 me-3" style="font-size: 30px; font-weight: bold;">LOGIN</h1>
                    </div>
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Silahkan Login Untuk Melakukan Adopsi</p>
                    </div>
                    <div class="form-outline">
                        <label class="form-label" for="form3Example3" style="font-size:15px;">Username</label>
                        <input type="username" id="username" name="username" class="form-control form-control" value="{{ old('username') }}"
                        placeholder="Enter a valid email address" />
                        @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline mt-3">
                        <label class="form-label" for="form3Example4" style="font-size:15px;">Password</label>
                        <input type="password" id="password" name="password" class="form-control form-control" value="{{ old('password') }}"
                        placeholder="Enter password" />
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-danger"  style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register.user') }}"
                            class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
