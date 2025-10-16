<!DOCTYPE html>
<html>
<head>
    <title>Softrang Admin Login</title>
    <link rel="stylesheet" href="{{ asset('vendor/ecommerce-dashboard/css/style.css') }}">
</head>
<body>
<div class="login-container">
    <h2>Softrang Dashboard Login</h2>

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>

    @if ($errors->any())
        <p style="color:red;">{{ $errors->first() }}</p>
    @endif
</div>
</body>
</html>
