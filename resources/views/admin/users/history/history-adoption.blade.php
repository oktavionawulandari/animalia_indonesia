@extends('layout-admin.main-layout')
@section('title', 'Riwayat Adopsi')
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
                        <h4 class="card-title">Riwayat Adopsi</h4>
                        <div class="card-tools">
                            <a href="{{ route('admin.history.pdf.adoption') }}"  target="_blank"  data-placement="top" title="Cetak Data" data-original-title="Cetak Data" class="btn btn-secondary btn-sm"><i class="icofont-print text-white"></i></a>
                            <a href="{{ route('admin.history.excel.adoption') }}"  target="_blank" data-placement="top" title="Cetak Excel" data-original-title="Cetak Excel" class="btn btn-secondary btn-sm"><i class="icofont-file-document text-white"></i></a>
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
                                    <th>Foto Hewan</th>
                                    <th>Nama Hewan</th>
                                    <th>Kategori Hewan</th>
                                    <th>Status Adopsi</th>
                                    <th>Kontak (WA)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($adoptions as $adopt)
                                <tr>
                                    <td>{{ $no++ }}</td>

                                    <td><img src="{{ asset('/' . $adopt->adopter->profile) }}" alt="{{ $adopt->adopter->profile }}" style="max-height: 70px"></td>

                                    <td>{{ $adopt->adopter->username }}</td>

                                    @if ($adopt->adopter->detailAdopter)
                                        <td>{{ $adopt->adopter->detailAdopter->full_name }}</td>
                                    @else
                                        <td> - </td>
                                    @endif

                                    <td><img src="{{ asset('/' . $adopt->animal->image) }}" alt="{{ $adopt->animal->name_pets }}" style="max-height: 70px"></td>

                                    @if ($adopt->animal)
                                        <td>{{ $adopt->animal->name_pets }}</td>
                                    @else
                                        <td> - </td>
                                    @endif

                                    @if ($adopt->animal)
                                        <td>{{ $adopt->animal->category }}</td>
                                    @else
                                        <td> - </td>
                                    @endif

                                    <td>
                                        @if ($adopt->adoption == 'Success')
                                            <span class="badge badge-success">Berhasil Diadopsi</span>
                                        @elseif ($adopt->adoption == 'Failed')
                                            <span class="badge badge-danger">Gagal Diadopsi</span>
                                        @elseif ($adopt->adoption == 'Pending')
                                            <span class="badge badge-primary">Pending</span>
                                        @elseif ($adopt->adoption == 'Error')
                                            <span class="badge badge-warning">Perbaiki Data</span>
                                        @endif
                                    </td>
                                    <td>
                                    @if ($adopt->adopter->detailAdopter)
                                        {{ $adopt->adopter->detailAdopter->phone }}
                                    @else
                                        -
                                    @endif
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


