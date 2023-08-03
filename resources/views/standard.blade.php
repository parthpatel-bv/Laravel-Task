
@extends('layouts.dash')
<link rel="stylesheet" href="{{ asset('dash.css') }}">

@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="header">
        <div class="profile">
            
            <h3>Welcome, {{ session('data')['fname'] }}</h3>
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
<div>
    <div>
        <a href="{{route('standard.create')}}">Add standard</a>
    </div>
    <table align="center" border="1px"> 
        <tr> 
            <th colspan="4"><h2>Standards</h2></th> 
        </tr> 
        <tr> <!-- Opening the <tr> tag here -->
            <th> Standard Id </th> 
            <th> Standard</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>    
        @forelse ($standard as $std)
        <tr> <!-- Move the <tr> tag here -->
            <td>{{$std->id}}</td>
            <td>{{$std->standard}}</td>
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
