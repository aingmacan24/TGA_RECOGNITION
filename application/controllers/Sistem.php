<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sistem extends CI_Controller
{

    function index()
    {
    }
    function uploadfile(){
        
        $config['upload_path'] = './uploads/IMG/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            $data = $this->upload->data('file_name'); 
            echo json_encode(['foto'=>$data]);
        }
        
    }
    function uploadImage()
    {
        $base_64 = $this->input->post('img');
        $img = str_replace('data:image/png;base64,', '', $base_64);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $name_file = random_string('alnum', 16);
         
        file_put_contents(FCPATH . '/uploads/IMG/' . $name_file . '.png', $data);
        echo $name_file . '.png';
    }

    function register_user()
    {
        $data['identity_user'] = $this->input->post('identity_user');
        $data['name_user'] = $this->input->post('name_user');
        $data['gender_user'] = $this->input->post('gender_user');
        $data['email_user'] = $this->input->post('email_user');
        $data['password_user']=password_hash($this->input->post('password'),PASSWORD_BCRYPT);
        $data['picture_face_user']=$this->input->post('picture_face_user');
        $insert=$this->User->insert($data);
        if ($insert) {
            $this->modul->alert("Berhasil didaftarkan didalam sistem");
        } else {
            $this->modul->alert('f_error');
        }
    }

    function check_login_join(){
        // checkLogin dan code_room
        $email=$this->input->post('email_user');
        $pasword=$this->input->post('password_user');
        $code_room=$this->input->post("code_room");
        $pesan=get_msg('login');
        $user=$this->User->get_by("email_user",$email);
        if($user){
            if(password_verify($pasword,$user->password_user)){
                if($this->validate_time($code_room)){
                    $data['id']=$user->id;
                    $data['room']=$code_room;
                    $this->session->set_userdata($data);
                    redirect('absent/now');
                }
            }else{
                $this->modul->alert($pesan['password'],'gagal');
            }
        }else{
            $this->modul->alert($pesan['email'],'gagal');
        }
        // if true redirect ke halaman absen
    }

   /**
    * @function cari semua dengan id user dan code room yang diberi dosen untuk check apakah pernah dua kali mengabsen
    */
    function absent_now(){
        $picture_unknow=$this->input->post('picture_face_user');
        $id_user=$this->session->userdata('id');
        $code_room=$this->input->post('code_room');
        $schedule=$this->db->get_Where('tb_schedule',['id_user'=>$id_user,'code_room'=>$code_room])->result_array();
        if($schedule){
            $this->modul->alert("Sudah Pernah Mengabsen Tidak Bisa Mengabsen 2 kali",'gagal');
        }
        $face=$this->check_face($picture_unknow,$id_user);
        $distance=$face->jarak;
        if($face->status=='success'){
            $data['code_room']=$code_room;
            $data['description_scheduler']=$this->input->post('description_scheduler');;
            $data['picture_user']=$picture_unknow;
            $data['id_user']=$id_user;
            $this->Schedule->insert($data);
            $session_data['jarak']=$distance;
            $session_data['code_room']=$this->input->post('code_room');
            $this->session->set_userdata($session_data);
            redirect(base_url('finish/join'));
        }else{
            $this->modul->alert("Wajah Anda Tidak Sesuai Dengan Akun ini Tingkat Kecocokan adalah ".$distance,'gagal');
        }
      
    }

    function check_face($picture_unknow,$id_user){
        if(empty($picture_unknow)){
            $this->modul->alert("Foto diri harus ada",'gagal');
        }
        $user=$this->User->get($id_user);
        $localIP = getHostByName(getHostName());
        // link untuk post data ke python server di ip yang sesuai
        $link    = 'http://'.$localIP.':80/';
        $url     ='127.0.0.1:2528/checkFace';
        // $url     ='127.0.0.1:2528/Facedetection';
        // data yang di kirim
        $face    =array(
                    'Face_Know'=>$link.'aldi/uploads/IMG/'.str_replace(' ','',$user->picture_face_user),
                    'Face_Unknow'=>$link.'aldi/uploads/IMG/'.str_replace(' ','',$picture_unknow));
        // $face    =array(
        //             'Face_Know'=>$this->get_datalatih($id_user),
        //             'Face_Unknow'=>$link.'aldi/uploads/IMG/'.str_replace(' ','',$picture_unknow),
        //             'Url'=>$link);
        // kirim dengan method post dengan menggunakan curl
        $data=$this->postCURL($url,$face);
        // status dari yang sudah check oleh sistem
        $data=json_decode($data);
        return $data;
    }

    private function get_datalatih($id_user=null){
        $limit_datalatih=5;
        $query="SELECT * FROM `tb_schedule` WHERE dateinsert_schedule < CURRENT_TIMESTAMP AND id_user=$id_user LIMIT 1,$limit_datalatih";
        $data_latih=$this->db->query($query)->result();
        $str_data_latih='';
        foreach($data_latih as $item){
            $ganti_space=str_replace(' ','',$item->picture_user);
            $str_data_latih.=$ganti_space.'^';
        }
        return substr($str_data_latih,0,-1);
    }
    // curl post 
    public function postCURL($_url, $_param){

        $postData = '';
        //create name value pairs seperated by &
        foreach($_param as $k => $v) 
        { 
          $postData .= $k . '='.$v.'&'; 
        }
        rtrim($postData, '&');


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    

        $output=curl_exec($ch);

        curl_close($ch);
        if($output){
            return $output;
        }else{
            $this->modul->alert("Server Face Recognition Tidak Dihidupkan","gagal");
        }
    }
    private function validate_time($code_room){
        $room=$this->Room_model->get($code_room);
        $date_time_room=$room->schedule_room;
        $date_time_now=$this->input->post('now_input');
        $str_room=strtotime($date_time_room);
        $day_room=date('d',$str_room);
        $str_now=strtotime($date_time_now);
        $day_now=date('d',$str_now);
        $pesan=get_msg('room');
        if($day_room==$day_room){
            return true;
        }else if($str_now < $str_room){
            // echo $pesan['belum_terjadwal'];
            $this->modul->alert($pesan['belum_terjadwal'],'info');
        }else if($day_room<=$day_now){
            $this->modul->alert($pesan['tertutup'],'gagal');
        }  
    }
    public function change_password()
    {
        $id_scheduler = $this->session->userdata('id_scheduler');
        $password_lama = $this->input->post('passwordold');
        $password_baru = password_hash($this->input->post('passwordnew'), PASSWORD_BCRYPT);
        $data_petugas = $this->db->get_where('tb_scheduler', ['id_scheduler' => $id_scheduler])->row();
        if (password_verify($password_lama, $data_petugas->password_sheduler)) {
            $this->Scheduler->skip_validation();
            $update = $this->Scheduler->update($id_scheduler, ['password_sheduler' => $password_baru]);
            if ($update){
                $this->modul->alert("Succes Update Account");
            } else{
                $this->modul->alert('Fail Update', 'gagal');
            }
                

        } else {
            $this->modul->alert('Password Old wrong Please Input valid password', 'gagal');
        }
    }

    public function change_password_user()
    {
        $id_user = $this->session->userdata('id');
        $password_lama = $this->input->post('passwordold');
        $code_room=$this->input->post('code_room');
        $password_baru = password_hash($this->input->post('passwordnew'), PASSWORD_BCRYPT);
        $data_user = $this->db->get_where('tb_user', ['id' => $id_user])->row();
        if (password_verify($password_lama, $data_user->password_user)) {
            $this->User->skip_validation();
            $update = $this->User->update($id_user, ['password_user' => $password_baru]);
            if ($update){
                $this->modul->alert("Succes Update Account",'berhasil',base_url('join/'.$code_room));
            } else{
                $this->modul->alert('Fail Update', 'gagal');
            }
        } else {
            $this->modul->alert('Password Old wrong Please Input valid password', 'gagal');
        }
    }
    function room($id = null)
    {
        // delete when exist id
        if ($id) {
            $delete = $this->Room_model->delete($id);
            if ($delete) {
                $this->modul->alert("Success Deleted");
            } else {
                $this->modul->alert("Failed Deleted");
            }
        }
        $data['name_room'] = $this->input->post('name_room');
        $data['id_scheduler'] = $this->session->userdata('id_scheduler');
        $data['description_room	'] = $this->input->post('description_room');
        $data['share_room'] = $this->input->post('share_room');
        $data['detail_schedule_room'] = 'in';
        $data['schedule_room'] = $this->input->post('schedule_room');
        // edit and insert , edit when variable id it's exist
        $redirect = $this->input->post('redirect');
        
        $redirect = ($redirect=='on') ? $_SERVER['HTTP_REFERER'] : base_url('room/');
        if (isset($_POST['id'])) {
            $id = $this->input->post('id');
            $this->Room_model->skip_validation();
            $action = $this->Room_model->update($id, $data);
            $message = "Success Update";
            if ($action) {
                $this->modul->alert($message, 'berhasil', $redirect);
            } else {
                $this->modul->alert('f_error');
            }
        } else {
            $data['code_room'] = $this->generate_code();
            $action = $this->Room_model->insert($data);
            $message = "Success Inserting Data";
            if ($action) {
                $this->modul->alert($message, 'berhasil', $redirect);
            } else {
                $this->modul->alert('f_error');
            }
        }
   
    }

    private function generate_code()
    {

        $code_room = $this->random_str(7, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $room = $this->Room_model->get($code_room);
        if ($room) {
            $code_room = $this->generate_code();
        } else {
            return $code_room;
        }
    }
    private function random_str(int $length = 64,string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}




/* End of file Sistem.php */
