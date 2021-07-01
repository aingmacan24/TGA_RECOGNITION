<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ get_msg('sistem_name').'|'.get_msg('version_path') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ base_url('assets/') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ base_url('assets/') }}dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ base_url('assets/') }}dist/css/style.css">
  <style>
    .icon-teacher,.icon-students{
    font-size: 85px !important;
    width: 100%;
    padding: 20px 30px 0px 30px;
    display: inline-block;
    line-height: 5px;
    text-decoration: none;
}
.item-icon{
  align-items: baseline;
  width: 50%;
}
.item-icon:hover, .icon-teacher:hover,.icon-students:hover{
  background-color: #007bff;
  color: white;
  cursor: pointer;
}
.login-box{
  border-top: 2px solid  #007bff;
}
.title-icon{
  padding: 10px;
}
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box text-center bg-white">
  <!-- /.login-logo -->

    
      <!-- /.social-auth-links -->
      <div class="title-register h3 pt-4 pb-2">Register as</div>
      <div class="d-flex " style="width:100%">
        <div class="item-icon">
          <a class="icon-teacher" href="{{ base_url('/register/teacher') }}"><i class="fas fa-user-tie"></i></a>
          <div class="title-icon">Teacher</div>
        </div>
        <div class="item-icon">
        <a class="icon-students" href="{{ base_url('register/students') }}"><i class="fas fa-user-graduate"></i></a>
        <div class="title-icon">Student</div>
        </div>

  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ base_url('assets/') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ base_url('assets/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ base_url('assets/') }}dist/js/adminlte.min.js"></script>
</body>
</html>
