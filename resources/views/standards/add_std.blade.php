@extends('layouts.app')
@section('title', 'Add Standard')
@section('content')

@section('styles')
    <style>
       
    </style>
@endsection
<form action="{{ route('standard.store') }}" method="POST">
    @csrf
    <div class="wrapper">
        <label for="standard">Enter Standard:</label>
        <input type="text" name="standard" required>
    </div>

    <button type="submit">Add</button>

    
</form>

@endsection
