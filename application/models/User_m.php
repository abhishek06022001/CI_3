<?php
class User_m extends CI_Model
{
    protected $users_table = 'users_t';
    protected $role_permissions_table = 'role_permissions_t';
    protected $roles_table = 'roles_t';
    protected $user_permissions_table = 'user_permission_t';
    public function get_permission_table_data()
    {
        $query = $this->db->get_where($this->role_permissions_table, array('isDeleted' => 0));
        return $query->result_array();
    }
    public function get_user_table_data()
    {
        $query = $this->db->get_where($this->users_table, array('isDeleted' => 0));
        return $query->result_array();
    }
    public function get_role_table_data($role_id="")
    {  
        $condition = array('isDeleted' => 0);
        if($role_id != ""){
            $condition['role_id']= $role_id;
        }
        $query = $this->db->get_where($this->roles_table, $condition);
        
        return $query->result_array();
    }
    public function get_permissions($user_id){
        $query = $this->db->get_where($this->user_permissions_table,array('user_id'=>$user_id));
        $result = $query->result_array();
        $data_arr= array();
        foreach($result as $key => $res){
            /// key 0 res  is array 
            $index = $res['menu_id'];
            $data_arr[$index][$res['permission']]= 1;
        }
        // echo "<pre>";print_r($data_arr);echo "</pre>";exit; 
        return $data_arr;

        
    }
    public function  getRoleId($user_id)
    {
        $query = $this->db->get_where($this->users_table,array('user_id'=>$user_id));
        // echo "<pre>";print_r($query);echo "</pre>";exit; 
        $result = $query->result_array();
        // echo "<pre>";print_r( $result[0]['role_id']);echo "</pre>";exit; 
        $ans = $result[0]['role_id'];
        return $ans;
    }
    public function getAllData()
    {
        $l = 'users_t';
        $r = 'roles_t';
        $sql = "select $l.username,$l.user_id ,$l.Email ,$r.role from $l left join $r on $l.role_id = $r.role_id
        where $l.isDeleted = 0 
        ";
        $result = $this->db->query($sql);
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    public function saveData($data, $user_id)
    {    
        // echo "<pre>";print_r($data);"</pre>";exit;
        if ($user_id != "") {
            // echo "<pre>";print_r($user_id);echo "</pre>";exit;
            $this->db->where('user_id', $user_id);
            $this->db->update($this->users_table, $data);
        } else {
            $this->db->insert($this->users_table, $data);
        }
    }
    public function get_data_by_id ($user_id){
        $query = $this->db->get_where($this->user_permissions_table, array('user_id'=>$user_id));
        if($query->num_rows() > 0 ){
            return $query->row_array();
        }else {
            return null;
        }
    }
    public function deleteUser($user_id){
        $data = array(
            'isdeleted' => 1
        );
        $this->db->where('user_id', $user_id);
        $this->db->update($this->users_table, $data);
    }
    public function ifUserPermContains($user_id)
    {
        $query = $this->db->get_where($this->user_permissions_table,array('user_id '=>$user_id));
        $result_array = $query->result_array();
    if (count($result_array) > 0) {
        return true;
    } else {
        return false;
    }
    }
    public function deletePermission($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->delete($this->user_permissions_table);
    }
    public function savePermission($data){
        $user_id = $data['user_id'];
        foreach($data['permission'] as $key=>$value)
        {
            $menu_id = $key;
            foreach($value as $arr)
            {
                // echo "<pre>"; print_r($arr);"</pre>";exit;
                $insert_data= array
                (
                    'user_id' => $user_id,
                    'permission' => $arr,
                    'menu_id'=>$key
                );
                $this->db->insert($this->user_permissions_table,$insert_data);
            }
        }
    }
    
   
}
