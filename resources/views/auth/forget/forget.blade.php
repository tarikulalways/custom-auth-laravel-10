@extends('auth.master')
@section('content')
    <div class="title">Forget</div>
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="content">
        <form action="{{ route('forgetPost') }}" method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="button">
                <button type="submit">Send</button>
            </div>
            <div class="button">
                <button>
                    <a href="{{ route('login.view') }}">Login</a>
                </button>
            </div>
        </form>
    </div>
@endsection
