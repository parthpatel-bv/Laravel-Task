
@extends('layouts.dash')

@section('title','Dashboard')
@section('content')
    <div>
        <a href="{{route('chapter.create')}}">Add chapter</a>
    </div>
    <table align="center" border="1px"> 
        <tr> 
            <th colspan="4"><h2>Chapters</h2></th> 
        </tr> 
        <tr> <!-- Opening the <tr> tag here -->
            <th> Standard Id </th> 
            <th> Standard</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>    
        @forelse ($chapter as $chapter)
        <tr> <!-- Move the <tr> tag here -->
            <td>{{$chapter->id}}</td>
            <td>{{$chapter->chapter}}</td>
            <td><a href="{{ route('chapter.edit', $chapter->id) }}">Edit</td>
            
            <td> <form action="{{ route('chapter.destroy', $chapter->id) }}" method="POST">
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
