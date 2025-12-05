<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Register</title></head>
<body>
    <h1>Register</h1>

    <!-- Show form validation errors, if any -->
    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Registration form -->
    <form action="/register" method="post">
        @csrf
        <input type="text" name="username" placeholder="Username"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Register</button>
    </form>

    <!-- Link back to login page -->
    <p><a href="/">Back to Login</a></p>
</body>
</html>
