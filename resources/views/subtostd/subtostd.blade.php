@extends('layouts.dash')

@section('title', 'Dashboard')
@section('content')

    <form style="text-align: center" method="POST" action="{{ route('store.subtostd') }}">
        @csrf
        <label>Standard:</label>
        <select name="standard" required>
            @foreach ($standard as $std)
                <option value="{{ $std->id }}">{{ $std->standard }}</option>
            @endforeach
        </select><br><br>

        <label>Subjetc:</label>
        <select name="subject[]" multiple required>
            @foreach ($subject as $sub)
                <option value="{{ $sub->id }}">{{ $sub->subject }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Assign chapter</button>
    </form>

@endsection
