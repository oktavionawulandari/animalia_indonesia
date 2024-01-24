@extends('layout-admin.main-layout')
@section('title', 'Data Rescue')
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
                <a href="{{ route('rescue.create') }}" class="btn btn-light btn-round text-danger">
                    <i class="icofont-ui-add" style="margin-right: 5px;"></i>
                    Tambah Hewan
                </a>
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
                        <h4 class="card-title">Data Anjing</h4>
                        <div class="card-tools">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm">
                                <li class="nav-item {{ request()->is('rescue') ? 'active' : '' }}">
                                  <a class="nav-link" href="{{ route('rescue.list') }}" id="pills-trash">Back</a>
                                </li>
                              </ul>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Hewan</th>
                                    <th>Kategori</th>
                                    <th>Nama Kontak</th>
                                    <th>Kontak (WA)</th>
                                    <th>Show Detail</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @forelse($rescues as $rescue)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><img src="{{ asset($rescue->image) }}" alt="{{ $rescue->name_pets }}" style="max-height: 50px"></td>
                                    <td>{{ $rescue->name_pets }}</td>
                                    <td>{{ $rescue->category }}</td>
                                    <td>{{ $rescue->detailRescue->name_contact }}</td>
                                    <td>{{ $rescue->detailRescue->phone }}</td>
                                    <td>
                                        @include('admin.animals.rescue.details-rescue')
                                        <a href="#" data-toggle="modal" data-target="#showModal{{ $rescue->id }}" class="badge badge-info">Show Details</a>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('rescue.edit', $rescue->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="icofont-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('rescue.delete', $rescue->id) }}"
                                                onclick="return confirm('Apakah Anda yakin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="icofont-ui-delete"></i>
                                                </button>
                                            </form>
                                        </div>
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
            </div>
        </div>
    </div>
</div>

@endsection
