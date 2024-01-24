@extends('layout-admin.main-layout')
@section('title', 'Validasi Adopsi')
@include('layout-admin.navigation')

@section('container')
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

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Data Validasi</h4>
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
                                    <th>NIK</th>
                                    <th>Nama Adopter</th>
                                    <th>Formulir Adopsi</th>
                                    <th>Foto Hewan</th>
                                    <th>Nama Hewan</th>
                                    <th>Status Hewan</th>
                                    <th>Validate</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($adoptions as $validation)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        @if ($validation->adopter && $validation->adopter->detailAdopter)
                                            {{ $validation->adopter->detailAdopter->nik }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($validation->adopter && $validation->adopter->detailAdopter)
                                            {{ $validation->adopter->detailAdopter->full_name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($validation->adopter && $validation->adopter && $validation->adopter->form && $validation->adopter->form->form == 'filled')
                                            <a class="badge badge-success text-white">Sudah Diisi</a>
                                        @elseif($validation->adopter && $validation->adopter->detailAdopter && $validation->adopter->detailAdopter->form && $validation->adopter->detailAdopter->form->form == 'Unfilled')
                                            <a class="badge badge-warning text-white">Belum Diisi</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($validation->animal)
                                            <img src="{{ asset($validation->animal->image) }}" alt="{{ $validation->animal->name_pets }}" style="max-height: 70px">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($validation->animal)
                                            {{ $validation->animal->name_pets }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($validation->animal->status == 'Pending')
                                            <a class="badge badge-info text-white">Pending</a>
                                        @elseif($validation->animal->status == 'Failed')
                                            <a class="badge badge-danger text-white">Gagal</a>
                                        @elseif($validation->animal->status == 'Success')
                                            <a class="badge badge-success text-white">Berhasil</a>
                                        @elseif($validation->animal->status == 'Error')
                                            <a class="badge badge-warning text-white">Data Tidak Valid</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <form action="{{ route('validation.success', $validation->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-xs me-4">Terima</button>
                                            </form>
                                            <form action="{{ route('validation.failed', $validation->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-xs">Tolak</button>
                                            </form>
                                            <div>
                                                @include('admin.users.adoption.error-modal')
                                                <a href="#" data-toggle="modal" data-target="#showModalError" class="btn btn-warning btn-xs">Update Data</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @include('admin.users.adoption.detail-validation')
                                        <a href="#" data-toggle="modal" data-target="#showModalValidation{{ $validation->id }}" class="badge badge-info">Show Details</a>
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
