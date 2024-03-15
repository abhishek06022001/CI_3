<?php
use App\Models\Login_m;
class User_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->load->library('session');
        // $this->load->library('input');
        if ($this->session->userdata('user_id') == null) {
            $this->load->view('login.php');
        }
    }
    public function index()
    {
        return $this->load->view('user_m');
    }
}
