@extends('layouts.app')
@section('title', 'Edit')
@section('content')

@section('styles')
    <style>

    </style>
@endsection
<form action=" {{ route('update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="wrapper">
        <label for="fname">Enter First Name:</label>
        <input type="text" name="fname" value="{{ $user->fname }}">

        @error('fname')
            <p class="error-message">{{ $message }}</p>
        @enderror

    </div>

    <div class="wrapper">
        <label for="lname">Enter Last Name:</label>
        <input type="text" name="lname" value="{{ $user->lname }}"required>


        @error('lname')
            <p class="error-message">{{ $message }}</p>
        @enderror

    </div>

    <div class="wrapper">
        <label for="email">Email:</label>
        <input type="text" name="email" value="{{ $user->email }} "required>

        @error('email')
            <p class="error-message">{{ $message }}</p>
        @enderror

    </div>

    <div class="wrapper">
        <label for="state">State:</label>
        <input type="text" name="state" value="{{ $user->state }}"required>

        @error('state')
            <p class="error-message">{{ $message }}</p>
        @enderror

    </div>

    <div class="wrapper">
        <label for="city">City:</label>
        <input type="text" name="city" value="{{ $user->city }} "required>


        @error('city')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Update</button>


</form>

@endsection
