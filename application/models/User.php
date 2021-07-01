<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Model {
    public $table = 'tb_user';
    public $primary_key = 'id';
    public $validate ;
    public function __construct() {
        parent::__construct();
        $this->validate = $this->validate_Data();
    }
    function validate_Data(){
        return array(
             array( 'field' => 'identity_user', 
                    'label' => get_msg('identity_user'),
                    'rules' => 'required|is_unique[tb_user.identity_user]'),
     
             array( 'field' => 'name_user',
                    'label' => get_msg('name_user'),
                    'rules' => 'required' ),
     
             array( 'field' => 'gender_user',
                    'label' => get_msg('gender_user'),
                    'rules' => 'required' ),
                    
            array( 'field' => 'email_user',
                    'label' => get_msg('email_user'),
                    'rules' => 'required|valid_email|is_unique[tb_user.email_user]' ),
            array( 'field' => 'picture_face_user',
                    'label' => get_msg('picture_face_user'),
                    'rules' => 'required' ),
            array( 'field' => 'password',
                    'label' => get_msg('password_user'),
                     'rules' => 'required'),
            array( 'field' => 'password_confirm',
                    'label' => get_msg('password_confirm'),
                    'rules' => 'required|matches[password]' ),
           
        );
     }

}

/* End of file User.php */



?>