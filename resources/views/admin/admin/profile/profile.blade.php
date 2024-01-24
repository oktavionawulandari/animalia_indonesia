@extends('layout-admin.main-layout')
@section('title', 'Data Profile')
@include('layout-admin.navigation')
@section('container')
<style>
  .form-row {
    display: flex;
    align-items: center;
  }

  .form-group {
    flex: 1;
    margin-left: 10px;
  }
</style>

<div class="container mt-5">
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="text-center">
                                <div class="user-avatar">
                                    @if ($admin->profile)
                                        <img src="{{ asset($admin->profile) }}" alt="{{ $admin->profile }}" style="width:100px;" class="rounded-circle img-thumbnail">
                                    @else
                                        <img src="{{ asset('landing-page/images/user.svg') }}" alt="image profile" style="width:100px;" class="avatar-img rounded-circle rounded">
                                    @endif
                                </div>
                                    <h5 class="user-name mt-3 fw-bold">{{ $admin->username }}</h5>
                                    <h6 class="badge badge-primary">{{ $admin->level }}</h6>
                                </div>
                            </div>
                        <div class="about text-center mt-3">
                            <h5 class="text-danger fw-bold mt-3">Edit Profile</h5>
                                <form action="{{ route('update.foto.profile', $admin->id) }}) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="form-control @error('profile') is-invalid @enderror" id="profile" name="profile">
                                    @error('profile')
                                        <span>{{ $message }}</span>
                                    @enderror
                                    <button class="btn btn-outline-danger  mt-2" style=" font-size: 13px; padding: 5px 17px;">submit</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-sm-12 d-flex align-items-center">
                        <h5 class="fw-bold mb-3 text-danger">Data Adopter</h5>
                        <a href="{{ route('edit.profile.admin', $admin->id )}}"  class="btn btn-danger ml-auto" style="font-size: 13px; padding: 5px 17px;" >Edit</a>
                    </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                    <div class="mb-3 row">
                        <div class="col-sm-2">Username</div>
                        <div class="col-sm-10">
                        : {{ $admin->username }}
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                        <div class="col-sm-2">Nama</div>
                        <div class="col-sm-10">
                            : {{ $admin->name }}
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                        <div class="col-sm-2">Jenis Kelamin</div>
                        <div class="col-sm-10">
                            : {{ $admin->gender }}
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                        <div class="col-sm-2">Level</div>
                        <div class="col-sm-10">
                            : {{ $admin->level }}
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>

@endsection
