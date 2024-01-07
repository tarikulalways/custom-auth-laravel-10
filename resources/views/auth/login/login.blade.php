@extends('auth.master')
@section('title', 'Login')
@section('content')
    <div class="title">Login</div>
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="content">
        <form action="{{ route('loginPost') }}" method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="text" name="password" placeholder="Enter your password" required>
                </div>
            </div>
            <div class="button">
                <button type="submit">Login</button>
            </div>
            <div class="button">
                <button>
                    <a href="{{ route('register.view') }}">Register</a>
                </button>
            </div>
            <div class="button">
                <button>
                    <a href="{{ route('forgetView') }}">Forget</a>
                </button>
            </div>
        </form>
    </div>
@endsection
