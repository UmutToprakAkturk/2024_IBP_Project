<?php

class SignC extends CI_Controller{


    public function index(){
        $semail= $this->input->post('sigemail');
        $spass= $this->input->post('sigpass');
        $sroll = $this->input->post('sigrole');
        if($sroll !== 'admin' && $sroll !== 'user'){
            redirect(base_url('Welcome/errort'));
        }
        $data = array(
            'email' => $semail,
            'password' => $spass,
            'role' => $sroll
        );
        $result= $this->db->insert('users', $data);
        if ($result){
            redirect(base_url('Welcome'));
        }
    }
}