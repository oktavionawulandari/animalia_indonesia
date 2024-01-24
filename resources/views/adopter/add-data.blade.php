@extends('layout-adopter.main-layout')
@section('title', 'Lengkapi Data Diri')
@include('layout-adopter.navigation')
@section('container')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<form class="form-sample" action="{{ route('store.data.adopter') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="container text-center"  style="padding-top: 190px;">
    <input class="form-control text-center fw-bold" type="text" value="LENGKAPI DATA DIRI" aria-label="Disabled input example" disabled readonly>
    <div class="form-row mt-3 text-start">
        <div class="form-group col-md-3">
            <label>Foto KTP</label>
            <input type="file" id="ktp_picture" class="form-control @error('ktp_picture')is-invalid @enderror" name="ktp_picture" value="{{ old('ktp_picture') }}" placeholder="image">
            @error('ktp_picture')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label>NIK</label>
            <input type="text" class="form-control @error('nik')is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" placeholder="NIK">
            @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control @error('full_name')is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="Nama Lengkap">
            @error('full_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="form-row text-start">
        <div class="form-group col-md-3">
            <label>Jenis Kelamin</label>
            <div>
                <select class="form-control @error('gender')is-invalid @enderror" name="gender" id="gender" value="{{ old('gender') }}" required>
                    <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </select>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>HP (Aktif WA)</label>
            <input type="text" class="form-control @error('phone')is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Nomer Whatsapp Aktif">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label>Foto Halaman Rumah</label>
            <input type="file" class="form-control @error('picture_home')is-invalid @enderror" id="picture_home" value="{{ old('picture_home') }}" name="picture_home">
            @error('picture_home')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control @error('birthday')is-invalid @enderror" max="{{ date('Y-m-d', strtotime('-18 years')) }}" id="birthday" name="birthday">
            @error('birthday')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <input class="form-control text-center fw-bold mt-4" type="text" value="LOKASI TEMPAT TINGGAL" aria-label="Disabled input example" disabled readonly>

    <div class="form-row text-start mt-3">
        <div class="form-group col-md-4">
            <label>Kode Pos</label>
            <input type="text" class="form-control @error('zip_code')is-invalid @enderror" id="zip_code"  value="{{ old('zip_code') }}" name="zip_code" placeholder="Kode Pos">
            @error('zip_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label>Kabupaten/Kota</label>
            <div>
                <select name="regency_id" id="regency_id" class="mt-1 form-select @error('regency_id')is-invalid @enderror" value="{{ old('regency_id') }}" required>
                    <option value="">Select Regency</option>
                    @foreach ($regencies as $regency)
                        <option value="{{ $regency->id }}">{{$regency->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="form-group col-md-4">
                <label>Kecamatan</label>
                    <div>
                        <select class="mt-1 form-select @error('sub_district_id') is-invalid @enderror"name="sub_district_id" value="{{ old('sub_district_id') }}" id="sub_district_id" required>
                            <option value="">Select Sub-District</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row text-start">
                <div class="form-group col-md-6 text-start">
                    <label>Alamat</label>
                    <input type="text" class="form-control @error('street')is-invalid @enderror"  value="{{ old('street') }}"  id="street" name="street" placeholder="Masukkan Alamat Tempat Tinggal">
                    @error('street')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 text-start">
                    <label>Lokasi Google Maps</label>
                    <input type="text" class="form-control @error('maps')is-invalid @enderror" id="maps" name="maps" value="{{ old('maps') }}"  placeholder="Masukkan Alamat Tempat Tinggal">
                    @error('maps')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="align-self-start mt-4">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                <a href="{{ route('dashboard.adopter') }}" class="btn btn-danger btn-sm">Back</a>
            </div>
    </div>
</form>
<script>
    $(document).ready
    (function() { $('#regency_id').change(function() {
        var regencyId = $(this).val();
        if (regencyId) {
            $.ajax({
                url: '{{ route('adopter.sub-districts') }}',
                type: 'POST',
                data: { regency_id: regencyId,_token: '{{ csrf_token() }}'},
                success: function(response) {
                    if (response) {
                        $('#sub_district_id').empty();
                        $.each(response, function(key, value) {
                            $('#sub_district_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#sub_district_id').empty();
                    }
                }
            });
        } else {
            $('#sub_district_id').empty();
        }
    });
});
</script>
@endsection

{{-- <!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <h1>Create User</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-sample" action="{{ route('store.data.adopter') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nik">NIK:</label>
            <input type="text" name="nik" id="nik" value="{{ old('nik') }}" required>
        </div>

        <div>
            <label for="ktp">KTP:</label>
            <input type="file" name="ktp" id="ktp">
        </div>

        <div>
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" required>
        </div>

        <div>
            <label for="zip_code">Zip Code:</label>
            <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" required>
        </div>

        <div>
            <label for="street">Street:</label>
            <input type="text" name="street" id="street" value="{{ old('street') }}" required>
        </div>

        <div>
            <label for="regency_id">Regency:</label>
            <select name="regency_id" id="regency_id" required>
                <option value="">Select Regency</option>
                @foreach ($regencies as $regency)
                    <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="sub_district_id">Sub-District:</label>
            <select name="sub_district_id" id="sub_district_id" required>
                <option value="">Select Sub-District</option>
            </select>
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
        </div>

        <div>
            <label for="picture_home">Picture of Home:</label>
            <input type="file" name="picture_home" id="picture_home">
        </div>

        <div>
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div>
            <label for="maps">Maps:</label>
            <input type="text" name="maps" id="maps" value="{{ old('maps') }}" required>
        </div>

        <button type="submit">Create</button>
    </form>

    <script>
        $(document).ready
        (function() { $('#regency_id').change(function() {
            var regencyId = $(this).val();
            if (regencyId) {
                $.ajax({
                    url: '{{ route('adopter.sub-districts') }}',
                    type: 'POST',
                    data: { regency_id: regencyId,_token: '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response) {
                            $('#sub_district_id').empty();
                            $.each(response, function(key, value) {
                                $('#sub_district_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        } else {
                            $('#sub_district_id').empty();
                        }
                    }
                });
            } else {
                $('#sub_district_id').empty();
            }
        });
    });
    </script>

</body>
</html>
 --}}
