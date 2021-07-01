<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    function registeruser(){
        $input=$this->input;
        $data['identity_user']=$input->post('identity_user');
        $data['id_device']=$input->post('id_device');
        $data['name_device']=$input->post('name_device');
        $data['name_user']=$input->post('name_user');
        $data['gender_user']=$input->post('gender_user');  
        $data['email_user']=$input->post('email_user'); 
        $data['password_user']=password_hash($input->post('password_user'),PASSWORD_BCRYPT);
        $face_picture=$this->modul->uploadimg('uploads/IMG');
        $data['picture_face_user']=$face_picture; 
        $insert=$this->User->insert($data,true);
        if($insert){
            $msg['status']=1;
            $msg['msg']="success registered";
        }else{
            $msg['status']=0;
            $msg['msg']="failed registered or  indenty user avaible";
        }
        echo json_encode($msg);
        
    }

    function loginauth(){
        $password=$this->input->post("password");
        $email=$this->input->post("email");
        $user=$this->User->get_by('email',$email);
        if($user){
            if(password_verify($password,$user->password)){
                $msg['status']=1;
                $msg['msg']="Success Full Login";
            }else{
                $msg['status']=0;
                $msg['msg']="Wrong Password";
            }
        }else{
            $msg['status']=0;
            $msg['msg']="Wrong Email or Email not Registered";
        }
        echo json_encode($msg);
    }

    function listroom(){
        $indentity_user=$this->input->post('indentity_user');
        $room=$this->Detail_room->with('Room')->get_by('indentity_user',$indentity_user);
        if($room){
            $msg['status']=1;
            $msg['data']=$room;
        }else{
            $msg['status']=0;
        }
        echo  json_encode($msg);
    }

    function user_by(){
        $indentity_user=$this->input->post('indentity_user');
        $user=$this->User->get_by('indentity_user',$indentity_user);
        if($user){
            $msg['status']=1;
            $msg['data']=$user;
        }else{
            $msg['status']=0;
        }
        echo json_encode($msg);
    }

    function registerroom(){
        $data['indentity_user']=$this->input->post('indentity_user');
        $data['code_room']=$this->input->post('code_room');
        $insert_room=$this->Detail_room->insert($data);
        $msg['status']=($insert_room) ? 1:0;
        echo json_encode($msg);
    }

    

  


}

/* End of file Api.php */


?>