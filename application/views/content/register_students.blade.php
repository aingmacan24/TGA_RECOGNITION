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
      .upload{
        width: 90px !important;
        margin-left: 10px;

      }
      .upload::-webkit-file-upload-button {
        visibility: hidden;
}
      .upload::before{
        content: 'upload foto';
        display: inline-block;
        background-color: #6c757d;
        color: white;
        padding: 3px;
        border-radius:5px;
        text-align: center;
        width: 90px;
      }

  </style>
</head>
<body class="hold-transition ">
<div class="container-fluid bg-light">

  <div class="row">
    <div class="card card-outline card-primary col-lg-4 col-12 m-5 mx-auto">
      <div class="card-header text-center">
        <div class="h2">{{ get_msg('sistem_name') }}</div>
      </div>
      <div class="card-body">
        <p class="login-box-msg">{{ get_msg("register_box_msg_studen") }}</p>
  
        <form action="{{ base_url('sistem/register_user') }}" method="post" id="register-student">
          <div class="input-group mb-3">
            <input type="text" class="form-control  {{ form_e('identity_user') ? 'is-invalid' : '' }}"  name="identity_user" placeholder="{{ get_msg("identity_user") }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="invalid-feedback">
            {{ form_e('identity_user') }}
        </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control  {{ form_e('name_user') ? 'is-invalid' : '' }}" name="name_user" placeholder="{{ get_msg("name_user") }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              {{ form_e('name_user') }}
          </div>
          </div>
          <div class="input-group mb-3">
            <select name="gender_user" class="form-control  {{ form_e('gender_user') ? 'is-invalid' : '' }}" >
                <option value="" disabled selected>{{ get_msg('gender_user') }}</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-venus-mars"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              {{ form_e('gender_user') }}
          </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control  {{ form_e('email_user') ? 'is-invalid' : '' }}" name="email_user" placeholder="{{ get_msg("email_user") }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              {{ form_e('email_user') }}
          </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control {{ form_e('password') ? 'is-invalid' : '' }}" name="password" placeholder="{{ get_msg("password_user") }}">
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
            <input type="password" class="form-control  {{ form_e('password_confirm') ? 'is-invalid' : '' }}" name="password_confirm" placeholder="{{ get_msg("password_confirm") }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              {{ form_e('password_confirm') }}
          </div>
          </div>
          <div class="input-group mb-3 ">
            <div class=" {{ form_e('picture_face_user') ? 'text-danger' : '' }}">
              <div class="invalid-feedback">
                {{ form_e('picture_face_user') }}
            </div>
            </div>
             <input type="hidden" name="picture_face_user" id="val-image"> 

             <button type="button" id="capture-btn" class="btn btn-sm btn-secondary">{{ get_msg("picture_face_user") }}</button>
             <input type="file" name="" class="upload" id="but_upload" >
             <a href="{{ base_url('register/students') }}"  class="btn ml-2 btn-sm btn-danger" >Reset</a>
            <div class="display-image">
              <img src="#" alt="" id="result-image" width="100%" height="100%">
            </div>
             <video id="webcam" autoplay playsinline></video>
             
             <canvas id="canvas" class="d-none"></canvas>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="button" onclick="form_alert('register-student')" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </>
        </form>
        <a href="{{ base_url('Login') }}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
</div>
<!-- /.register-box -->

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
        $("#but_upload").change(function(){
        var fd = new FormData();
        var files = $(this)[0].files[0];
        fd.append('file',files);
        $.ajax({
            url: '<?=base_url("sistem/uploadfile")?>',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
              var foto=JSON.parse(response);
              $("#result-image").attr("src","<?=base_url('uploads/IMG/')?>"+foto.foto);
              $("#val-image").val(foto.foto);
              $('video').css("display","none");
              $(".display-image").css("display","block");
              webcam.stop();
            },
        });
    });
    });

</script>
@include('partial.alert')
</body>
</html>
