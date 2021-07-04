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
        $this->form_validation->set_rules('name_sheduler',get_msg('name_sheduler'),'required');
        $this->form_validation->set_rules('password',get_msg('password'),'required|min_length[8]|max_length[25]|callback_check_strong_password');
        $this->form_validation->set_rules('password_confirm',get_msg('password_confirm'),'trim|required|matches[password]');
        $this->form_validation->set_rules('email_sheduler',get_msg('email_sheduler'),'required|valid_email|is_unique[tb_scheduler.email_sheduler]');
        $this->form_validation->set_rules('nickname_scheduler',get_msg('nickname_scheduler'),'required');
        $this->Scheduler->skip_validation();
        if ($this->form_validation->run()) {
            $register=$this->Scheduler->insert($data);
            $this->modul->alert(get_msg("register_success"),"berhasil","/login");
        }else{
            $this->modul->alert('f_error');
        }
    }
    function register_home(){
      
            view('content.home_register');
       
    }
    public function check_strong_password($str)
    {
       if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
         return TRUE;
       }
       $this->form_validation->set_message('check_strong_password', 'Bidang kata sandi harus berisi setidaknya satu huruf dan satu digit serta.');
       return FALSE;
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('Login');
        
    }
}

/* End of file Login.php */
