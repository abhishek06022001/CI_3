<?php
class Role_m extends CI_Model
{
    protected $roletable = 'roles_t';
    protected $menutable = 'menu_t';
    protected $rolepermissiontable='role_permissions_t';
    protected $usertable = 'users_t';
    public function save($data){
      
        $this->db->insert($this->roletable,$data);
        $insert_id= $this->db->insert_id();
  
        return $insert_id;
    } 
    public function update($data){
    
        $this->db->where('role_id', $data['role_id']);
        $rolename = $data['role'];
        $this->db->update($this->roletable,array('role'=>$rolename));
    
    } 
    public function savePermission($data , $role_id ){
   
    
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

        $this->db->where('role_id', $role_id);
        $this->db->update($this->rolepermissiontable, $data);
     
        $this->db->where('role_id', $role_id);
        $this->db->update($this->roletable, $data);
    }
    public function deletedataa($role_id){
   
        
        $this->db->where('role_id', $role_id);
        $this->db->delete($this->rolepermissiontable);
        
    }

    public function get_role_data($role_id){
        $query = $this->db->get_where($this->roletable,array('role_id '=>$role_id));
        return $query->row_array();
    }

    public function get_role_permissions($role_id){
        $query = $this->db->get_where($this->rolepermissiontable,array('role_id '=>$role_id));
    
        $result = $query->result_array();
  
        $data_arr = array();
        foreach($result as $key => $res){
            $ind = $res['menu_id'];
            $data_arr[$ind][$res['permission']] = $res['permission_id'];
          
        }
       
       
        return $data_arr;
    }
 
  
}
?>