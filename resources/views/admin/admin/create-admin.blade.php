@extends('layout-admin.main-layout')
@section('title', 'Data Admin')
@include('.layout-admin.navigation')
@section('container')

<div class="panel-header bg-danger-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">
                    <i class="fas fa-home"></i>
                    <span class="ms-2">@yield('title')</span>
                </h2>
                <h5 class="text-white op-7 mb-2">Selamat Datang, {{ Auth::guard('admin')->user()->username }}!</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="{{ route('create.admin.account') }}" class="btn btn-light btn-round text-danger">
                    <i class="icofont-ui-add" style="margin-right: 5px;"></i>
                    Add Admin
                  </a>
            </div>
        </div>
    </div>
</div>

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Admin</h4>
                </div>
                <div class="card-body">
                    <form class="form-sample" action="{{ route('store.admin.account') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="username" value="{{ old('username') }}">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-7">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ old('gender') }}">
                                        <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Laki - Laki</option>
                                        <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Level</label>
                                    <input type="text" class="form-control @error('level') is-invalid @enderror" id="level" name="level" value="Admin" readonly>
                                    @error('level')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('admin.account') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
