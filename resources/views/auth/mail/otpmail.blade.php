@extends('auth.master')
@section('content')
    <div class="card">
        <div class="card-header">{{ config('app.name') }}</div>
        <div class="card-body">
            <h2 class="bg-success p-3 text-white">{{ $getOtp }}</h2>
        </div>
    </div>
@endsection
