<?php

class Login_m extends CI_Model
{
    protected $table = 'users_t';
    public function get_user_by_email($email){
        $query = $this->db->get_where($this->table,array('username'=>$email));
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return null;
        }
    }
    public function fetch_pass($session_id){
        $fetch_pass=$this->db->query("select * from users_t where user_id='$session_id'");
     	$res=$fetch_pass->row();
        return $res->password;
        //gotten the encoded password
    }
    public function change_pass($session_id,$new_pass)
	{
	    $update_pass=$this->db->query("UPDATE users_t set password='$new_pass'  where user_id='$session_id'");
	}
}
?>