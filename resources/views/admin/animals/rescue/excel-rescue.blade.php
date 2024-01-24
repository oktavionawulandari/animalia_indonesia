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
                <th>Foto</th>
                <th>Nama Hewan</th>
                <th>Umur Hewan</th>
                <th>Jenis Kelamin</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Informasi</th>
                <th>Nama Kontak</th>
                <th>Kontak (WA)</th>
            </tr>
                <tbody class="text-center">
                    @php $no=1; @endphp
                    @foreach($rescues as $rescue)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td style="width: 50px">@if ($rescue->image)
                                <img src="{{ public_path('/' .$rescue->image) }}" alt="{{ $rescue->image }}"class="img-fluid mt-3">
                                @endif
                            </td>
                            <td>{{ $rescue->name_pets }}</td>
                            <td>{{ $rescue->age }}</td>
                            <td>{{ $rescue->gender }}</td>
                            <td>{{ $rescue->category }}</td>
                            <td>{{ $rescue->location }}</td>
                            <td>{{ $rescue->information }}</td>
                            <td>{{ $rescue->detailRescue->name_contact }}</td>
                            <td>{{ $rescue->detailRescue->phone }}</td>
			            </tr>
			        @endforeach
		    </tbody>
	    </table>
    </body>
</html>
