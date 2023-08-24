<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
    @yield('style')
</head>

<body>

    <div class="container">
        <div class="header">

            <div class="profile-image">
                <img src="{{ 'http://127.0.0.1:8000/storage/' . session('final_path') }}" />
            </div>

            <div class="profile">
                <h3> Welcome, {{ session('fname') }} {{ session('lname') }}</h3>
            </div>

            <div class="menu">
                @if (session('access_type') == 'Admin' || session('access_type') == 'Teacher')
                    <a href="/listuser">List All Users</a>
                    <a href="/registration">Add User</a>
                @endif
                <a href="/logout">Logout</a>
            </div>
        </div>
    </div>
    <div class="navbar">
        <a href="{{ route('standard.index') }}">Standard</a>
        <a href="{{ route('subject.index') }}">Subject</a>
        <a href="{{ route('chapter.index') }}">Chapter</a>

        @if (session('access_type') == 'Admin' || session('access_type') == 'Teacher')
            <div class="dropdown">
                <button class="dropbtn">Other Operations</button>
                <div class="dropdown-content">
                    <a href="{{ route('assign.chapTosub') }}">Assign Chapter to Subject</a>
                    <a href="{{ route('assign.subtostd') }}">Assign Subject to Standard</a>
                    <a href="{{ route('assign.stdtostu') }}">Assign Student to Standard</a>
                </div>
            </div>
        @endif


    </div>

    @yield('content')

</body>

</html>
