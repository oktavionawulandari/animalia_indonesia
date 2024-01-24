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
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Kontak (WA)</th>
                <th>Foto Hewan</th>
                <th>Nama Hewan</th>
                <th>Kategori Hewan</th>
                <th>History Adopsi</th>
            </tr>
                <tbody class="text-center">
                    @php $no=1; @endphp
                    @foreach($adoptions as $adopter)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td style="width: 50px">@if ($adopter->detailAdopter->adopter->profile)
                                <img src="{{ public_path('/' .$adopter->detailAdopter->adopter->profile) }}" alt="{{ $adopter->detailAdopter->adopter->profile }}"class="img-fluid mt-3">
                                @endif
                            </td>
                            <td>{{ $adopter->detailAdopter->adopter->username }}</td>
                            <td>{{ $adopter->detailAdopter->full_name }}</td>
                            <td>{{ $adopter->detailAdopter->nik }}</td>
                            <td>{{ $adopter->detailAdopter->street }}</td>
                            <td>{{ $adopter->detailAdopter->phone }}</td>
                            <td style="width: 50px">@if ($adopter->animal->image)
                                <img src="{{ public_path('/' .$adopter->animal->image) }}" alt="{{ $adopter->animal->image }}"class="img-fluid mt-3">
                                @endif
                            </td>
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
    </body>
</html>
