@extends('layout-adopter.main-layout')
@section('title', 'Lengkapi Data Diri')
@include('layout-adopter.navigation')
@section('container')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<form class="form-sample" action="{{ route('adopter.data.update', $adoption->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container text-center" style="padding-top: 190px;">
        <input class="form-control text-center fw-bold" type="text" value="LENGKAPI DATA DIRI" aria-label="Disabled input example" disabled readonly>
        <div class="form-row text-start">
            <div class="form-group col-md-4">
                <label>KTP Lama</label>
                @if ($detailAdopter->ktp_picture)
                <div class="mt-2">
                    <img src="{{ asset($detailAdopter->ktp_picture) }}" alt="Old KTP Picture" class="img-thumbnail" style="width: 150px;">
                </div>
            @endif
            </div>
            <div class="form-group col-md-4">
                <label>Halaman Rumah Lama</label>
                @if ($detailAdopter->picture_home)
                <div class="mt-2">
                    <img src="{{ asset($detailAdopter->picture_home) }}" alt="Old KTP Picture" class="img-thumbnail" style="width: 150px;">
                </div>
            @endif
            </div>
        </div>
    <div class="form-row text-start">
        <div class="form-group col-md-4">
            <label>Foto KTP</label>
            <input type="file" class="form-control @error('ktp_picture') is-invalid @enderror" id="ktp_picture" name="ktp_picture" value="{{ $detailAdopter->ktp_picture }}" placeholder="Enter username">
            @error('ktp_picture')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label>NIK</label>
            <input type="text" class="form-control @error('nik')is-invalid @enderror" id="nik" name="nik" placeholder="NIK" value="{{ $detailAdopter->nik }}">
            @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control @error('full_name')is-invalid @enderror" id="full_name" name="full_name" placeholder="Nama Lengkap" value="{{ $detailAdopter->full_name }}">
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
                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                    <option value="">Pilih jenis kelamin</option>
                    <option value="Male" @if($detailAdopter->gender == 'Male') selected @endif>Laki-laki</option>
                    <option value="Female" @if($detailAdopter->gender == 'Female') selected @endif>Perempuan</option>
                    </select>
                </select>
        </div>
        <div class="form-group col-md-3">
            <label>HP (Aktif WA)</label>
            <input type="text" class="form-control @error('phone')is-invalid @enderror" id="phone" name="phone" value="{{ $detailAdopter->phone }}" placeholder="Nomer Whatsapp Aktif">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label>Foto Halaman Rumah</label>
            <input type="file" class="form-control @error('picture_home') is-invalid @enderror" id="picture_home" name="picture_home" value="{{ $detailAdopter->picture_home }}" placeholder="Enter username">
            @error('picture_home')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control @error('birthday')is-invalid @enderror" value="{{ $detailAdopter->birthday }}" id="birthday" name="birthday">
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
            <input type="text" class="form-control @error('zip_code')is-invalid @enderror" id="zip_code" name="zip_code" value="{{ $detailAdopter->zip_code }}" placeholder="Kode Pos">
            @error('zip_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label>Kabupaten/Kota</label>
            <select class="mt-1 form-select @error('regency_id') is-invalid @enderror" id="regency" name="regency_id">
                <option value="">Select Kabupaten</option>
                @foreach ($regencies as $regency)
                @if (old('regency_id', $detailAdopter->regency_id) == $regency->id)
                        <option value="{{ $regency->id }}" selected>
                            {{ $regency->name }}
                        </option>
                    @else
                        <option value="{{ $regency->id }}">
                            {{ $regency->name }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Kecamatan</label>
            <select class="mt-1 form-select @error('sub_district_id') is-invalid @enderror" id="subDistrict" name="sub_district_id">
                @foreach ($subDistricts as $sub_district)
                @if (old('sub_district_id', $detailAdopter->sub_district_id) == $sub_district->id)
                        <option value="{{ $sub_district->id }}" selected>
                            {{ $sub_district->name }}
                        </option>
                    @else
                        <option value="{{ $sub_district->id }}">
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
        <div class="form-row text-start">
            <div class="form-group col-md-6 text-start">
                <label>Alamat</label>
                    <input type="text" class="form-control @error('street')is-invalid @enderror" id="street" value="{{ $detailAdopter->street }}" name="street" placeholder="Masukkan Alamat Tempat Tinggal">
                    @error('street')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="form-group col-md-6 text-start">
                <label>Lokasi Google Maps</label>
                    <input type="text" class="form-control @error('maps')is-invalid @enderror" id="maps" name="maps" value="{{ $detailAdopter->maps }}" placeholder="Masukkan Alamat Tempat Tinggal">
                    @error('maps')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
        </div>
        <input type="text"  class="form-control @error('message')is-invalid @enderror"  name="message" id="message" value="Data Sedang Diproses Harap Tunggu Paling Lambat 7 Hari" hidden>
        <input type="text"  class="form-control @error('status')is-invalid @enderror"  name="status" id="status" value="Pending" hidden>
        <input type="text"  class="form-control @error('adoption')is-invalid @enderror"  name="adoption" id="message" value="Pending" hidden>
        <input class="form-control text-center fw-bold mt-4" type="text" value="FORM ADOPSI" aria-label="Disabled input example" disabled readonly>

        <div class="form-row text-start">
            <div class="form-group col-md-12 text-start">
                <label for="document">Document</label>
                <input type="file" class="form-control @error('document') is-invalid @enderror" value="{{ $form->document }}" id="document" name="document">
                <input type="hidden" name="old_document" value="{{ $form->document ?? '' }}">
                @error('document')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
            <div class="align-self-start mt-4">
                <button type="submit" class="btn btn-primary btn-sm">Create</button>
                <a href="{{ route('adopter.data.status') }}" class="btn btn-danger btn-sm">Back</a>
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
