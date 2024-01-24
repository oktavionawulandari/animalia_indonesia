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
                    <h4 class="card-title">Edit Hewan</h4>
                </div>
                <div class="card-body">
                        <form class="form-sample" action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-5 col-lg-4">
                                    <label>Gambar</label>
                                    @if ($animal->image)
                                        <div class="mt-2">
                                            <img src="{{ asset($animal->image) }}" alt="Foto Lama" class="img-thumbnail" style="width: 150px;">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-5 col-lg-4">
                                    <label>video</label>
                                    <div class="mt-2">
                                        <video controls style="width: 300px; height:150px;"> <source src="{{ asset($animal->video) }}" type="video/mp4"></video>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-lg-4">
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" id="image" class="form-control @error('image')is-invalid @enderror" value="{{ old('image', $animal->image) }}"  name="image" placeholder="image">
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
                                        <input type="name" class="form-control @error('name_pets')is-invalid @enderror" value="{{ old('name_pets', $animal->name_pets) }}" id="name_pets" name="name_pets" placeholder="name">
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
                                        <input type="month" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="Tanggal Lahir" value="{{ old('age', $animal->age) }}">
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
                                        <select class="form-control @error('gender')is-invalid @enderror" id="gender" name="gender">
                                            <option value="Male" {{ old('gender', $animal->gender) == 'Male' ? 'selected' : '' }}>Jantan</option>
                                            <option value="Female" {{ old('gender', $animal->gender) == 'Female' ? 'selected' : '' }}>Betina</option>
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
                                        <select class="form-control @error('category')is-invalid @enderror" id="category" name="category">
                                            <option value="Dogs" {{ old('category', $animal->category) == 'Dogs' ? 'selected' : '' }}>Anjing</option>
                                            <option value="Cats" {{ old('category', $animal->category) == 'Cats' ? 'selected' : '' }}>Kucing</option>
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
                                        <input type="ras" class="form-control @error('ras')is-invalid @enderror" value="{{ old('ras', $animal->ras) }}" id="ras" name="ras" placeholder="ras">
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
                                        <input type="text" class="form-control @error('vaccine')is-invalid @enderror" value="{{ old('vaccine', $animal->vaccine) }}" id="vaccine" name="vaccine" placeholder="Riwayat Vaksin">
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
                                        <input type="text" class="form-control @error('information')is-invalid @enderror" value="{{ old('information', $animal->information) }}" id="information" name="information" placeholder="Informasi Kesehatan">
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
                                        <input class="form-control @error('description')is-invalid @enderror" id="description" value="{{ old('description', $animal->description) }}" name="description"></input>
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
                                        <input type="file" class="form-control @error('video')is-invalid @enderror" id="video" value="{{ old('video', $animal->video) }}" name="video"></input>
                                        @error('video')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href={{ route('animals.list') }} class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
