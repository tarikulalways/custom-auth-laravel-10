@extends('auth.master')
@section('content')
    <div class="title">Reset</div>
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="content">
        <form action="{{ route('savePwd') }}" method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Password</span>
                    @isset($email)
                    <input type="text" readonly value="{{ $email->email }}">
                    @endisset
                </div>

                <div class="input-box">
                    <span class="details">Password</span>
                    @isset($updateOtp)
                    <input type="hidden" name="updtOtp" value="{{ $updateOtp }}">
                    @endisset
                    <input type="text" name="newPwd" placeholder="Enter your password">
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="text" name="confirmPed" placeholder="Confirm your password">
                </div>
            </div>
            <div class="button">
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
