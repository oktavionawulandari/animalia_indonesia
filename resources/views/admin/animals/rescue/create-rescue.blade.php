@extends('layout-admin.main-layout')
@section('title', 'Data Rescue')
@include('layout-admin.navigation')
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
            </div>
        </div>
    </div>
</div>

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Rescue</h4>
                </div>
                <div class="card-body">
                    <form class="form-sample" action="{{ route('rescue.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5 col-lg-4">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="image">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label>Nama Hewan</label>
                                    <input type="text" class="form-control @error('name_pets') is-invalid @enderror" id="name_pets" name="name_pets" placeholder="cth: mochi" value="{{ old('name_pets') }}">
                                    @error('name_pets')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Tanggal Lahir Hewan</label>
                                    <input type="month" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="Tanggal Lahir" value="{{ old('age') }}">
                                    @error('age')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-lg-3">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ old('gender') }}">
                                        <option value="Male">Jantan</option>
                                        <option value="Female">Betina</option>
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
                                    <label>Kategori Hewan</label>
                                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') }}">
                                        <option value="Dogs">Anjing</option>
                                        <option value="Cats">Kucing</option>
                                    </select>
                                    @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label>Status Hewan</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}">
                                        <option value="found">Ditemukan</option>
                                        <option value="lost">Hilang</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Lokasi Hewan</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" placeholder="cth: https://goo.gl/maps/RWnCrUJiJJ1j671Z7
                                    ">
                                    @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Hilang/Ditemukan</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                                    @error('date')
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
                                    <label>Informasi</label>
                                    <input type="text" class="form-control @error('information') is-invalid @enderror" id="information" name="information" value="{{ old('information') }}" placeholder="informasi tentang hewan">
                                    @error('information')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Kontak (WA)</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="cth: 081339993119">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Nama Kontak</label>
                                    <input type="text" class="form-control @error('name_contact') is-invalid @enderror" id="name_contact" name="name_contact" value="{{ old('name_contact') }}" placeholder="cth: admin">
                                    @error('name_contact')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('rescue.list') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
