<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Imperium') }} - @yield('title', trans('admin.dashboard'))</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="dns-prefetch" href="https://fonts.googleapis.com">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    @include('admin.partials.navbar')

    <!-- Main Sidebar Container -->
    @include('admin.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content') 
    
    @yield('modal')

    <!-- Main Footer -->
    @include('admin.partials.footer')

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>

  <!-- Bootstrap -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

  <!-- AdminLTE App -->
  <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>

  @yield('scripts')

</body>

</html>