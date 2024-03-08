<?php
class Logout_c extends CI_Controller{
    public function index(){ 
        $this->load->library('session');     
        $this->session->sess_destroy();
        redirect('login_c');

    }
}
?>