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
        $current_url = get_current_url();
        $path = parse_url($current_url, PHP_URL_PATH);
        $pathParts = explode('/', $path);
        $ci3Index = array_search('ci3', $pathParts);
        $firstElementAfterCi3 = $pathParts[$ci3Index + 1];
        // $href = $current_url
        $data['menu'] = getDatabyHref($firstElementAfterCi3);
        // $data['rol']= $_SESSION['role_id'];
        return $this->load->view('Role', $data);
    }
    public function add($role_id = '')
    {     // function is   
        $data['features_data'] = $this->Feature_m->getdata();
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        /** * got the data here from the feature sidebar and number  is index and the array is the feature  table array  */
        if ($role_id != '') {
            $data['role_data']       = $this->Role_m->get_role_data($role_id); // got the guest / admin ka table details here in this case according to role_id  
            $data['role_permissions'] = $this->Role_m->get_role_permissions($role_id); //  got the specific role permission while table here  where index is the menu id amd inside that is an array with key as action and the permission id as the value 
        }
        return $this->load->view('role_permission_edit', $data); // filling all the data and the specific role id into the view !
    }
    public function addrole()
    {
        $hiddenRoleId = $this->input->post('hiddenRoleId');
        if ($hiddenRoleId == '') {
            $data['role'] = $this->input->post('role');
            $data['permission'] = $this->input->post('permission');
            $allowed_columns = array('role');
            $insert_data = array_intersect_key($data, array_flip($allowed_columns));
            $role_id = $this->Role_m->save($insert_data);
            // echo "<pre>";print_r("normal add");echo "</pre>";exit;
            $this->Role_m->savePermission($data, $role_id);
        } else {
            // pehle delete karo and for that id insert karo
            $this->Role_m->deletedataa($hiddenRoleId);
            ///now insert the data into the respective tables but how             
            $data['role'] = $this->input->post('role');
            $data['role_id'] = $this->input->post('hiddenRoleId');
            $data['permission'] = $this->input->post('permission');
            $allowed_columns = array('role', 'role_id');
            // have done roletable update here  now permission_table update now 
            $insert_data = array_intersect_key($data, array_flip($allowed_columns));
            $this->Role_m->update($insert_data);
            $this->Role_m->savePermission($data, $hiddenRoleId);
        }
        // now after gettinf the data extract the role and add role name in the db  
        redirect('role-management');
    }
    public function deleteRole()
    {
        $role_id = $this->input->post('role_id');
        // and delete the other table as well 
        $this->Role_m->deletedata($role_id);
        // 
    }
    public function edit()
    {
        $role_id = $this->input->post('role_id');
        $this->add($role_id);
    }
}
