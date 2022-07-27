<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ url('style/css_login.css') }}" rel="stylesheet">
</head>
<body>
<div class="content">
    <br><center>
        <img src="../image/rcv.png">
    </center><br>
    <form name="" method="post">
        @csrf
        <div class="inc">
            &ensp;<img src="../image/email.png">
            <input type="email" name="email" size="32" placeholder="Email">
        </div>
        <div class="err">
            @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
        </div>
        <div class="inc">
            &ensp;<img src="../image/password.png">
            <input type="password" name="password" size="32" placeholder="Password">
        </div>
        <div class="err">
            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </div>
{{--        <input type="checkbox" name="remember_token" style="margin-left: 250px;"> Remember--}}
        <input type="checkbox" name="remember" style="margin-left: 250px;" {{ old('remember') ? 'checked' : '' }}> Remember
        <input type="submit" value="Đăng nhập" style="margin-left: 110px; background-color: lightblue; border-radius: 5px;">
    </form>
    @if(isset($miss))
        <span style="color: red; margin-left: 250px; margin-top: 15px;" >{{ $miss }}</span>
    @endif
</div>
</body>
</html>
