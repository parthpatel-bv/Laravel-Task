@extends('layouts.app')
@section('title', 'registartion')
@section('content')

@section('styles')
    <style>

    </style>
@endsection
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <div class="wrapper">
        <label for="fname">Enter First Name:</label>
        <input type="text" name="fname">

        @error('fname')
            <p class="error-message">{{ $message }}</p>
        @enderror

    </div>

    <div class="wrapper">
        <label for="lname">Enter Last Name:</label>
        <input type="text" name="lname">


        @error('lname')
            <p class="error-message">{{ $message }}</p>
        @enderror

    </div>

    <div class="wrapper">
        <label for="email">Email:</label>
        <input type="text" name="email" required>

        @error('email')
            <p class="error-message">{{ $message }}</p>
        @enderror

    </div>


    <div class="wrapper">
        <label for="accesstype">Select User Type:</label><br>
        <select name="access_type" id="accesstype">
            <?php foreach ($accesstype as $accesstype):?>
            <option value="<?php echo $accesstype['id']; ?>"><?php echo $accesstype['access_type']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>



    <div class="wrapper">
        <label for="state">State:</label>
        <input type="text" name="state" required>

        @error('state')
            <p class="error-message">{{ $message }}</p>
        @enderror

    </div>

    <div class="wrapper">
        <label for="city">City:</label>
        <input type="text" name="city" required>


        @error('city')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div class="wrapper">
        <label for="password">Enter Password:</label>
        <input type="password" name="password" required>


        @error('password')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div class="wrapper">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required>

        @error('password_confirmation')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Register</button>

    <div class="wrapper">
        <h4>Already registered?</h4>
        <a href="/login " name="sign_in">Sign in</a>
    </div>
</form>

@endsection
