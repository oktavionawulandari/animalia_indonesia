<!DOCTYPE html>
<html>
<head>
    <title>Laporan Riwayat Adopsi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20pt;
        }

        table {
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
        <h1>Laporan Riwayat Adopsi</h1>

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
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Kontak (WA)</th>
                        <th>Foto Hewan</th>
                        <th>Nama Hewan</th>
                        <th>Kategori Hewan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($adoptions as $adopter)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><img src="{{ asset($adopter->adopter->profile) }}" alt="{{ $adopter->adopter->profile }}" style="max-height: 50px"></td>
                            <td>{{ $adopter->adopter->username }}</td>
                            <td>{{ $adopter->adopter->detailAdopter->full_name }}</td>
                            <td>{{ $adopter->adopter->detailAdopter->nik }}</td>
                            <td>{{ $adopter->adopter->detailAdopter->street }}</td>
                            <td>{{ $adopter->adopter->detailAdopter->phone }}</td>
                            <td><img src="{{ asset($adopter->animal->image) }}" alt="{{ $adopter->animal->image }}" style="max-height: 50px"></td>
                            <td>{{ $adopter->animal->name_pets }}</td>
                            <td>{{ $adopter->animal->category }}</td>
                            <td>
                                @if($adopter->adoption == 'Success')
                                    Berhasil Diadopsi
                                @elseif ($adopter->adoption == 'Failed')
                                    Gagal Diadopsi
                                @elseif ($adopter->adoption == 'Pending')
                                    Pending
                                @elseif ($adopter->adoption == 'Error')
                                        Perbaiki Data
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    <script>
        function getCetakData() {
            var selectedMonth = document.getElementById('bulan').value;
            var selectedYear = document.getElementById('tahun').value;
            var url = '/history-pdf?bulan=' + selectedMonth + '&tahun=' + selectedYear;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('dataToPrint').innerHTML = xhr.responseText;

                    setTimeout(function() {
                        window.print();
                    }, 3000);
                }
            };
            xhr.open('GET', url, true);
            xhr.send();
        }
    </script>
</body>
</html>
