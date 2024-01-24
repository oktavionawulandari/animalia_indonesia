<!DOCTYPE html>
<html>
    <head>
        <style>
            .img1 {
              float: right;
              width: 90px;
              height: auto;
              border-radius: 50%;
            }

            .clearfix::after {
              content: "";
              clear: both;
              display: table;
            }

            .image {
                width: 150px;
                height: auto;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <img class="img1" src="{{ public_path('/' . $adopter->profile) }}" alt="{{ $adopter->username }}">
            <a>Sintesia Animalia Indonesia<a>
            <h1><strong>DATA DIRI PENGADOPSI</strong></h1>
            <hr>
        </div>

        <div class="section">
            <p><strong>Username:</strong> {{ $adopter->username }}</p>
            <p><strong>Email:</strong> {{ $adopter->email }}</p>
            <p><strong>NIK:</strong> {{ $adopter->detailAdopter->nik }}</p>
            <p><strong>Nama Lengkap:</strong> {{ $adopter->detailAdopter->full_name }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $adopter->detailAdopter->gender }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $adopter->detailAdopter->birthday }}</p>
            <p><strong>HP:</strong> {{ $adopter->detailAdopter->phone }}</p>
            <p><strong>Kode Pos:</strong> {{ $adopter->detailAdopter->zip_code }}</p>
            <p><strong>Kabupaten:</strong> {{ $adopter->detailAdopter->regency->name }}</p>
            <p><strong>Kecamatan:</strong> {{ $adopter->detailAdopter->subDistrict->name }}</p>
            <p><strong>Alamat:</strong> {{ $adopter->detailAdopter->street }}</p>
            <p><strong>Maps:</strong> {{ $adopter->detailAdopter->maps }}</p>
        </div>
    </body>

</html>
