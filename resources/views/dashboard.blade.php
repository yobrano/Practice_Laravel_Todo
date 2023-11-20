<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{ $message }}
    @auth
    {{-- {{$user->name }} --}}
    <a href="/todo-read">Tasks</a>
    <form action="/user-logout" method="post">
       @csrf
       <button type="submit">logout</button> 
    </form>
    @else
        <h3>Register</h3>
        <form action="/user-register" method="post">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="Register">
        </form>

        <h3>Login</h3>
        <form action="/user-login" method="post">
            @csrf
            <input type="email" name="login_email" placeholder="email">
            <input type="password" name="login_password" placeholder="password">
            <input type="submit" value="Login">
        </form>
    @endauth
</body>

</html>
