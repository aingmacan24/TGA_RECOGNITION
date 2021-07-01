<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        if(isset($_SESSION['id_scheduler'])){
            redirect('room','refresh');
        }
        view('content.login');
    }
    function auth()
    {
        if(empty($_POST)){
            show_404();
            exit();
        }
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $login=$this->Scheduler->get_by('email_sheduler',$email);
        $pesan=get_msg('login');
        if ($login) {
            if (password_verify($password, $login->password_sheduler)) {
                $data['id_scheduler']=$login->id_scheduler;
                $data['name_sheduler']=$login->name_sheduler;
                $data['nickname_scheduler']=$login->nickname_scheduler;
                $data['email_sheduler']=$login->email_sheduler;
                $this->session->set_userdata($data);
                redirect('room');
            } else {
                $this->modul->alert($pesan['password'],'gagal');
            }
        } else {
            $this->modul->alert($pesan['email'],'gagal');
        }
    }
    function register($as){
        if($as=='teacher'){
            view('content.register');
        }else if($as=='students'){
            view('content.register_students');
        }else{
            show_404();
        }
    }
    function register_proses(){
        $data['name_sheduler']=$this->input->post('name_sheduler');
        $data['nickname_scheduler']=$this->input->post('nickname_scheduler');
        $data['email_sheduler']=$this->input->post("email_sheduler");
        $password=$this->input->post('password');
        $data['password_sheduler']=password_hash($password,PASSWORD_BCRYPT);
        $register=$this->Scheduler->insert($data);
        if($register){
            $this->modul->alert(get_msg("register_success"),"berhasil","/login");
        }else{
            $this->modul->alert('f_error');
        }
    }
    function register_home(){
      
            view('content.home_register');
       
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('Login');
        
    }
}

/* End of file Login.php */
