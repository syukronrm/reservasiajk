<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/AdminLTE.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('admin.index')}}">Reservasi<b>AJK</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Log in</p>

    <form action="{{route('auth.login')}}" method="post">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="NRP" name="nrp">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
    <a href="register" class="text-center">Register a new membership</a>
  </div>
</div>
<script src="{{URL::asset('js/jquery-2.2.3.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
