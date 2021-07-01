<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ base_url('assets/') }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ base_url('assets/') }}dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ base_url('assets/') }}dist/css/style.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/summernote/summernote-bs4.min.css">

        <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ base_url('assets/') }}dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-light" data-toggle="modal" data-target="#setting" id="settingbtn" role="button">
                        change Password
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-danger btn btn-small" href="{{ base_url('/logout') }}" role="button">
                        Log Out
                    </a>
                </li>
               
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ base_url('/room') }}" class="brand-link">
                <img src="{{ base_url('assets/') }}dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ get_msg('sistem_name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ base_url('assets/') }}dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ $CI->session->userdata('name_sheduler') }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ base_url('/room') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </div>
        <!-- /.row (main row) -->
        <footer class="main-footer">
           
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>
    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
    {{-- modal --}}
    <div id="setting" class="modal">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Setting Account</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="selectForm2" class="parsley-style-1" method="POST" action="{{ base_url('sistem/change_password') }}" data-parsley-validate>
              <div class="modal-body">
                <div class="form-group mg-b-0">
                  <label class="form-label">Password Lama: <span class="tx-danger">**</span></label>
                  <input type="password" name="passwordold" class="form-control" required>
                </div>
                <div class="form-group mg-b-0">
                  <label class="form-label">Password Baru: <span class="tx-danger">*</span></label>
                  <input type="password" name="passwordnew" class="form-control" required>
                </div><!-- form-group -->
              </div>
              <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div><!-- modal-dialog -->
      </div><!-- modal -->
    {{-- end-modal --}}
    <!-- jQuery -->
    <script src="{{ base_url('assets/') }}plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ base_url('assets/') }}plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

        function data_url(e) {
            window.location = $(e).data('href');
        }

        function copyToClipboard(e) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val("(absent room :" + $(e).data('code') + ')(Waktu Absen:' + $(e).data('time') + ")").select();
            document.execCommand("copy");
            $temp.remove();

        }

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ base_url('assets/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ base_url('assets/') }}plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ base_url('assets/') }}plugins/sparklines/sparkline.js"></script>
    {{-- <!-- JQVMap -->
    <script src="{{ base_url('assets/') }}plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ base_url('assets/') }}plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{ base_url('assets/') }}plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ base_url('assets/') }}plugins/moment/moment.min.js"></script>
    <script src="{{ base_url('assets/') }}plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ base_url('assets/') }}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="{{ base_url('assets/') }}plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ base_url('assets/') }}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ base_url('assets/') }}dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ base_url('assets/') }}dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ base_url('assets/') }}dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & Plugins -->
<script src="{{ base_url('assets/') }}plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ base_url('assets/') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ base_url('assets/') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ base_url('assets/') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ base_url('assets/') }}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ base_url('assets/') }}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ base_url('assets/') }}plugins/jszip/jszip.min.js"></script>
<script src="{{ base_url('assets/') }}plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ base_url('assets/') }}plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ base_url('assets/') }}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ base_url('assets/') }}plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ base_url('assets/') }}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


    <script>
        $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            },
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    </script>
    @include('partial.alert')
</body>

</html>
