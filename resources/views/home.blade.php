<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Login</title>
</head>
<body>

@auth
    <!-- User is authenticated -->
     <!-- show user -->
    <p>Hello {{$user}}</p>
    <form action="/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>

@else
    <div style="border: 3px solid #222; border-radius: 5px;">
        <!-- User is not authenticated -->
        <h1>Login</h1>
        <!-- login form -->
        <form action="/login" method="post">
            @csrf
            <input type="text" name="loginName" placeholder="name"><br>
            <input type="password" name="loginPassword" placeholder="password"><br>
            <button type="submit">Login</button>
        </form>


        <p>Not a member yet? Please <a href="/register">sign up</a> here</p>
    </div>
@endauth

</body>
</html>
