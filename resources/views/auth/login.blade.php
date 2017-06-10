@extends('layouts.app')

@section('title', 'Login')

@section('content')
@section('class', 'hold-transition login-page')
    <div class="login-box">
        <div class="login-logo">
            <a href="/">Reservasi<b>AJK</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Log in</p>

            <form action="/login" method="post">
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
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="register" class="text-center">Register a new membership</a>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection

@section('js')
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
  });
});
</script>
@endsection