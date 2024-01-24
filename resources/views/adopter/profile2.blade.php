@extends('layout-adopter.main-layout')
@section('title', 'Data Hewan')
@include('layout-adopter.navigation')
@section('container')

<style>
    body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
</style>
<div class="container py-5">
    <div class="row" style="padding-top: 150px;">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <img src="{{ asset($adopter->profile) }}" alt="{{ $adopter->profile }}">
                        </div>
                        <h5 class="user-name">{{ $adopter->username }}</h5>
                        <h6 class="user-email">yuki@Maxwell.com</h6>
                    </div>
                    <div class="about">
                        <h5>About</h5>
                        <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Data Account</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Username</label>
                            <input type="text" class="form-control" id="fullName" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="eMail">Email</label>
                            <input type="email" class="form-control" id="eMail" placeholder="Enter email ID">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="website">Website URL</label>
                            <input type="url" class="form-control" id="website" placeholder="Website url">
                        </div>
                    </div>
                </div>
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mt-3 mb-2 text-primary">Address</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="Street">Street</label>
                            <input type="name" class="form-control" id="Street" placeholder="Enter Street">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="ciTy">City</label>
                            <input type="name" class="form-control" id="ciTy" placeholder="Enter City">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="sTate">State</label>
                            <input type="text" class="form-control" id="sTate" placeholder="Enter State">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="zIp">Zip Code</label>
                            <input type="text" class="form-control" id="zIp" placeholder="Zip Code">
                        </div>
                    </div>
                </div>
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                            <button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    {{-- <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="{{ asset($adopter->profile) }}" alt="{{ $adopter->profile }}" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                    <h5 class="my-3">{{ $adopter->username }}</h5>
                    <div class="mb-3">
                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                      </div>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-danger">Edit Profile</button>
                    </div>
                </div>
            </div>
            <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fas fa-globe fa-lg text-warning"></i>
                            <p class="mb-0">https://mdbootstrap.com</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                            <p class="mb-0">mdbootstrap</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                            <p class="mb-0">@mdbootstrap</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                            <p class="mb-0">mdbootstrap</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                            <p class="mb-0">mdbootstrap</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h5 class="fw-bold mb-3 text-danger">DATA ACCOUNT</h5>
                        <div class="col-sm-3">
                            <p class="mb-0 text-black">Username</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-black mb-0">{{ $adopter->username }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 text-black">
                            <p class="mb-0 text-black">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-black mb-0">{{ $adopter->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 text-black">
                            <p class="mb-0 text-black">Status</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-black mb-0">
                                @if ($adopter->status == 1)
                                <span class="badge badge-danger">Tidak Aktif</span>
                                @else
                                <span class="badge badge-success">Aktif</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-black">Role</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-black mb-0">{{ $adopter->level }}</p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="fw-bold mb-3 text-danger">DATA ADOPTER</h5>
                            <div class="col-sm-3">
                                <p class="mb-0 text-black">NIK</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-black mb-0">{{ $adopter->detailAdopter->nik }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3 text-black">
                                <p class="mb-0 text-black">Nama Lengkap</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-black mb-0">{{ $adopter->detailAdopter->full_name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3 text-black">
                                <p class="mb-0 text-black">HP (WA)</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-black mb-0">{{ $adopter->detailAdopter->phone }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 text-black">Kode Pos</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-black mb-0">{{ $adopter->detailAdopter->zip_code }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 text-black">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-black mb-0">{{ $adopter->detailAdopter->street }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 text-black">Provinsi</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-black mb-0">{{ $adopter->detailAdopter->regency->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 text-black">Kota/Kabupaten</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-black mb-0">{{ $adopter->detailAdopter->subDistrict->name }}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
