@extends('layouts.dash')

@section('title', 'Dashboard')
@section('content')
    @if (session('access_type') == 'Admin' || session('access_type') == 'Teacher')
        <div>
            <a href="{{ route('chapter.create') }}">Add chapter</a>
        </div>
    @endif
    <table align="center" border="1px">
        <tr>
            <th colspan="6">
                <h2>Chapters</h2>
            </th>
        </tr>
        <tr> <!-- Opening the <tr> tag here -->
                <th> Chapter Id </th>
                <th> Chapter </th>
            @if (session('access_type') == 'Admin' || session('access_type') == 'Teacher')
                <th>Status</th>
                <th>Change Status</th>
                <th>Edit</th>
                <th>Delete</th>
            @endif
        </tr>
        @forelse ($chapter as $chapter)
            <tr> <!-- Move the <tr> tag here -->
                <td>{{ $chapter->id }}</td>
                <td>{{ $chapter->chapter }}</td>
                @if (session('access_type') == 'Admin' || session('access_type') == 'Teacher')
                    <td>
                        @if ($chapter->status == true)
                            {{'Active'}}
                            @else
                            {{'Deactive'}}                            
                        @endif

                    </td>
                    <td>
                        <form action="{{ route('chapter.status', ['id' => $chapter->id]) }}" method="post">
                            @csrf
                            {{-- @method('PUT') --}}
                            <button name="status">
                                {{$chapter->status ? 'Deactivate' : 'Activate'}}
                            </button>
                        
                        </form>
                    </td>
                    <td><a href="{{ route('chapter.edit', $chapter->id) }}">Edit</td>
                    <td>
                        <form action="{{ route('chapter.destroy', $chapter->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="4">No record found</td>
            </tr>
        @endforelse
    </table>
    </div>
@endsection
