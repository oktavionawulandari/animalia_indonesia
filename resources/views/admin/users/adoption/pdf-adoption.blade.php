
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengadopsi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
        }

        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
        }

        .text-center {
            text-align: center;
        }

        @media print {
            #bulanForm {
                display: none;
            }

    </style>
</head>
<body>
    <div id="dataToPrint">
        <h1>SINTESIA ANIMALIA INDONESIA</h1>
        <h1>Laporan Data Pengadopsi</h1>
            <form id="bulanForm">
                <label for="bulan">Pilih Bulan:</label>
                <select name="bulan" id="bulan">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>

                <label for="tahun">Pilih Tahun:</label>
                <select name="tahun" id="tahun">
                    <!-- Replace the range of years below with your desired range -->
                    @php
                        $startYear = date('Y') - 10;
                        $endYear = date('Y') + 10;
                    @endphp
                    @for ($year = $startYear; $year <= $endYear; $year++)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>

                <button type="button" onclick="getCetakData()">Cetak</button>
            </form>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Profile</th>
                    <th>Username</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Kontak (WA)</th>
                    <th>Jenis Kelamin</th>
                    <th>Kode Pos</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Alamat</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($adopters as $adopter)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ asset($adopter->profile) }}" alt="{{ $adopter->profile }}" style="max-height: 50px"></td>
                        <td>{{ $adopter->username }}</td>
                        <td>{{ $adopter->detailAdopter->nik }}</td>
                        <td>{{ $adopter->detailAdopter->full_name }}</td>
                        <td>{{ $adopter->detailAdopter->phone }}</td>
                        <td>
                            @if ($adopter->detailAdopter->gender == 'Female')
                                Perempuan
                            @else($adopter->detailAdopter->gender == 'Male')
                                Laki - Laki
                            @endif
                        </td>
                        <td>{{ $adopter->detailAdopter->zip_code }}</td>
                        <td> {{ $adopter->detailAdopter->regency->name }}</td>
                        <td>{{ $adopter->detailAdopter->subDistrict->name }}</td>
                        <td>{{ $adopter->detailAdopter->street }}</td>
                        <td>{{ $adopter->form->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function getCetakData() {
            var selectedMonth = document.getElementById('bulan').value;
            var selectedYear = document.getElementById('tahun').value;
            var url = '/cetak-data-pengadopsi?bulan=' + selectedMonth + '&tahun=' + selectedYear;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('dataToPrint').innerHTML = xhr.responseText;

                    setTimeout(function() {
                        window.print();
                    }, 2000);
                }
            };
            xhr.open('GET', url, true);
            xhr.send();
        }
    </script>

</body>
</html>
