<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Home - Login</title></head>
<body>
    <h1>Login</h1>

    <!-- Show login error if credentials are wrong -->
    @if($errors->has('loginError'))
        <p style="color:red;">{{ $errors->first('loginError') }}</p>
    @endif

    <!-- Login form -->
    <form action="/login" method="post">
        @csrf <!-- keep this to prevent CSRF attacks -->
        <input type="text" name="loginName" placeholder="Username"><br>
        <input type="password" name="loginPassword" placeholder="Password"><br>
        <button type="submit">Login</button>
    </form>

    <!-- Link to register page if not a member yet -->
    <p>Not a member yet? Please <a href="/register">sigh up</a> here</p>
</body>
</html>
