<script src="{{base_url('assets')}}/plugins/sweetalert2/sweetalert.min.js"></script>
@php

if($CI->session->flashdata('pesan')){


echo '<script>
  '.$CI->session->flashdata('pesan').'
</script>';
$CI->session->unset_userdata('pesan');
}
if($CI->session->flashdata('f_error')){

$CI->session->unset_userdata('f_error');
}
@endphp

<script>
now_date();
function delete_alert(param) {
      const link=$(param).data('href');
      swal({
        title: "Menghapus Data ini?",
        text: "Dengan menghapus data ini semua yang berelasi dengan data ini juga ikut terhapus",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete)=>{
          if(willDelete){
              document.location=link;
          }
      });
    }

    
function form_alert(id) {
      var form=$('#'+id);
      swal({
        text: "Sudah Mengisi Form Dengan Benar?",
        icon: "info",
        buttons: true,
        dangerMode: true,
      }).then((willDelete)=>{
          if(willDelete){
              form.submit();
          }
      });
    }
function now_date(){
  var today = new Date();
  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  var dateTime = date+' '+time;
  $('#time').val(dateTime);
}

</script>