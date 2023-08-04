@extends('layouts.app')

@section('title', 'login')

@section('content')
    <form action="{{ route('user.login.post') }}" method="POST">
        @csrf
        <div class="wrapper">
            <label for="email">Enter Email</label>
            <input type="email" name="email" required> <br>
        </div>
        <div class="wrapper">
            <label for="password">Enter Password</label>
            <input type="password" name="password" required> <br>
        </div>

        <button type="submit">Login</button>

        <div class="wrapper">
            <label for="register">New User Registration</label>
            <a href="/registration">Register Here</a>
        </div>
    </form>
@endsection
