@extends('layout-admin.main-layout')
@section('title', 'Data Pengadopsi')
@include('.layout-admin.navigation')
@section('container')
<style>
    .card-header .nav-item a {
        transition: background-color 0.3s ease;
      }

      .card-header .nav-item a:hover {
        background-color: #6861CE;
        color: #fff;
      }

      .card-header .nav-item a:active {
        background-color: #6861CE;
      }
</style>

<div class="panel-header bg-danger-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">
                    <i class="fas fa-home"></i>
                    <span class="ms-2">@yield('title')</span>
                </h2>
                <h5 class="text-white op-7 mb-2">Selamat Datang, {{ Auth::guard('admin')->user()->username }}!</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
            </div>
        </div>
    </div>
</div>

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Data Pengadopsi</h4>
                        <div class="card-tools">
                            <a href="{{ route('cetak.pdf.data') }}"  target="_blank"  data-placement="top" title="Cetak PDF" data-original-title="Cetak PDF" class="btn btn-secondary btn-sm"><i class="icofont-print text-white"></i></a>
                            <a href="{{ route('adoption.data.excel') }}"  target="_blank" data-placement="top" title="Cetak Excel" data-original-title="Cetak Excel" class="btn btn-secondary btn-sm"><i class="icofont-file-document text-white"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr class="text-center">
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
                                    <th>More</th>
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
                                        <td><img src="{{ asset('/' . $adopter->detailAdopter->picture_home) }}" alt="{{ $adopter->detailAdopter->picture_home }}" style="max-height: 70px"></td>
                                    @else
                                        <td> - </td>
                                    @endif

                                    @if ($adopter->detailAdopter)
                                        <td><img src="{{ asset('/' . $adopter->detailAdopter->ktp_picture) }}" alt="{{ $adopter->detailAdopter->ktp_picture }}" style="max-height: 70px"></td>
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
                                    @if($adopter->detailAdopter)
                                        @include('admin.users.adoption.detail-adoption')
                                        <a href="#" data-toggle="modal" data-target="#showModalAdoption{{ $adopter->id }}" class="badge badge-info">Show Details</a>
                                    @else
                                        -
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('adopter.print', ['id' => $adopter->id]) }}" class="btn btn-primary btn-sm"><i class="icofont-download"></i>  Cetak Data</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <script>
                               $(document).ready(function() {
                                    $('#basic-datatables').DataTable({
                                        scrollX: true,
                                        scrollY: '500px',
                                        scrollCollapse: true,
                                        paging: true,
                                    });
                                });
                            </script>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


