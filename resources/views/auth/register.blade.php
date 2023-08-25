<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing Up</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}">

    @vite(['resources/js/app.js'])

</head>
<body>
    <div class="login-box">
        <h2>Create new account</h2>
        <form method="POST" autocomplete="off" action="{{ route('user.ajouter.register') }}">
            @csrf
                
            <div class="user-box">
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                <label for="name">Username</label>
                <span class="text-danger"><b>@error('name') {{$message}} @enderror</b></span>
            </div>
            <br>
            <div class="user-box">
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                <label for="email">Email</label>
                <span class="text-danger"><b>@error('email') {{$message}} @enderror</b></span>
            </div>
            <br>
            <div class="user-box">
                <input type="password" id="password" name="password" value="{{ old('password') }}" autocomplete="new-password">
                <label for="password">New Password</label>
                <span class="text-danger"><b>@error('password') {{$message}} @enderror</b></span>
            </div>
            <br>
            <div class="user-box">
                <input type="password" id="password-confirm" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="new-password">
                <label for="password-confirm">Confirm Password</label>
                <span class="text-danger"><b>@error('password_confirmation') {{$message}} @enderror</b></span>
            </div>
            <button class="btnsub" type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Sign Up
            </button>
        </form>
        <br>
        <a class="create_account" href="{{ route('user.login') }}"><b> I already have account</b> </a>
    </div>

</body>
</html>