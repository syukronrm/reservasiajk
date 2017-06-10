@extends('layouts.app')

@section('title', 'Login')

@section('content')
@section('class', 'hold-transition register-page')
<div class="register-box">
    <div class="register-logo">
        <a href="/">Reservasi<b>AJK</b></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register</p>
        @if(Session::has('message'))
        <p><b>{{Session::get('message')}}</b></p>
        @endif

        <form action="register" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Name" name="name">
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="NRP/NIP" name="nrp">
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="No HP" name="no_hp">
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-8">

                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
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