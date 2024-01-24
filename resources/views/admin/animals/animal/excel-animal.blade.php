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
                <th>Image</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Category</th>
                <th>Ras</th>
                <th>Vaccine</th>
                <th>Information</th>
                <th>Description</th>
            </tr>
                <tbody class="text-center">
                    @php $no=1; @endphp
                    @foreach($animals as $animal)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td style="width: 50px">@if ($animal->image)
                                <img src="{{ public_path('/' .$animal->image) }}" alt="{{ $animal->image }}"class="img-fluid mt-3">
                                @endif
                            </td>
                            <td>{{ $animal->name_pets }}</td>
                            <td>{{ $animal->age }}</td>
                            <td>{{ $animal->gender }}</td>
                            <td>{{ $animal->category }}</td>
                            <td>{{ $animal->ras }}</td>
                            <td>{{ $animal->vaccine }}</td>
                            <td>{{ $animal->information }}</td>
                            <td>{{ $animal->description }}</td>
			            </tr>
			        @endforeach
		    </tbody>
	    </table>
    </body>
</html>
