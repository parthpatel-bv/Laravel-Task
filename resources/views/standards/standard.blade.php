@extends('layouts.dash')
@section('title', 'Dashboard')
@section('content')
    <div>
        <a href="{{ route('standard.create') }}">Add standard</a>
    </div>
    <table align="center" border="1px">
        <tr>
            <th colspan="4">
                <h2>Standards</h2>
            </th>
        </tr>
        <tr> <!-- Opening the <tr> tag here -->
            <th> Standard Id </th>
            <th> Standard</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @forelse ($standard as $std)
            <tr> <!-- Move the <tr> tag here -->
                <td>{{ $std->id }}</td>
                <td>{{ $std->standard }}</td>
                <td><a href="{{ route('standard.edit', $std->id) }}">Edit</td>
                <td>
                    <form action="{{ route('standard.destroy', $std->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="4">No standards found</td>
            </tr>
        @endforelse
    </table>
    </div>
@endsection
