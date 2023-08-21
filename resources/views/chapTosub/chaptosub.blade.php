
@extends('layouts.dash')
@section('title','Dashboard')
@section('content')

<form style="text-align: center" method="POST" action="{{route('store.chapTosub')}}">
    @csrf
    <label>Subject:</label>
    <select name="subject" required>
        @foreach ($subject as $sub)
            <option value="{{ $sub->id }}">{{ $sub->subject }}</option>
        @endforeach
    </select><br><br>

    <label>Chapter:</label>
    <select name="chapter[]" multiple required>
        @foreach ($chapter as $chap)
            @if($chap->status == true)
                <option value="{{ $chap->id }}">{{ $chap->chapter }}</option>
            @endif
        @endforeach
    </select><br><br>

    <button type="submit">Assign Subject</button>
</form>

@endsection
