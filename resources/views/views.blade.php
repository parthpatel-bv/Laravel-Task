@extends('layouts.dash')
<link rel="stylesheet" href="{{ asset('dash.css') }}">

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="header">
            <div class="profile">
            
            {{-- <h3>Welcome, {{ session('data')['fname'] }}</h3> --}}
        </div>
            <div class="menu">
                <a href="/listuser">List All Users</a>
                <a href="/registration">Add User</a>
                <a href="/logout">Logout</a>
            </div>
        </div>
    </div>
    <div class="navbar">
        <a href="#">Standard</a>
        <a href="#">Subject</a>
        <a href="#">Chapter</a>

        <div class="dropdown">
            <button class="dropbtn">Other Operations</button>
            <div class="dropdown-content">
                <a href="#">Assign Chapter to Subject</a>
                <a href="#">Assign Subject to Standard</a>
                <a href="#">Assign Student to Standard</a>
            </div>
        </div>
    </div>

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
