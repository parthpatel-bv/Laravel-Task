@extends('layouts.app')
@section('title', 'Upload image')
@section('content')

@section('styles')
    <style>
       
    </style>
@endsection
<form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="wrapper">
        <label for="image">Upload image:</label>
        <input type="file" name="image">
    </div>

    <button type="submit">Upload</button>
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    <input type="hidden" name="fname" value="{{ $fname }}">
</form>

@endsection
