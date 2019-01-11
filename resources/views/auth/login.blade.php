<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Masuk</title>
  
  
  <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/libs/css/loginstyle.css">

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
        <label for="tab-1" class="tab">Masuk</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up">
        <label for="tab-2" class="tab"></label>
        <form class="login-form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}>
            <div class="sign-in-htm">
                <div class="group">
                    <label for="user" class="label">Nama Pengguna</label>
                     <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="group">
                    <label for="pass" class="label">Kata Sandi</label>
                    <input id="password" type="password" class="input" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Biarkan saya tetap masuk</label>
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Masuk">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="{{ route('password.request') }}">Lupa Kata Sandi?</a>
                </div>
            </div>
        </form>
    </div>
</div>
  
  

</body>

</html>
