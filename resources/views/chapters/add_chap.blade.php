@extends('layouts.app')
@section('title', 'Add Standard')
@section('content')

@section('styles')
    <style>
       
    </style>
@endsection
<form action="{{ route('chapter.store') }}" method="POST">
    @csrf
    <div class="wrapper">
        <label for="chapter">Enter chapter:</label>
        <input type="text" name="chapter" required>
    </div>

    <button type="submit">Add</button>

    
</form>

@endsection
