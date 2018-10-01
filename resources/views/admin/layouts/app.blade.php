<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin-black.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/admin_main.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    @include('admin.layouts.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layouts.left-menu')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="position:relative;">
        <!-- Preloader -->
        <div id="before-load">
            <!-- Иконка Font Awesome -->
            <i class="fa fa-spinner fa-spin"></i>
        </div>
        @if($errors->any())
            <div class="alert-danger alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div style="padding-top: 40px;">
                <div class="alert alert-success">{{ session('success') }}</div>
            </div>
        @endif
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('admin.layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- Jquery sortable -->
<script src="{{ asset('js/jquery-sortable.js') }}"></script>
<!-- Main js -->
<script src="{{ asset('js/admin_main.js') }}"></script>

<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

@yield('js')

</body>
</html>
