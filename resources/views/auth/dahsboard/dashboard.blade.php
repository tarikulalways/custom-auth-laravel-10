@extends('auth.master')
@section('title', 'Dashboard')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">{{ Auth::user()->fname }}</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('logOut') }}">Logout</a>
          </li>
      </ul>
    </div>
  </nav>
@endsection
