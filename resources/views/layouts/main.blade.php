<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/skin-blue-light.min.css')}}">
  @yield('css')
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
  @yield('navbar')
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <br><br><br>
        </div>
        <div class="pull-left info">
          <p>Nama</p>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{route('index.admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Reservasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-angle-double-right"></i> List Reservasi</a></li>
            <li><a href="{{route('add.reservation')}}"><i class="fa fa-angle-double-right"></i> Tambah Reservasi</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
  <aside class="right-side">
    <section class="content">
      @yield('content')
    </section>
  </aside>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
</div>
<script src="{{URL::asset('js/jquery-2.2.3.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/app.min.js')}}" type="text/javascript"></script>
@yield('js')
</body>
</html>