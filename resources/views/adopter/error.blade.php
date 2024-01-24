@extends('layout-adopter.main-layout')

@section('title', 'Error')

@include('layout-adopter.navigation')

@section('container')
    <div class="container text-center" style="padding-top: 190px;">
        <h2>Error</h2>
        <p>{{ $errorMessage }}</p>
        <a href="{{ route('dashboard.adopter') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
