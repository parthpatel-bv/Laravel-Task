@extends('layouts.dash')
@section('title', 'Dashboard')
@section('content')
    @if (session('access_type') == 'Admin' || session('access_type') == 'Teacher')
        <div>
            <a href="{{ route('standard.create') }}">Add standard</a>
        </div>
    @endif

    <table align="center" border="1px">
        <tr>
            <th colspan="4">
                <h2>Standards</h2>
            </th>
        </tr>
        <tr>
            <th> Standard Id </th>
            <th> Standard</th>
            @if (session('access_type') == 'Admin' || session('access_type') == 'Teacher')
                <th>Edit</th>
                <th>Delete</th>
            @endif


        </tr>
        @forelse ($standard as $std)
            <tr>
                <td>{{ $std->id }}</td>
                <td>{{ $std->standard }}</td>

                @if (session('access_type') == 'Admin' || session('access_type') == 'Teacher')
                    <td><a href="{{ route('standard.edit', $std->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('standard.destroy', $std->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="4">No standards found</td>
            </tr>
        @endforelse
    </table>
@endsection
