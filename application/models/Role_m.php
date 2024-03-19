<?php
class Role_m extends CI_Model
{
    protected $roletable = 'roles_t';
    protected $menutable = 'menu_t';
    protected $rolepermissiontable='role_permissions_t';
    protected $usertable = 'users_t';
    public function save($data){
        //echo "<pre>";print_r($data);echo "</pre>";exit;  
        $this->db->insert($this->roletable,$data);
        $insert_id= $this->db->insert_id();
        // echo "<pre>";print_r($insert_id);echo "</pre>";exit; 
        return $insert_id;
    } 
    public function savePermission($data , $role_id ){
        // echo "<pre>";print_r($data);echo "</pre>";exit; 
        // echo "<pre>";print_r($role_id);echo "</pre>";exit;
        foreach($data['permission'] as $key=>$value){
            foreach($value as $arr){
                $insert_data= array(
                    'role_id' => $role_id,
                    'permission' => $arr,
                    'menu_id'=>$key
                );
                $this->db->insert($this->rolepermissiontable,$insert_data);
            }
        }
    }
    public function getrole(){
        $query = $this->db->get_where($this->roletable,array('isDeleted'=>0));
        return $query->result_array();
    }
    public function deletedata($role_id){
        $data = array(
            'isDeleted' => 1
        );
        // Update rolepermissiontable
        $this->db->where('role_id', $role_id);
        $this->db->update($this->rolepermissiontable, $data);
        // Update roletable
        $this->db->where('role_id', $role_id);
        $this->db->update($this->roletable, $data);
    }
    public function deletedataa($role_id){
   
        // Update rolepermissiontable
        $this->db->where('role_id', $role_id);
        $this->db->delete($this->rolepermissiontable);
        // Update roletable
        $this->db->where('role_id', $role_id);
        $this->db->delete($this->roletable);
    }

    public function get_role_data($role_id){
        $query = $this->db->get_where($this->roletable,array('role_id '=>$role_id));
        return $query->row_array();
    }

    public function get_role_permissions($role_id){
        $query = $this->db->get_where($this->rolepermissiontable,array('role_id '=>$role_id));
       // echo "<pre>";print_r($query);echo "</pre>";exit; 
        $result = $query->result_array();
        // echo "<pre>";print_r($result);echo "</pre>";exit; 
        $data_arr = array();
        foreach($result as $key => $res){
            $ind = $res['menu_id'];
            $data_arr[$ind][$res['permission']] = $res['permission_id'];
            // echo "<pre>";print_r($data_arr);echo "</pre>";
            // echo"<pre>" ; print_r("iteration"); echo "</pre>";
        }
        // exit;
        /**
         * got the menu id and the array ( permission  => permission_id ) so it will get clubbed for the respective menu_id 
         */
       
        return $data_arr;
    }
}
?>