<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url({{asset('dist/img/10972056.jpg.webp')}}); background-attachment: fixed;">

    <div class="login-box">
     
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <div class="login-logo">
                <a href="#"><b>MyShop</b> 2.0</a>
              </div>
            <p class="login-box-msg">Authentification</p>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="input-group mb-3">

                                <input id="email" class="form-control" placeholder="Nom d'utilisateur" name="email" value="{{ old('email') }}" required autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-user"></span>
                                    </div>
                                  </div>
                                @if ($errors->has('email'))
                                <div class="callout callout-danger">
                                  <h4>ERREUR!</h4>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                </div>
                                @endif
                        </div>

                        <div class="input-group mb-3">

                                <input id="password" type="password" class="form-control" placeholder="Mot de passe" name="password" required>

                                @if ($errors->has('password'))
                                <div class="callout callout-danger">
                                  <h4>ERREUR!</h4>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                </div>
                                @endif
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                    </div>
                                  </div>  
                                 </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <button type="reset" class="btn btn-danger btn-block"> Annuler</button>

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">

                                      <button type="submit" class="btn btn-primary btn-block"> Valider</button>
                                    </div>
                                    <!-- /.col -->
                                  </div>
                    </form>
                  
                      <!-- /.social-auth-links -->
            
                    </div>
                    <!-- /.login-card-body -->
                  </div>
                </div>
                <!-- /.login-box -->
                
                <!-- jQuery -->
                <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
                <!-- Bootstrap 4 -->
                <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
                <!-- AdminLTE App -->
                <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- Scripts -->
</body>
</html>
