<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css\app.css') }}">

</head>
<body>
    <div class="container">
        @if(session('status'))
            <div class="success"> {{ session('status') }} </div>
        @endif
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email"> Email </label>
                <input id="email" type="email" name="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="password"> Password </label>
                <input id="password" type="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit"> Login </button>
            </div>
        </form>
        <p> Don't have an account? <a href="{{ route('register') }}"> Register here </a></p>
    </div>
</body>
</html>
