@extends('auth.master')
@section('content')
    <div class="title">OTP TEST</div>
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="content">
        <form action="{{ route('otpPost') }}" method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">OTP</span>
                    <input type="text" name="checkOtp" placeholder="Enter your OTP" required>
                </div>
            </div>
            <div class="button">
                <button type="submit">Send OTP</button>
            </div>
        </form>
    </div>
@endsection
