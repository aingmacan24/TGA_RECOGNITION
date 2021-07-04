<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_c extends CI_Controller {

    public function index()
    {
        $data['title']="Dashboard";
        $id_scheduler=$this->session->userdata('id_scheduler');
        $data['room']=$this->db->get_where('tb_scheduler',['id_scheduler'=>$id_scheduler])->result();
        view('content.room.index',$data);

    }

    public function add(){
        $data['room']=null;
        $data['title']="Form add Room";
        view('content.room.form',$data);
    }

    public function edit($code_room){
        $data['title']="Form Edit Room";
        $data['room']=$this->Room_model->get($code_room);
        view('content.room.form',$data);
    }
    public function detail($code){
        $code=$this->Room_model->get($code);
        $data['title']="Detail";
        $data['code']=$code;
        $data['schedule']=$this->Schedule->where_room($code->code_room);
        view('content.room.detail',$data);
    }
    public function join_room($code){
        $data['room']=$this->Room_model->get($code);
        view('content.join.login',$data);
    }
    public function absent(){
        $id_user=$this->session->userdata('id');
        $data['code_room']=$this->session->userdata('room');
        $data['user']=$this->User->get($id_user);
        view('content.join.absensi',$data);
    }
    public function finish(){
        $code_room=$this->session->userdata('code_room');
        $room=$this->Room_model->get($code_room);
        $data['jarak']=$this->session->userdata('jarak');
        $data['category']=$room->category_share;
        $data['share_room']=$room->share_room;
        view('content.join.finish',$data);
    }
    
}

/* End of file Room_c.php */

?>