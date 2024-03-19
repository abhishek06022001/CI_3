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
}
?>