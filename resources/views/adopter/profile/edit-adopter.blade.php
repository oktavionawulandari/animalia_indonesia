@extends('layout-adopter.main-layout')
@section('title', 'Edit Profile')
@include('layout-adopter.navigation')
@section('container')

<div class="container py-5">
    <div class="row gutters" style="padding-top: 180px;">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="text-center">
                                <img src="{{ asset($adopter->profile) }}" alt="{{ $adopter->profile }}" class="rounded-circle img-thumbnail img-fluid" style="width: 100px; height: 100px;">
                                <h5 class="user-name">{{ $adopter->username }}</h5>
                                <hr>
                                <p class="user-email text-dark" style="font-size:13px;">{{ $adopter->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <form class="form-sample" action="{{ route('adopter.profile.update', $adopter->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="fw-bold mb-3 text-danger">AKUN ADOPTER</h5>
                            </div>
                            <div class="form-row mt-3 text-start">
                                <div class="form-group col-md-4">
                                    @if ($detailAdopter->ktp_picture)
                                        <div class="mt-2">
                                            <img src="{{ asset($detailAdopter->ktp_picture) }}" alt="Old KTP Picture" class="img-thumbnail" style="width: 150px;">
                                        </div>
                                    @endif
                                    <label class="mt-2">KTP Picture Lama</label>
                                </div>
                                <div class="form-group col-md-4">
                                    @if ($detailAdopter->picture_home)
                                        <div class="mt-2">
                                            <img src="{{ asset($detailAdopter->picture_home) }}" alt="Old KTP Picture" class="img-thumbnail" style="width: 150px;">
                                        </div>
                                    @endif
                                    <label class="mt-2">Halaman Rumah Lama</label>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="ktp_picture">KTP</label>
                                    <input type="file" class="form-control @error('ktp_picture') is-invalid @enderror" id="ktp_picture" name="ktp_picture" value="{{ $adopter->ktp_picture }}" placeholder="Enter username">
                                    @error('ktp_picture')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="picture_home">Foto Rumah</label>
                                    <input type="file" class="form-control @error('picture_home') is-invalid @enderror" id="picture_home" name="picture_home" value="{{ $adopter->picture_home }}" placeholder="Enter username">
                                    @error('picture_home')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $adopter->username }}" placeholder="Enter username">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ $detailAdopter->full_name }}" placeholder="Enter full name">
                                    @error('full_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $detailAdopter->nik }}" required autocomplete="nik">
                                    @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $adopter->email }}" placeholder="Enter email">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $detailAdopter->phone }}" placeholder="Enter phone number">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="birthdate">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ $detailAdopter->birthday }}" max="{{ date('Y-m-d', strtotime('-18 years')) }}" placeholder="Enter birthdate">
                                    @error('birthdate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="">Pilih jenis kelamin</option>
                                        <option value="Male" @if($detailAdopter->gender == 'Male') selected @endif>Laki-laki</option>
                                        <option value="Female" @if($detailAdopter->gender == 'Female') selected @endif>Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="regency_id">Kabupaten</label>
                                    <select class="mt-1 form-select @error('regency_id') is-invalid @enderror" id="regency" name="regency_id">
                                        <option value="">Select Kabupaten</option>
                                        @foreach ($regencies as $regency)
                                            <option value="{{ $regency->id }}" {{ $oldRegencyId == $regency->id ? 'selected' : '' }}>
                                                {{ $regency->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('regency_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="sub_districts">Kecamatan</label>
                                    <select class="mt-1 form-select @error('sub_district_id') is-invalid @enderror" id="subDistrict" name="sub_district_id">
                                        @foreach ($sub_districts as $sub_district)
                                        @if (old('id', $detailAdopter->sub_district_id) == $sub_district->id)
                                        <option value="{{ $sub_district->id }}" selected>
                                            {{ $sub_district->name }}
                                        </option>
                                        @else
                                        <option value="{{ $sub_district->id }}" {{ ($oldSubDistrictId == $sub_district->id) ? 'selected' : '' }}>
                                            {{ $sub_district->name }}
                                        </option>
                                        @endif

                                        @endforeach
                                    </select>
                                    @error('sub_district_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="street">Alamat</label>
                                    <textarea class="form-control @error('street') is-invalid @enderror" id="street" name="street" rows="3">{{ $detailAdopter->street }}</textarea>
                                    @error('street')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#regency').change(function() {
            var regencyId = $(this).val();
            $.ajax({
                url: '{{ route("editRegency") }}',
                method: 'POST',
                data: {
                    regency_id: regencyId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    var subDistricts = response.sub_districts;
                    var subDistrictSelect = $('#subDistrict');

                    subDistrictSelect.empty();

                    $.each(subDistricts, function(index, subDistrict) {
                        var option = $('<option></option>').attr('value', subDistrict.id).text(subDistrict.name);
                        subDistrictSelect.append(option);
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
