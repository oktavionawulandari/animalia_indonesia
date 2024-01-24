@extends('layout-admin.main-layout')
@section('title', 'Data Admin')
@include('.layout-admin.navigation')
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
                <a href="{{ route('create.admin.account') }}" class="btn btn-light btn-round text-danger">
                    <i class="icofont-ui-add" style="margin-right: 5px;"></i>
                    Tambah Admin
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
                        <h4 class="card-title">Data Admin</h4>
                        <div class="card-tools">
                            <a href="{{ route('admin.trash') }}" data-placement="top" title="Trash" data-original-title="Trash Data" class="btn btn-secondary btn-sm mr-2"><i class="icofont-trash text-white"></i></a>
                            <a href="{{ route('admin.pdf') }}" target="_blank" data-placement="top" title="PDF" data-original-title="PDF" class="btn btn-secondary btn-sm"><i class="icofont-print text-white"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Profile</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @forelse($admin as $adm)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><img src="{{ asset($adm->profile) }}" alt="{{ $adm->profile }}"
                                        style="max-height: 70px"></td>
                                    <td>{{ $adm->username }}</td>
                                    <td>{{ $adm->name }}</td>
                                    <td>{{ $adm->gender }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('edit.admin.account', $adm->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.delete', $adm->id) }}"
                                                onclick="return confirm('Apakah Anda yakin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="icofont-ui-delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-muted" colspan="10">Data tidak tersedia</td>
                                </tr>
                                @endforelse
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
