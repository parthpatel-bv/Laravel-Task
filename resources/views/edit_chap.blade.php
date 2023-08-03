@extends('layouts.app')
@section('title', 'Edit Chapter')
@section('content')

@section('styles')
    <style>
       
    </style>
@endsection
<form action="{{ route('chapter.update',$chapter->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="wrapper">
        <label for="chapter">Enter chapter:</label>
        <input type="text" name="chapter" value="{{$chapter->chapter}}"required>
    </div>

    <button type="submit">Edit</button>

    
</form>

@endsection
