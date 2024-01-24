@extends('layout-admin.main-layout')
@section('title', 'Data Admin')
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
                <a href="{{ route('create.admin.account') }}" class="btn btn-light btn-round text-danger">
                    <i class="icofont-ui-add" style="margin-right: 5px;"></i>
                    Add Admin
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
                        <h4 class="card-title">Data Trash Admin</h4>
                        <div class="card-tools">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm">
                                <li class="nav-item {{ request()->is('data/admin') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.account') }}" id="pills-trash">Back</a>
                                </li>
                            </ul>
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
                                            <form method="POST" action="{{ route('admin.restore', $adm->id) }}"
                                                onclick="return confirm('Apakah anda yakin mengembalikan data ini?')">
                                                @csrf
                                                @method('POST')
                                                 <button type="submit" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-link btn-danger" data-original-title="Restore">
                                                    <i class="icofont-loop"></i>
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
