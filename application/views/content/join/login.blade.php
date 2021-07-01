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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
 @if($room)
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <div class="h2">{{ get_msg('sistem_name') }}</div>
    </div>
    <div class="card-body">
      <p class="login-box-msg">JOIN ROOM <span class="text-bold text-uppercase">#{{ $CI->uri->segment(2) }}</span></p>

      <form action="{{ base_url('sistem/check_login_join') }}" method="post" id="check-login">
        <div class="input-group mb-3">
          <input type="hidden" name="code_room" value="{{ $CI->uri->segment(2) }}">
          <input type="hidden" name="now_input" id="time">
          <input type="email" class="form-control" name="email_user" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password_user" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
         
            <button type="button" onclick="form_alert('check-login')" class="btn btn-primary btn-block">Absensi Sekarang</button>
          </div>
          <!-- /.col -->
        </div>
      
      </form>
      <!-- /.social-auth-links -->

      {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> --}}
 
    </div>
    <!-- /.card-body -->
  </div>
  @else
  <div class="alert alert-danger text-center">
    Code Room Tidak Ditemukan, <p> tanyakan kembali kepada guru</p>
  </div>
  @endif
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ base_url('assets/') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ base_url('assets/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ base_url('assets/') }}dist/js/adminlte.min.js"></script>
@include('partial.alert')
</body>
</html>
