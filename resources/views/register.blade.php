<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

@auth
    <!-- User is authenticated -->
    <p>Hello {{$user}}</p>
    <form action="/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>
@else
    <div style="border: 3px solid #222; border-radius: 5px;">
        <!-- User is not authenticated -->
        <h1>Registration</h1>

        <form action="/register" method="post">
            @csrf
            <input type="text" name="name" placeholder="name"><br>
            <input type="email" name="email" placeholder="email"><br>
            <input type="password" name="password" placeholder="password"><br>
            <button type="submit">Submit</button>
        </form>

        <p><a href="/">Back to Login</a></p>
    </div>
@endauth

</body>
</html>
