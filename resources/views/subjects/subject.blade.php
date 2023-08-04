@extends('layouts.dash')

@section('title', 'Dashboard')
@section('content')
    <div>
        <div>
            <a href="{{ route('subject.create') }}">Add subject</a>
        </div>
        <table align="center" border="1px">
            <tr>
                <th colspan="4">
                    <h2>Standards</h2>
                </th>
            </tr>
            <tr> <!-- Opening the <tr> tag here -->
                <th> subject Id </th>
                <th> Subject</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @forelse ($subject as $subject)
                <tr> <!-- Move the <tr> tag here -->
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->subject }}</td>
                    <td><a href="{{ route('subject.edit', $subject->id) }}">Edit</td>
                    {{-- <td><a href="{{ route('subject.destroy', $subject->id) }}">Delete</a></td> --}}
                    <td>
                        <form action="{{ route('subject.destroy', $subject->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4">No record found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
