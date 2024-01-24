@extends('layout-admin.main-layout')
@section('title', 'Data Account')
@include('.layout-admin.navigation')
@section('container')

<div class="panel-header  bg-dark-gradient">
    <div class="page-inner py-2">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">
                    <i class="fas fa-home"></i>
                    <span class="ms-2">@yield('title')</span>
                </h2>
                <h5 class="text-white op-7 mb-2">Selamat Datang,!</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Export PDF"><i class="icofont-file-pdf" style="color: #ffffff;"></i></a>
                        <a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Export Excel"><i class="icofont-file-excel" style="color: #ffffff;"></i></a>
                        <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Data Trash"><i class="icofont-trash" style="color: #ffffff;"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark table-hover" id="s">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Profile</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Gambar Halaman Rumah</th>
                                    <th>KTP</th>
                                    <th>Kontak (WA)</th>
                                    <th>Formulir</th>
                                    <th>Unduh Formulir</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($adopters as $adopter)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><img src="{{ asset('/' . $adopter->profile) }}" alt="{{ $adopter->profile }}" style="max-height: 70px"></td>
                                    <td>{{ $adopter->username }}</td>
                                    @if ($adopter->detailAdopter)
                                        <td>{{ $adopter->detailAdopter->full_name }}</td>
                                    @else
                                        <td> - </td>
                                    @endif

                                    @if ($adopter->detailAdopter)
                                        <td><img src="{{ asset('/' . $adopter->detailAdopter->picture_home) }}" alt="{{ $adopter->detailAdopter->picture_home }}" style="max-height: 100px"></td>
                                    @else
                                        <td> - </td>
                                    @endif

                                    @if ($adopter->detailAdopter)
                                        <td><img src="{{ asset('/' . $adopter->detailAdopter->ktp_picture) }}" alt="{{ $adopter->detailAdopter->ktp_picture }}" style="max-height: 100px"></td>
                                    @else
                                        <td> - </td>
                                    @endif

                                    @if ($adopter->detailAdopter)
                                        <td>{{ $adopter->detailAdopter->phone }}</td>
                                    @else
                                        <td> - </td>
                                    @endif
                                    <td>
                                        @if($adopter)
                                            @if($adopter->form && $adopter->form->form == 'filled')
                                                <a class="badge badge-success text-white">Sudah Diisi</a>
                                            @elseif($adopter->form && $adopter->form->form == 'Unfilled')
                                                <a class="badge badge-warning text-white">Belum Diisi</a>
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if($adopter && $adopter->form && $adopter->form->form == 'filled')
                                        <a href="{{ route('admin.documents.download', ['id' => $adopter->form->id]) }}" class="btn btn-primary btn-sm"><i class="icofont-download"></i>  Unduh</a>

                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        {{-- @include('admin.animals.modal') --}}
                                        <a href="#" data-toggle="modal" data-target="#readModal" style="color:blue">Read More</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#s').DataTable();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
