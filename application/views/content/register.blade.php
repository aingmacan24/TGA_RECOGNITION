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
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <div class="h2">{{ get_msg('sistem_name') }}</div>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{ get_msg("register_box_msg") }}</p>

      <form action="{{ base_url('register') }}" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control {{ form_e('name_sheduler') ? 'is-invalid' : '' }}"  name="name_sheduler" placeholder="{{ get_msg("name_sheduler") }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <div class="invalid-feedback">
              {{ form_e('name_sheduler') }}
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control {{ form_e('nickname_scheduler') ? 'is-invalid' : '' }}" name="nickname_scheduler" placeholder="{{ get_msg("nickname_scheduler") }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <div class="invalid-feedback">
              {{ form_e('nickname_scheduler') }}
          </div>
        </div>
  
        <div class="input-group mb-3">
          <input type="email" class="form-control {{ form_e('email_sheduler') ? 'is-invalid' : '' }}" name="email_sheduler" placeholder="{{ get_msg("email_sheduler") }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <div class="invalid-feedback">
              {{ form_e('email_sheduler') }}
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control {{ form_e('password') ? 'is-invalid' : '' }}" name="password" placeholder="{{ get_msg("password") }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="invalid-feedback">
              {{ form_e('password') }}
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control {{ form_e('password_confirm') ? 'is-invalid' : '' }}" name="password_confirm" placeholder="{{ get_msg("password_confirm") }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="invalid-feedback">
              {{ form_e('password_confirm') }}
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="{{ base_url('Login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ base_url('assets/') }}plugins/jquery/jquery.min.js"></scrip>
<!-- Bootstrap 4 -->
<script src="{{ base_url('assets/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ base_url('assets/') }}dist/js/adminlte.min.js"></script>
@include('partial.alert')
</body>
</html>
