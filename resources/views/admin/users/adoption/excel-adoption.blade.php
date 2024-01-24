<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>

	<table class='table table-bordered'>
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
            </tr>
                <tbody class="text-center">
                    @php $no=1; @endphp
                    @foreach($adopters as $adopter)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td style="width: 50px">@if ($adopter->profile)
                                <img src="{{ public_path('/' .$adopter->profile) }}" alt="{{ $adopter->username }}"class="img-fluid mt-3">
                                @endif
                            </td>
                            <td>{{ $adopter->username }}</td>
                            <td>{{ $adopter->detailAdopter->nik }}</td>
                            <td>{{ $adopter->detailAdopter->full_name }}</td>
                            <td>{{ $adopter->detailAdopter->phone }}</td>
                            <td>
                                @if ($adopter->detailAdopter->gender == 'Female')
                                    Perempuan
                                @else ($adopter->detailAdopter->gender == 'Male')
                                    Laki - Laki
                                @endif
                            </td>
                            <td>{{ $adopter->detailAdopter->zip_code }}</td>
                            <td> {{ $adopter->detailAdopter->regency->name }}</td>
                            <td>{{ $adopter->detailAdopter->subDistrict->name }}</td>
                            <td>{{ $adopter->detailAdopter->street }}</td>
			            </tr>
			        @endforeach
		    </tbody>
	    </table>
    </body>
</html>
