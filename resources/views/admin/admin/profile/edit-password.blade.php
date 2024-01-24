@extends('layout-admin.main-layout')
@section('title', 'Edit Password Admin')
@include('.layout-admin.navigation')
@section('container')
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
<div class="page-inner mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="font-size:18px;">Update Password</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.admin.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="oldpassword">Old Password</label>
                            <input type="password" class="mt-1 form-control @error('oldpassword') is-invalid @enderror"
                                name="oldpassword" value="{{ old('oldpassword') }}" placeholder="Masukkan Password Lama Anda"
                                required>
                            <!-- error message untuk oldpassword -->
                            @error('oldpassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="newpassword">New Password</label>
                            <input type="password" class="mt-1 form-control @error('newpassword') is-invalid @enderror"
                                name="newpassword" value="{{ old('newpassword') }}" placeholder="Masukkan Password Baru Anda"
                                required>
                            <!-- error message untuk newpassword -->
                            @error('newpassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
