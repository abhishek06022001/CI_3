<?php
use App\Models\Login_m;
class User_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_m');
        $this->load->model('User_m');
        $this->load->model('Role_m');
        $this->load->library('upload');
        // $this->load->library('input');
        if ($this->session->userdata('user_id') == null) {
            $this->load->view('login.php');
        }
    }
    public function index()
    {   
        /**
         * now get data from two tables 
         * one table get data from  users_t and give all the users list 
         * have the role_id from the $session and store it in a variable 
         *
         */
        $data['role'] = $this->User_m->get_role_table_data();
        $data['user']= $this->User_m->get_user_table_data();
        $data['permissions']= $this->User_m->get_permission_table_data();
        $data['joined']= $this->User_m->getAllData();
        
        // echo "<pre>";print_r($data['joined']);echo "</pre>";exit;
        return $this->load->view('user_management',$data);
    }
    public function get_roles(){
        $data['role'] = $this->User_m->get_role_table_data();
        echo json_encode($data);
        
    }
}
