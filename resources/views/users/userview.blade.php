<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Detail</title>
</head>

<body>
    <h1>User Detail</h1>
    <h4>First Name : {{ $user['fname'] }} </h4>
    <h4>Last Name : {{ $user['lname'] }} </h4>
    <h4>Email id : {{ $user['email'] }} </h4>
    <h4>State : {{ $user['state'] }} </h4>
    <h4>City : {{ $user['city'] }} </h4>
</body>

</html>
