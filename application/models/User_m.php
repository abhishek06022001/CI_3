<?php
class User_m extends CI_Model
{
    protected $users_table = 'users_t';
    protected $role_permissions_table = 'role_permissions_t';
    protected $roles_table = 'roles_t';
    public function get_permission_table_data(){
        $query = $this->db->get_where($this->role_permissions_table, array('isDeleted'=>0));
        return $query->result_array();
    }
    public function get_user_table_data(){ 
        $query = $this->db->get_where($this->users_table, array('isDeleted'=>0));
        return $query->result_array();
    }
    public function get_role_table_data(){
        $query = $this->db->get_where($this->roles_table, array('isDeleted'=>0));
        return $query->result_array();
    }
    public function getAllData(){
        $l = 'users_t';
        $r = 'roles_t';
        $sql = "select $l.username,$l.user_id ,$l.Email ,$r.role from $l left join $r on $l.role_id = $r.role_id   ";
        $result = $this->db->query($sql);
        if ($result) {
            return $result->result_array(); 
        } else {
            return array(); 
        }
    }
}
?>