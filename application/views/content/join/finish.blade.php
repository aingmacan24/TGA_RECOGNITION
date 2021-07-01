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
 @if($category=='link')
  <div class="alert alert-success text-center">
    Berhasil absensi dengan kecocokan <b>{{ $jarak }}</b><br> Harap Tunggu <div id="timer-data" data-start="5" class="h2">5</div> untuk redirect ke {{ $share_room }}
    <h2><i class="far fa-check-circle"></i></h2>
    <script type="text/javascript">
        setInterval(()=>{
            var time=$("#timer-data").attr("data-start");
            $("#timer-data").html(time);
            if(time>0){
                time-=1;
            }
            $("#timer-data").attr("data-start",time);
        },1000);
      
        setTimeout(function() {
            window.location.href = '<?=$share_room?>';
        }, 5000);
    
    </script>
  </div>
  @else
  <div class="alert alert-success text-center">
    Berhasil absensi dengan kecocokan <b>{{ $jarak }}</b>
  </div>
  <div class="card">
      <div class="card-body">
          <p>{{ $share_room }}</p>
      </div>
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
