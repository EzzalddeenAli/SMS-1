<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JILCSTANAUAN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
<div class="container">
    <div class="top">
        <h1 id="title" class="hidden"><span id="logo">JILCS <span>Tan.</span></span></h1>
    </div>
    <div class="login-box animated fadeInUp">
        <div class="box-header">
{{--            @if($header !== 'Student')
                <h2>Log In as <span style="font-style: italic">{{ $header }}</span></h2>
                @else
                <h2>Log In</h2>
            @endif--}}
            <h2>Log In</h2>
        </div>
        <form method="POST" action="{{ route($route) }}">
            {{ csrf_field() }}
            @if ($errors->has('invalid'))
                <p class="has-error">{{ $errors->first('invalid') }}</p>
            @endif
            <label for="username">Username</label>
            <br>
            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
            <br>
            <label for="password">Password</label>
            <br>
            <input id="password" type="password" class="form-control" name="password" required>
            <br>
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
            <br>
            <button type="submit">Sign In</button>
            <br>
            @if($header === 'Student')
            <a href="#"><p class="small">Forgot your password?</p></a>
            <a href="#"><p class="small" style="font-weight: bold">I have no account</p></a>
            @endif
        </form>
    </div>
</div>
</body>

</html>