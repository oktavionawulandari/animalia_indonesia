@extends('layout-adopter.main-layout')
@section('title', 'Profile')
@include('layout-adopter.navigation')
@section('container')
<style>
    .card {
      box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    }
</style>
<div class="container" style="padding-top: 210px;">
    <div class="main-body">
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
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset($adopter->profile) }}" alt="{{ $adopter->profile }}"class="rounded-circle  img-thumbnail" style="width: 150px; height: 150px;">
                    <div class="mt-3">
                      <h4>{{ $adopter->username }}</h4>
                      <p class="text-muted font-size-sm">{{ $adopter->email }}</p>
                      <div class="text-center">
                        <h5 class="text-danger fw-bold mt-3">Edit Profile</h5>
                        <form action="{{ route('update.profile.picture', ['id' => $adopter->id]) }}" method="POST" enctype="multipart/form-data">
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
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="fw-bold mb-3 text-danger">Form Adopsi</h5>
                    </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="feather feather-github mr-2 icon-inline">
                            <image href="{{ asset('assets/img/file-document.svg') }}" width="24" height="24" />
                          </svg>Form</h6>
                        <span class="text-secondary">
                            @if ($adopter->form && $adopter->form->form == 'filled')
                                <span class="badge badge-success">Sudah Diisi</span>
                            @elseif ($adopter->form && $adopter->form->form == 'unfilled')
                                <span class="badge badge-danger">Perbaiki</span>
                            @else
                                -
                            @endif
                        </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12 d-flex align-items-center">
                        <h5 class="fw-bold mb-3 text-danger">Data Adopter</h5>
                        <a href="{{ route('adopter.profile.edit', $adopter->id) }}"  class="btn btn-danger ml-auto" style="font-size: 13px; padding: 5px 17px;" >Edit</a>
                    </div>
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $adopter->username }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $adopter->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <p class="text-black mb-0">
                            @if ($adopter->status == 1)
                                <span class="badge badge-danger">Tidak Aktif</span>
                            @else
                                <span class="badge badge-success">Aktif</span>
                            @endif
                        </p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Role</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $adopter->level }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIK</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ($adopter->detailAdopter)
                            {{ $adopter->detailAdopter->nik }}
                        @else
                            -
                        @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ($adopter->detailAdopter)
                            {{ $adopter->detailAdopter->full_name }}
                        @else
                           -
                        @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tanggal Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ($adopter->detailAdopter)
                            {{ $adopter->detailAdopter->birthday }}
                        @else
                           -
                        @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">HP</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ($adopter->detailAdopter)
                            {{ $adopter->detailAdopter->phone }}
                        @else
                             -
                        @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Kode Pos</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ($adopter->detailAdopter)
                            {{ $adopter->detailAdopter->zip_code }}
                        @else
                            -
                        @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ($adopter->detailAdopter)
                            {{ $adopter->detailAdopter->street }}
                        @else
                            -
                        @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Kabupaten</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ($adopter->detailAdopter && $adopter->detailAdopter->regency)
                            {{ $adopter->detailAdopter->regency->name }}
                        @else
                           -
                        @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Kecamatan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ($adopter->detailAdopter && $adopter->detailAdopter->subDistrict)
                            {{ $adopter->detailAdopter->subDistrict->name }}</p>
                        @else
                            -
                        @endif
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
@endsection
