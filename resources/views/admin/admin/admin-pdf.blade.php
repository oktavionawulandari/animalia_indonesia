<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pengadopsi</title>
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
    </style>
</head>
<body>
    <h1>Laporan Data Pengadopsi</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Profile</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>level</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($admin as $adm)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td><img src="{{ asset($adm->profile) }}" alt="{{ $adm->profile }}"
                        style="max-height: 70px"></td>
                    <td>{{ $adm->username }}</td>
                    <td>{{ $adm->name }}</td>
                    <td>{{ $adm->gender }}</td>
                    <td>{{ $adm->level }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

<script type="text/javascript">
    window.print();
        </script>
</body>
</html>
