<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends MY_Model {
    public $table = 'tb_room';
    
    public $primary_key = 'code_room';

    public $validate ;
    public function __construct() {
        parent::__construct();
        $this->validate = $this->validate_Data();
    }
    function count_room(){
        $id_user=$this->session->userdata('id_scheduler');
        $query=$this->db->where('id_scheduler',$id_user)->get($this->table)->result_array();
        return count($query);
    }

    function connection_person(){
        $id_user=$this->session->userdata('id');
        $query=$this->db->join('tb_schedule','tb_room.code_room=tb_schedule.code_room')->where('id_user',$id_user)->get($this->table)->result_array();
        return count($query);
    } 
    
    function validate_Data(){
       return array(
            array( 'field' => 'name_room', 
                   'label' => get_msg('name_room'),
                   'rules' => 'required'),
    
            array( 'field' => 'description_room',
                   'label' => get_msg('description_room'),
                   'rules' => 'required' ),
    
            array( 'field' => 'share_room',
                   'label' => get_msg('share_room'),
                   'rules' => 'required' ),
    
            array( 'field' => 'schedule_room',
                   'label' => get_msg('schedule_room'),
                   'rules' => 'required' ),
       );
    }
    
}

/* End of file ModelName.php */


?>