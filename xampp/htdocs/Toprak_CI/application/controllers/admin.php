<?php 

 class Admin  extends CI_Controller{


    public function index(){
        $logemail = $this->input->post('logemail');
        $logpass = $this->input->post('logpass');
    
        
        $this->db->where('email', $logemail);
        $this->db->where('password', $logpass);
        $query = $this->db->get('users');


        $this->db->where('role', 'user');
        $users_query = $this->db->get('users');
        
        /*$this->db->where('recipientmail', $logemail);
        $query1 = $this->db->get('your_table_name');
        $row1 = $query1->result();
        mesaj yollama kısmı*/

        $data = array();
        $data['users'] = $users_query->result();
    
        if ($query->num_rows() > 0) {
            $data['user'] = $query->row();
            if($data['user']->role==='admin'){
                $this->load->view('index', $data);
            }
            else{
                $this->load->view('indexuser', $data);
            }
        } else {
            // Kullanıcı bulunamadı
            redirect(base_url('Welcome/errort'));
        }
    }
    public function update(){
        $logemail2=$this->input->post('logemail2');
        $logemail3=$this->input->post('logemail3');
        $logpass3 = $this->input->post('logpass3');

        $data = array(
            'email' => $logemail3,
            'password' => $logpass3,
        );
        $this
        ->db
        ->where('email',$logemail2 )
        ->update('users',$data);

        $this->load->view('update');
    }
}