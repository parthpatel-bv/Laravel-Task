@extends('layouts.dash')
@section('title', 'Dashboard')

@section('content')

    <table align="center" border="1px">
        <tr>
            <th colspan="9">
                <h2>User Detail</h2>
            </th>
        </tr>
        <tr>
            <th>ID</th>
            <th> First Name </th>
            <th> Last Name</th>
            <th> Email</th>
            <th> State </th>
            <th> City </th>
            <th> Edit </th>
            <th> Delete </th>
            <th> View </th>
        </tr>
        @forelse ($users as $data)
            <tr>
                <td>
                    {{ $data->id }}
                </td>
                <td>
                    {{ $data->fname }}
                </td>
                <td>
                    {{ $data->lname }}
                </td>
                <td>
                    {{ $data->email }}
                </td>
                <td>
                    {{ $data->state }}
                </td>
                <td>
                    {{ $data->city }}
                </td>
                <td>
                    <button> <a href="{{ route('edit', $data->id) }}">Edit</a> </button>
                </td>
                <td>
                    <button> <a href="{{ route('delete', $data->id) }}">Delete</a> </button>
                </td>
                <td>
                    <button> <a href="{{ route('userview', $data->id) }}">View</a> </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9">No users found</td>
            </tr>
        @endforelse
    </table>
@endsection
