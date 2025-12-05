<html>
<head><meta charset="utf-8"><title>Page1</title></head>
<body>

@auth
    <!-- User is authenticated -->
    <p>Hello {{$user}}</p>
    <form action="/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>
@else
    <!-- User is not authenticated -->
    <p>You are not authenticated. Please return to <a href="/">HOME PAGE</a> to login</p>
@endauth

</body>
</html>
