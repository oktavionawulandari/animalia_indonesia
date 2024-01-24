@extends('layout-admin.main-layout')
@section('title', 'Data Hewan Adopsi')
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
            </div>
        </div>
    </div>
</div>

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Hewan Adopsi</h4>
                </div>
                <div class="card-body">
                    <form class="form-sample" action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control @error('name_pets') is-invalid @enderror" id="name_pets" name="name_pets" placeholder="name" value="{{ old('name_pets') }}">
                                    @error('name_pets')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
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
                        <div class="row">
                            <div class="col-md-5 col-lg-3">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Jantan</option>
                                        <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Betina</option>
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
                                        <option value="Dogs" {{ old('category') === 'Dogs' ? 'selected' : '' }}>Anjing</option>
                                        <option value="Cats" {{ old('category') === 'Cats' ? 'selected' : '' }}>Kucing</option>
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
                                    <label>Ras Hewan</label>
                                    <input type="text" class="form-control @error('ras') is-invalid @enderror" id="ras" name="ras" placeholder="ras" value="{{ old('ras') }}">
                                    @error('ras')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-lg-6">
                                <div class="form-group">
                                    <label>Riwayat Vaksin</label>
                                    <input type="text" class="form-control @error('vaccine') is-invalid @enderror" id="vaccine" name="vaccine" placeholder="Riwayat Vaksin" value="{{ old('vaccine') }}">
                                    @error('vaccine')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Informasi Kesehatan</label>
                                    <input type="text" class="form-control @error('information') is-invalid @enderror" id="information" name="information" placeholder="Informasi Kesehatan" value="{{ old('information') }}">
                                    @error('information')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Deskripsi Tentang Hewan" value="{{ old('description') }}">
                                    {{-- <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description') }}</textarea> --}}
                                    @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <label>Video</label>
                                    <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" name="video" value="{{ old('video') }}">
                                    @error('video')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="status" value="Free" readonly />
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('animals.list') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
