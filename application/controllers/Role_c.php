<?php
use App\Models\Login_m;
class Role_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_m');
        $this->load->library('session');
        // $this->load->library('input');
        $this->load->model('Feature_m');
        if ($this->session->userdata('user_id') == null) {
            $this->load->view('login.php');
        }
    }
    public function index()
    {  
        $data['arr'] = $this->Role_m->getrole();
        // $data['arr2']= $this->Role_m->getperm( $data['arr']);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        return $this->load->view('Role',$data);
    }  
    public function add($role_id=''){
       
        $data['features_data'] = $this->Feature_m->getdata();
        echo "<pre>";print_r($data);echo "</pre>";exit;

        if($role_id!=''){
            $data['role_data']       = $this->Role_m->get_role_data($role_id);
            echo "<pre>";print_r($data);echo "</pre>";exit;
            $data['role_permissions'] = $this->Role_m->get_role_permissions($role_id);
            echo "<pre>";print_r($data);echo "</pre>";exit;
        }
        echo "<pre>";print_r($data);echo "</pre>";exit;
     // fill the data from the db using the db 
        return $this->load->view('role_m' ,$data,$role_id);
    }
    public function addrole(){
       // echo "<pre>";print_r($_POST);echo "</pre>";exit;  
        //now have got the data 
        // now after gettinf the data extract the role and add role name in the db  
        $data['role'] = $this->input->post('role');
        $data['permission'] = $this->input->post('permission');
        $allowed_columns = array('role');
        $insert_data = array_intersect_key($data, array_flip($allowed_columns));
        $role_id = $this->Role_m->save($insert_data);
        // echo "<pre>";print_r($role_id);echo "</pre>";exit;
        $this->Role_m->savePermission($data,$role_id);
        redirect('Role_c');
        // extract the permission array and for the menu id add the respective data for the role id 
    }
    public function deleteRole(){
        $role_id= $this->input->post('role_id');
        // and delete the other table as well 
        // echo "<pre>";print_r($role_id);echo "</pre>";exit;
        $this->Role_m->deletedata($role_id);
        // 
    }
    public function edit(){
        $role_id= $this->input->post('role_id');
        // echo "<pre>";print_r($role_id);echo "</pre>";exit;
        $this->add($role_id);

    }
}
