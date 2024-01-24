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
                    <h4 class="card-title">Edit Rescue</h4>
                </div>
                <div class="card-body">
                    <form class="form-sample" action="{{ route('rescue.update', $rescue->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-4">
                            <label>Gambar</label>
                            @if ($rescue->image)
                                <div class="mt-2">
                                    <img src="{{ asset($rescue->image) }}" alt="Foto Lama" class="img-thumbnail" style="width: 150px;">
                                </div>
                            @endif
                        </div>
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
                                    <input type="text" class="form-control @error('name_pets') is-invalid @enderror" id="name_pets" name="name_pets" placeholder="cth: mochi" value="{{ old('name_pets', $rescue->name_pets) }}">
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
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="Male" @if($rescue->gender == 'Male') selected @endif>Jantan</option>
                                        <option value="Female" @if($rescue->gender == 'Female') selected @endif>Betina</option>
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
                                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                                        <option value="Dogs" @if($rescue->category == 'Dogs') selected @endif>Anjing</option>
                                        <option value="Cats" @if($rescue->category == 'Cats') selected @endif>Kucing</option>
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
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                        <option value="found" @if($rescue->status == 'found') selected @endif>Ditemukan</option>
                                        <option value="lost" @if($rescue->status == 'lost') selected @endif>Hilang</option>
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
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $rescue->location) }}" placeholder="cth: Jl. Cemara No.55">
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
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $rescue->date) }}">
                                    @error('date')
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
                                    <label>Informasi</label>
                                    <input type="text" class="form-control @error('information') is-invalid @enderror" id="information" name="information" value="{{ old('information', $rescue->information) }}" placeholder="cth: Ciri - Ciri Hewan">
                                    @error('information')
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
                                    <label>Kontak (WA)</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ $details->phone }}" name="phone" placeholder="cth: 081339993119">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Nama Kontak</label>
                                    <input type="text" class="form-control @error('name_contact') is-invalid @enderror" id="name_contact" name="name_contact" value="{{ $details->name_contact }}"  placeholder="cth: Budi">
                                    @error('name_contact')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('rescue.list') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Edit Rescue
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('rescue.update', $rescue->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="name_pets">Name</label>
                            <input type="text" name="name_pets" class="form-control" value="{{ $rescue->name_pets }}" required>
                        </div>

                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" name="age" class="form-control" value="{{ $rescue->age }}" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="Male" {{ $rescue->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $rescue->gender === 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control" required>
                                <option value="Dogs" {{ $rescue->category === 'Dogs' ? 'selected' : '' }}>Dogs</option>
                                <option value="Cats" {{ $rescue->category === 'Cats' ? 'selected' : '' }}>Cats</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ $rescue->location }}" required>
                        </div>

                        <div class="form-group">
                            <label for="information">Information</label>
                            <textarea name="information" class="form-control" required>{{ $rescue->information }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="found" {{ $rescue->status === 'found' ? 'selected' : '' }}>Found</option>
                                <option value="lost" {{ $rescue->status === 'lost' ? 'selected' : '' }}>Lost</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name_contact">Contact Name</label>
                            <input type="text" name="name_contact" class="form-control" value="{{ $details->name_contact }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $details->phone }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Rescue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
