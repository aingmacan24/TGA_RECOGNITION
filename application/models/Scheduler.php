<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scheduler extends MY_Model {
    public $table = 'tb_scheduler';
    public $primary_key = 'id_scheduler';
    public $validate ;
    public function __construct() {
        parent::__construct();
        $this->validate = $this->validate_Data();
    }
    function validate_Data(){
        return array(
             array( 'field' => 'name_sheduler', 
                    'label' => get_msg('name_sheduler'),
                    'rules' => 'required'),
              array( 'field' => 'password', 
                    'label' => get_msg('password_sheduler'),
                    'rules' => 'required'),
             array( 'field' => 'nickname_scheduler',
                    'label' => get_msg('nickname_scheduler'),
                    'rules' => 'required'),
              array( 'field' => 'email_sheduler',
                    'label' => get_msg('email_sheduler'),
                    'rules' => 'required|valid_email|is_unique[tb_scheduler.email_sheduler]' ),
              array( 'field' => 'password_confirm',
                    'label' => get_msg('password_confirm'),
                    'rules' => 'trim|required|matches[password]'),
        );
     }
}

/* End of file Scheduler.php */

?>