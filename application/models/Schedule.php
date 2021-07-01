<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends MY_Model {
   
        public $table = 'tb_schedule';
        public $primary_key = 'id_schedule';
        public $validate ;
        public function __construct() {
            parent::__construct();
            $this->validate = $this->validate_Data();
        }

        function where_room($code_room){
                return $this->db->join('tb_user','tb_schedule.id_user=tb_user.id')->where('code_room',$code_room)->get($this->table)->result();
        }
        function validate_Data(){
                return array(
                     array( 'field' => 'picture_face_user', 
                            'label' => get_msg('picture_face_user'),
                            'rules' => 'required'),
                );
             }
    

}

/* End of file Schedule.php */


?>