@extends('layout-adopter.main-layout')
@section('title', 'Data Hewan')
@include('layout-adopter.navigation')
@section('container')
<style>
.modal-confirm {
	color: #434e65;
	/* width: 525px; */
    width: 400px;
    height: 105px;
}
.modal-confirm .modal-content {
	padding: 20px;
	font-size: 13px;
	border-radius: 5px;
	border: none;
}
.modal-confirm .modal-header {
	background: #47c9a2;
	border-bottom: none;
	position: relative;
	text-align: center;
	margin: -20px -20px 0;
	border-radius: 5px 5px 0 0;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 20px;
	margin: 10px 0;
}
.modal-confirm .form-control, .modal-confirm .btn {
	min-height: 40px;
	border-radius: 3px;
}
.modal-confirm .close {
	position: absolute;
	top: 15px;
	right: 15px;
	color: #fff;
	text-shadow: none;
	opacity: 0.5;
}
.modal-confirm .close:hover {
	opacity: 0.8;
}
.modal-confirm .icon-box {
	color: #fff;
	width: 70px;
	height: 70px;
	display: inline-block;
	border-radius: 50%;
	z-index: 9;
	padding: 15px;
	text-align: center;
}
.modal-confirm .icon-box i {
	font-size: 64px;
	margin: -4px 0 0 -4px;
}
.modal-confirm.modal-dialog {
	margin-top: 80px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background:  #45ed7d  !important;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border-radius: 20px;
	margin-top: 10px;
	padding: 6px 20px;
	border: none;
}
.modal-confirm .btn:hover, .modal-confirm .btn:focus {
	background: #a2fcc0 !important;
	outline: none;
}
.modal-confirm .btn span {
	margin: 1px 3px 0;
	float: left;
}
.modal-confirm .btn i {
	margin-left: 1px;
	font-size: 15px;
	float: right;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}

</style>
<section class="shop spad">
    <div class="container" style="padding-top: 195px;">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="{{ route('adopter.data.dogs') }}" method="GET">
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
                                                <li><a href="{{ route('adopter.data.animal') }}" class="nav-link {{ request()->is('list/animal/adoption') ? 'active' : '' }}">Semua Data</a></li>
                                                <li><a href="{{ route('adopter.data.dogs') }}" class="nav-link {{ request()->is('list/animal/dogs') ? 'active' : '' }}">Anjing</a></li>
                                                <li><a href="{{ route('adopter.data.cats') }}" class="nav-link {{ request()->is('list/animal/cats') ? 'active' : '' }}">Kucing</a></li>
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
                                <p class="fw-bold">Daftar Hewan Adopsi</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($animals as $animal)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset($animal->image) }}" alt="{{ $animal->image }}">
                                <ul class="product__hover">
                                    @include('adopter.adoption.detail-adoption')
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#detailsModal{{ $animal->id }}">
                                            <i class="icofont-ui-search" style="background-color: white; padding: 5px;"></i>
                                            <span>Details</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $animal->description }}</h6>
                                <!-- Button trigger modal -->
                                <a href="#" class="add-cart" data-toggle="modal" data-target="#adoptionModal{{$animal->id}}">
                                    + Adoption Now
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="adoptionModal{{$animal->id}}" tabindex="-1" aria-labelledby="adoptionModalLabel{{$animal->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title fw-bold" id="adoptionModalLabel{{$animal->id}}">Konfirmasi Adopsi</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <!-- Isi formulir adopsi di sini -->
                                          <p style="font-size: 13px; color:#000;">Anda akan mengajukan adopsi untuk hewan ini. Lanjutkan?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <form action="{{ route('update.adoption.status', ['id' => $animal->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary" style="font-size:15px;">Ajukan Adopsi</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <h5>{{ $animal->name_pets }}</h5>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No animals found.</p>
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {{ $animals->links('layout-adopter.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
