@extends('layout-admin.main-layout')
@section('title', 'Dashboard')
@include('Layout-admin.navigation')
@section('container')
<div class="panel-header bg-danger-gradient">
    <div class="page-inner py-5">
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
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center bubble-shadow-small" style="color: #fff; background-color: #FF0000">
                                <i class="icofont-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category text-dark">Total Adopter</p>
                                <h4 class="card-title">{{ $totalAdopters }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="icofont-cat-dog"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category text-dark">Total Hewan</p>
                                <h4 class="card-title">{{ $totalAnimals }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="icofont-ui-love-add"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category text-dark">Total Rescue</p>
                                <h4 class="card-title">{{ $totalRescues }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="icofont-search-user"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category text-dark">Total Adopsi</p>
                                <h4 class="card-title">{{ $totalAdoption }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="icofont-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category text-dark">Total Account</p>
                                <h4 class="card-title">{{ $totalAccount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-warning bubble-shadow-small">
                                <i class="icofont-user"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category text-dark">Total Admin</p>
                                <h4 class="card-title">{{ $totalAdmin }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-card-no-pd text-center">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="mb-2 fw-bold">Total Adopsi</div>
                    <div class="row">
                        <div class="col-6">
                            <p class="card-category">Berhasil</p>
                            <h4 class="card-title">{{ $totalSuccess }}</h4>
                        </div>
                        <div class="col-6">
                            <h5 class="card-category">Gagal</h5>
                            <h4 class="card-title">{{ $totalFailed }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="mb-2 fw-bold">Total Adopsi</div>
                    <div class="row">
                        <div class="col-6">
                            <p class="card-category">Update</p>
                            <h4 class="card-title">{{ $totalError }}</h4>
                        </div>
                        <div class="col-6">
                            <h5 class="card-category">Pending</h5>
                            <h4 class="card-title">{{ $totalPending }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="mb-2 fw-bold">Total Rescue</div>
                    <div class="row text-center">
                        <div class="col-6">
                            <p class="card-category">Anjing</p>
                            <h4 class="card-title">{{ $totalDogs }}</h4>
                        </div>
                        <div class="col-6">
                            <h5 class="card-category">Kucing</h5>
                            <h4 class="card-title">{{ $totalCats }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="mb-2 fw-bold">Total Hewan</div>
                    <div class="row">
                        <div class="col-6">
                            <p class="card-category">Anjing</p>
                            <h4 class="card-title">{{ $totalDogsAnimal }}</h4>
                        </div>
                        <div class="col-6">
                            <h5 class="card-category">Kucing</h5>
                            <h4 class="card-title">{{ $totalCatsAnimal }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Chart Registrasi</div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Chart Adopsi</div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="multipleBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

@endsection
