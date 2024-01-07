@extends('auth.master')
@section('title', 'Rgistration')
@section('content')
    <div class="title">Registration</div>
    <div class="content">
        <form action="{{ route('registerPost') }}" method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Frist Name</span>
                    <input type="text" name="fname" placeholder="Enter your name">
                    @error('fname')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" name="lname" placeholder="Enter your username">
                    @error('lname')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" placeholder="Enter your email">
                    @error('email')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" name="phone" placeholder="Enter your number">
                    @error('phone')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="text" name="password" placeholder="Enter your password">
                    @error('password')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="button">
                <button type="submit">Register</button>
            </div>
            <div class="button">
                <button>
                    <a href="{{ route('login.view') }}">Login</a>
                </button>
            </div>
        </form>
    </div>
@endsection
