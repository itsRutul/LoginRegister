<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="{{ asset('css\app.css') }}">

</head>
<body>
    <div class="container">
        @if(session('status'))
            <div class="success">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('account.update') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ auth()->user()->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id ="email" type="email" name="email" value="{{ auth()->user()->email }}" required>
            </div>
            <div class="form-group">
                <button type="submit"> Update </button>
            </div>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"> Logout </button>
        </form>
    </div>
</body>
</html>
