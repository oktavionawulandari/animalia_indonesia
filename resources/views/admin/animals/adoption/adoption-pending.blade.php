@extends('layout-admin.main-layout')
@section('title', 'Adopsi Pending')
@include('layout-admin.navigation')
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
                        <h4 class="card-title">Data Adopsi Pending</h4>
                        <div class="card-tools">
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
                                    <th>Nama Adopter</th>
                                    <th>Formulir Adopsi</th>
                                    <th>Foto Hewan</th>
                                    <th>Nama Hewan</th>
                                    <th>Kategori Hewan</th>
                                    <th>Status Hewan</th>
                                    <td>Detail</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($adoptions as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        @if ($data->adopter)
                                        <img src="{{ asset($data->adopter->profile) }}" alt="{{ $data->adopter->username }}" style="max-height: 50px">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->detailAdopter)
                                            {{ $data->detailAdopter->full_name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($data && $data->form && $data->form->form == 'filled')
                                            <a class="badge badge-success text-white">Sudah Diisi</a>
                                        @elseif($data && $data->form && $data->form->form == 'Unfilled')
                                            <a class="badge badge-warning text-white">Belum Diisi</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->animal)
                                            <img src="{{ asset($data->animal->image) }}" alt="{{ $data->animal->name_pets }}" style="max-height: 70px">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->adopter)
                                            {{ $data->animal->name_pets }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->adopter)
                                            {{ $data->animal->category }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->adoption == 'Pending')
                                            <a class="badge badge-info text-white">Pending</a>
                                        @elseif($data->adoption == 'Failed')
                                            <a class="badge badge-danger text-white">Gagal</a>
                                        @elseif($data->adoption == 'Success')
                                            <a class="badge badge-success text-white">Berhasil</a>
                                        @endif
                                    </td>
                                    <td>
                                        @include('admin.animals.adoption.detail-data')
                                        <a href="#" data-toggle="modal" data-target="#showModalData{{ $data->id }}" class="badge badge-info">Show Details</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <script>
                                $(document).ready(function() {
                                    $('#basic-datatables').DataTable();
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


