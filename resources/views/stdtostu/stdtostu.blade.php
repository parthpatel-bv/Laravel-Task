@extends('layouts.dash')

@section('title', 'Dashboard')
@section('content')

    <form style="text-align: center" method="POST" action="{{ route('store.stdtostu') }}">
        @csrf
        <label>Standard:</label>
        <select name="standard" required>
            @foreach ($standard as $std)
                <option value="{{ $std->id }}">{{ $std->standard }}</option>
            @endforeach
        </select><br><br>

        <label>Subjetc:</label>
        <select name="students[]" multiple required>
            @foreach ($student as $stu)
                <option value="{{ $stu->userid }}">{{ $stu->fname }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Assign student</button>
    </form>

@endsection
