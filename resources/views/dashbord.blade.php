
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
    <a href="{{ route('standard.index') }}">Standard</a>
    <a href="{{ route('subject.index') }}">Subject</a>
    <a href="{{ route('chapter.index') }}">Chapter</a>

    <div class="dropdown">
        <button class="dropbtn">Other Operations</button>
        <div class="dropdown-content">
            <a href="#">Assign Chapter to Subject</a>
            <a href="#">Assign Subject to Standard</a>
            <a href="#">Assign Student to Standard</a>
        </div>
    </div>
</div>

@endsection
