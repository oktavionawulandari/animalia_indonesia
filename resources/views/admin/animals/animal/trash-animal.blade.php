@extends('layout-admin.main-layout')
@section('title', 'Data Hewan Adopsi')
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
@if (session('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger mt-3" role="alert">
    {{ session('error') }}
</div>
@endif
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Trash Data Hewan</h4>
                        <div class="card-tools">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('animals.list') }}" id="pills-trash">Back</a>
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
                                    <th>Umur Hewan</th>
                                    <th>Kategori</th>
                                    <th>Jenis Kelamin</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @forelse($animals as $animal)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><img src="{{ asset($animal->image) }}" alt="{{ $animal->name_pets }}" style="max-height: 70px"></td>
                                    <td>{{ $animal->name_pets }}</td>
                                    <td>{{ $animal->age }}</td>
                                    <td>{{ $animal->category }}</td>
                                    <td>
                                        @if ($animal->gender == 'Female')
                                            Betina
                                        @else
                                            Jantan
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                             <form method="POST" action="{{ route('animals.restore', $animal->id) }}"
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


