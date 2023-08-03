@extends('layouts.app')
@section('title', 'Add Standard')
@section('content')

@section('styles')
    <style>
       
    </style>
@endsection
<form action="{{ route('subject.update',$subject->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="wrapper">
        <label for="subject">Enter Subjetc:</label>
        <input type="text" name="subject" value="{{$subject->subject}}"required>
    </div>

    <button type="submit">Edit</button>

    
</form>

@endsection
