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
        $this->load->model('Feature_m');
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
        $current_url = get_current_url();
        $path = parse_url($current_url, PHP_URL_PATH);
        $pathParts = explode('/', $path);
        $ci3Index = array_search('ci3', $pathParts);
        $firstElementAfterCi3 = $pathParts[$ci3Index + 1];
      
        // $href = $current_url
        $data['menu'] = getDatabyHref($firstElementAfterCi3);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $data['role'] = $this->User_m->get_role_table_data();
        $data['user'] = $this->User_m->get_user_table_data();
        $data['permissions'] = $this->User_m->get_permission_table_data();
        $data['joined'] = $this->User_m->getAllData();
        // echo "<pre>";print_r($data['user']);echo "</pre>";exit;
        return $this->load->view('user_management', $data);
    }
    public function view_user_permissions($user_id = '')
    {
        $data['features_data'] = $this->Feature_m->getdata();
        $role_id = $this->User_m->getRoleId($user_id);

        $condition = $this->User_m->ifUserPermContains($user_id);

        if ($condition) {

            $data['user_perm'] = $this->User_m->get_permissions($user_id); //  got 
        } else {

            $data['user_perm'] = $this->Role_m->get_role_permissions($role_id);
        }
        $data['user_id'] = $user_id;

        return $this->load->view('user_permission', $data);
    }
    public function get_roles()
    {
        $data['role'] = $this->User_m->get_role_table_data();
        // echo "<pre>";print_r(   $data['role']);echo "</pre>";exit;
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
            'username' => $username,
            'Email' => $Email,
            'role_id' => $role_id,
            'password' => $new_password,
            'user_id' => $user_id
        );
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
        $user_id = $this->input->post('ID'); // ok
        $data['user_arr'] = $this->User_m->get_data_by_id($user_id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;  
        $role_id =$this->User_m->getRoleId($user_id);
        // echo "<pre>";print_r($role_id);echo "</pre>";exit;
        $data['roles_arr'] = $this->User_m->get_role_table_data($role_id);
        $data['user_data'] = $this->User_m->get_user_table_data($user_id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;  
        echo json_encode($data);
    }
    public function delete_user()
    {
        $user_id = $this->input->post('ID');
        $this->User_m->deleteUser($user_id);
    }
    public function editpermisson()
    {
        $hiddenUserId = $this->input->post('hiddenRoleId');
        // $this->User_m->deletePermissionData($hiddenUserId); // have to make 
        // echo "<pre>";
        // print_r($hiddenUserId);
        // echo "</pre>";
        // exit;
        ///now insert the data into the respective tables but how             
        // $data['role'] = $this->input->post('role');
        $data['user_id'] = $this->input->post('hiddenRoleId');
        $data['permission'] = $this->input->post('permission');
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->User_m->deletePermission($hiddenUserId);
        $this->User_m->savePermission($data);
        // $allowed_columns = array('role', 'role_id');
        // // have done roletable update here  now permission_table update now 
        // $insert_data = array_intersect_key($data, array_flip($allowed_columns));
        // $this->Role_m->update($insert_data);
        // $this->Role_m->savePermission($data, $hiddenRoleId);
        redirect('DashBoard');
    }
    // now after gettinf the data extract the role and add role name in the db  
}
