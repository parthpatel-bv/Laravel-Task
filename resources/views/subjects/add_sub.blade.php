@extends('layouts.app')
@section('title', 'Add Standard')
@section('content')

@section('styles')
    <style>

    </style>
@endsection
<form action="{{ route('subject.store') }}" method="POST">
    @csrf
    <div class="wrapper">
        <label for="subject">Enter Subject:</label>
        <input type="text" name="subject" required>
    </div>

    <button type="submit">Add</button>


</form>

@endsection
