@extends('layouts.app')
@section('title', 'Add Standard')
@section('content')

@section('styles')
    <style>
       
    </style>
@endsection
<form action="{{ route('standard.update',$std->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="wrapper">
        <label for="standard">Enter Standard:</label>
        <input type="text" name="standard" value="{{$std->standard}}"required>
    </div>

    <button type="submit">Edit</button>

    
</form>

@endsection
