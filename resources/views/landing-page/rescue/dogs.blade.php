@extends('landing-page.layout.main-layout')
@section('title', 'Data Hewan')
@include('landing-page.layout.navigation')
@section('container')

<section class="shop spad">
    <div class="container" style="padding-top: 195px;">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="{{ route('landing.rescue.dogs') }}" method="GET">
                            <input type="text" name="name_pets" placeholder="Search..." value="{{ $name ?? '' }}">
                            <button type="submit"><span class="icon_search"><i class="icofont-search-1"></i></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                <li><a href="{{ route('landing.rescue.list') }}" class="nav-link {{ request()->is('landing/rescue/list') ? 'active' : '' }}">Semua Data</a></li>
                                                <li><a href="{{ route('landing.rescue.dogs') }}" class="nav-link {{ request()->is('landing/rescue/dogs') ? 'active' : '' }}">Anjing</a></li>
                                                <li><a href="{{ route('landing.rescue.cats') }}" class="nav-link {{ request()->is('landing/rescue/cats') ? 'active' : '' }}">Kucing</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p class="fw-bold">Daftar Rescue</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($rescues as $rescue)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset($rescue->image) }}" alt="{{ $rescue->image }}">
                            </div>
                            <div class="product__item__text">
                                <h6>Informasi: {{ $rescue->information }}</h6>
                                <div class="rating">
                                    <p>Lokasi Terkhir: <button class="link-button" onclick="location.href='{{ $rescue->location }}'" target="_blank" >Klik disini</button></p>
                                    <p>Hubungi: {{ $rescue->detailRescue->phone }} ({{ $rescue->detailRescue->name_contact }})</p>
                                </div>
                                @include('adopter.rescue.detail-rescue')
                                <a href="#" class="add-cart" data-toggle="modal" data-target="#modal-rescue{{ $rescue->id }}">+ Detail</a>
                                <h5>{{ $rescue->name_pets }}</h5>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No rescue found.</p>
                    @endforelse
                </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $rescues->links('landing-page.layout.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

