@extends('layout-adopter.main-layout')
@section('title', 'Data Hewan')
@include('layout-adopter.navigation')
@section('container')
<div class="container text-center" style="padding-top: 200px;">
    <div class="row">
        <table class="table table-striped table-hover table-bordered"> <!-- Legg til "table-bordered" klassen her -->
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Hewan</th>
                <th scope="col">Foto Hewan</th>
                <th scope="col">Status</th>
                <th scope="col">Pesan</th>
                <th scope="col">More</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @forelse($adoptions as $adoption)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $adoption->animal->name_pets }}</td>
                    <td><img src="{{ asset($adoption->animal->image) }}" alt="{{ $adoption->animal->name_pets }}" style="max-height: 70px;"></td>
                    <td>
                        @if ($adoption->adoption == 'Pending')
                        <span class="badge badge-primary">Pending</span>
                        @elseif ($adoption->adoption == 'Failed')
                        <span class="badge badge-danger">Gagal</span>
                        @elseif ($adoption->adoption == 'Success')
                        <span class="badge badge-success">Berhasil</span>
                        @elseif ($adoption->adoption == 'Error')
                        <span class="badge badge-warning">Pending <div class="mt-2" style="font-size: 10px">
                            (Update Data)</div>
                        </span>
                        @endif
                    </td>
                    <td>{{ $adoption->message }}</td>
                    <td>
                        @if ($adoption->adoption == 'Error')
                        <a href="{{ route('adopter.data.edit', $adoption->id) }}"  class="btn btn-danger btn-sm" style="font-size: 13px; padding: 5px 17px;">Edit</a>
                        @elseif ($adoption->adoption == 'Pending')
                            -
                        @elseif ($adoption->adoption == 'Failed')
                             -
                        @elseif ($adoption->adoption =='Success')
                            -
                        {{-- <a href="#" class="btn btn-success ml-auto" style="font-size: 13px; padding: 5px 17px;">Sertifikat</a> --}}
                        @endif
                    </td>
                </tr>
                @empty
                    <tr>
                        <td class="text-center text-muted" colspan="10">Data tidak tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
