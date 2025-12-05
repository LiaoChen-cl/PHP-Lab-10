<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Page1</title></head>
<body>
    <!-- Check if user is logged in -->
    @if(auth()->check())
    <!-- get the user name -->
        <p>Hello {{ auth()->user()->name }}</p>

        <!-- Logout button -->
        <form action="/logout" method="post">
            @csrf <!-- keep this to prevent CSRF attacks -->
            <button type="submit">Logout</button>
        </form>
    @else
    <!-- go back to home page if not login-->
        <p>You are not authenticated. Please return to <a href="/">HOME PAGE</a> to login</p>
    @endif
</body>
</html>
