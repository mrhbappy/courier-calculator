<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hamko Plastic | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/public')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/public')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/public')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style=" background-image: url({{asset('public/img/login-flower.jpg')}});background-position: center; ">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary" style="background: inherit;">
        <div class="card-header text-center">
          <a  href="#" class="h3 text-black"><b>{{config('app.name')}}</b></a>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <span class="bg-warning text-center">{{ implode('', $errors->all(':message')) }}</span>
            @endif
          <form action="{{route('login')}}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input  name="email" type="email" class="form-control" placeholder="Email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input name="password" type="password" class="form-control" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <p class="mb-1">
            <a class="text-white" href="{{ route('password.request') }}">Forgot password?</a></br>
          </p>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->

    </body>

</html>
