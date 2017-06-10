<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('css')
    <title>Reservasi AJK | @yield('title')</title>
    {{-- Tell the browser to be responsive to screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- Bootstrap 3.3.6 --}}
    <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    {{-- Ionicons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    {{-- Theme style --}}
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    {{-- iCheck --}}
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/flat/blue.css') }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};
    </script>
</head>
<body class="@yield('class')">
    {{-- Site wrapper --}}
    <div class="wrapper">
        {{-- main content --}}
        @yield('content')

        <div class="control-sidebar-bg"></div>
    </div>
    {{-- ./wrapper --}}

{{-- jQuery 2.2.3 --}}
<script src="{{ asset('adminlte/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
{{-- Bootstrap 3.3.6 --}}
<script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
{{-- SlimScroll --}}
<script src="{{ asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
{{-- FastClick --}}
<script src="{{ asset('adminlte/plugins/fastclick/fastclick.js')}}"></script>
{{-- AdminLTE App --}}
<script src="{{ asset('adminlte/dist/js/app.min.js')}}"></script>
{{-- AdminLTE for demo purposes --}}
<script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>
<script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
@yield('js')
</body>
</html>
