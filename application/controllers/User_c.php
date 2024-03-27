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
        $data['user'] = $this->User_m->get_user_table_data();
        $data['permissions'] = $this->User_m->get_permission_table_data();
        $data['joined'] = $this->User_m->getAllData();
        // echo "<pre>";print_r($data['user']);echo "</pre>";exit;
        return $this->load->view('user_management', $data);
    }
    public function get_roles()
    {
        $data['role'] = $this->User_m->get_role_table_data();
        echo json_encode($data);
    }
    public function add_user()
    {
        // get 3 data name role id and email 
        $username = $this->input->post('username');
        $Email = $this->input->post('Email');
        $role_id = $this->input->post('role_id');
        $user_id = $this->input->post('user_id');
        $new_password = $this->generate_password();
        $new_password = base64_encode($new_password);
        $data = array(
            'username'=> $username,
            'Email' => $Email,
            'role_id' => $role_id,
            'password' => $new_password,
            'user_id' =>$user_id
        );
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->User_m->saveData($data, $user_id);
    }

    public function generate_password()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ($i = 0; $i < 5; $i++) {
            $password .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $password;
    }
    public function get_data_by_id()
    {
        $user_id = $this->input->post('ID');// ok
        $data['user_arr'] = $this->User_m->get_data_by_id($user_id);
        $role_id = $data['user_arr']['role_id'];
        $data['roles_arr'] = $this->User_m->get_role_table_data($role_id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        echo json_encode($data);
    }
    public function delete_user(){
        $user_id = $this->input->post('ID');
        $this->User_m->deleteUser($user_id);
    }

}
