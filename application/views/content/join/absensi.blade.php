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
  <style>
      .display-image{
          width:100%;
          height: 280px;
          background-color: ghostwhite;
          margin-top:10px;
          display: none;
      }
      video{
          width: 100%;
          height: 100%;
          padding: 0px;
          margin-top: 10px;
      }

  </style>
</head>
<body class="hold-transition ">
<div class="container-fluid bg-light">

  <div class="row">
    <div class="card card-outline card-primary col-lg-4 col-12 m-5 mx-auto">
      <div class="card-header text-center">
        <div class="h2">Absen Sekarang</div>
      </div>
      <div class="card-body">  
        <form action="{{ base_url('sistem/absent_now') }}" method="post" id="register-student">
          <div class="input-group mb-3">
            <input type="text" class="form-control"  name="code_room" placeholder="{{ get_msg("code_room") }}" value="{{ $code_room }}"  readonly>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-person-booth"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name_user" placeholder="{{ get_msg("name_user") }}" value={{ $user->name_user }} readonly>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <textarea name="description_scheduler" class="form-control" id="" cols="10" rows="3" placeholder="{{ get_msg('description_scheduler') }}(Optional)"></textarea>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
             <input type="hidden" name="picture_face_user" id="val-image">
             <button type="button" id="capture-btn" class="btn btn-sm btn-secondary">{{ get_msg("picture_face_user") }}</button>
             <a href="{{ base_url('register/students') }}"  class="btn ml-2 btn-sm btn-danger" >Reset</a>
            <div class="display-image">
              <img src="#" alt="" id="result-image" width="100%" height="100%">
            </div>
             <video id="webcam" autoplay playsinline></video>
             <canvas id="canvas" class="d-none"></canvas>
          </div>
          <div class="row">
            <div class="col-12">
              <p class="mb-0">
                <div class="icheck-primary ">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    centang jika ingin izin
                  </label>
                </div>
              </p>
              <button type="button" onclick="form_alert('register-student')" class="btn btn-primary btn-block">Absen Sekarang</button>
              <a class="nav-link btn btn-success mt-2" data-toggle="modal" data-target="#setting" id="settingbtn" role="button">
                change Password
            </a>
            
            </div>
            <!-- /.col -->
          </>
        </form>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
</div>
<!-- /.register-box -->
<div id="setting" class="modal">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Setting Account</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="selectForm2" class="parsley-style-1" method="POST" action="{{ base_url('sistem/change_password_user') }}" data-parsley-validate>
        <div class="modal-body">
          <div class="form-group mg-b-0">
            <label class="form-label">Password Lama: <span class="tx-danger">**</span></label>
            <input type="password" name="passwordold" class="form-control" required>
            <input type="hidden" name="code_room" value="{{ $code_room  }}">
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
<!-- jQuery -->
<script src="{{ base_url('assets/') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ base_url('assets/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ base_url('assets/') }}dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
<script>
    $(document).ready(()=>{
        const webcamElement = document.getElementById('webcam');
        const canvasElement = document.getElementById('canvas');
        const webcam = new Webcam(webcamElement, 'user', canvasElement, null);

        webcam.start();
        var btn_capture=$("#capture-btn");
        btn_capture.click(()=>{
            var picture = webcam.snap();
            $.post('<?=base_url("sistem/uploadImage") ?>',{img:picture},(data,res)=>{
              $("#val-image").val(data);
            });
            $("#result-image").attr("src",picture);
            $('video').css("display","none");
            $(".display-image").css("display","block");
            webcam.stop();

        });
    });

</script>
@include('partial.alert')
</body>
</html>
