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
        /**
         * got the data here from the feature sidebar and number  is index and the array is the feature  table array 
         */
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        if($role_id!=''){
            $data['role_data']       = $this->Role_m->get_role_data($role_id);
            // echo "<pre>";print_r($data);echo "</pre>";exit;
            // got the guest / admin ka table details here in this case according to role_id  
            $data['role_permissions'] = $this->Role_m->get_role_permissions($role_id);
            //  got the specific role permission while table here  where index is the menu id amd inside that is an array with key as action and the permission id as the value 
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        /**
         * role table data => 1 row  data from the table by row
         * feature table data => whole data from the table 
         * permission modified data => Modified table 
         * [menu__id]=>Array(
         *      [Permission(Change/Update/Delete/View)]=>Permission Id ;
         * )
         */
        // echo "<pre>";print_r($data);echo "</pre>";exit; 
        // ok sabka individual individual data  table hain 
        return $this->load->view('role_m' ,$data);// filling all the data and the specific role id into the view !
    }
    
    public function addrole(){
        $hiddenRoleId = $this->input->post('hiddenRoleId');

        
        if($hiddenRoleId == ''){
            $data['role'] = $this->input->post('role');
            $data['permission'] = $this->input->post('permission');
            $allowed_columns = array('role');
            $insert_data = array_intersect_key($data, array_flip($allowed_columns));
            $role_id = $this->Role_m->save($insert_data);
            // echo "<pre>";print_r($role_id);echo "</pre>";exit;
            $this->Role_m->savePermission($data,$role_id);
        }else{
            // pehle delete karo and for that id insert karo
            $this->Role_m->deletedataa($hiddenRoleId);
            echo "<pre>";print_r($hiddenRoleId);echo "</pre>";exit;
            $data['role'] = $this->input->post('role');
            $data['permission'] = $this->input->post('permission');
            $allowed_columns = array('role');
            $insert_data = array_intersect_key($data, array_flip($allowed_columns));
            $role_id = $this->Role_m->save($insert_data);
            // echo "<pre>";print_r($role_id);echo "</pre>";exit;
            $this->Role_m->savePermission($data,$role_id);
            
        }
        // now after gettinf the data extract the role and add role name in the db  
       

        return $this->load->view('role_m' ,$data);
        // redirect('Role_c');
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
