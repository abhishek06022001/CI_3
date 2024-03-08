<?php

class Profile_m extends CI_Model
{  protected $citiestable = 'cities_m';
    protected $countriestable = 'countries_m';
    protected $statestable = 'states_m';
    // protected $userstable = 'users_t';
    protected $profiletable = 'profile_t';
    protected $imagetable = 'image';

    public function get_user_data_by_id($user_id){
        $query = $this->db->get_where($this->profiletable, array('user_id' => $user_id));
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return null;
        }
    }
    public function updatedata($user_id,$data){
        //echo "<pre>";print_r($user_id);echo "</pre>";exit;
        // Where condition based on user_id
        // $this->db->where('user_id', $user_id);      
        // // Perform the update
        // $this->db->update('profile_t', $data);
        // redirect(base_url('profile'));
        $this->db->where('user_id',$user_id);
        $res= $this->db->get('profile_t');
        if($res ->num_rows()>0){
            $this->db->where('user_id', $user_id);
            $this->db->update('profile_t', $data);
        }else{
            //echo "<pre>";print_r($user_id);echo "</pre>";exit;
            $this->db->insert('profile_t', $data);
        }
        redirect(base_url('profile'));
    }
    public function getCountries( ){
        $query = $this->db->get_where($this->countriestable);
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return null;
        }
    }
    public function getStatesbyCountryById($id){
        $query = $this->db->get_where($this->statestable, array('country_id' => $id));
        if($query->num_rows()>0){
            return  $query->result_array();          
        }else{
            return null;
        }
    }
    public function getCityById($id){
        $query = $this->db->get_where($this->citiestable, array('state_id' => $id));
        if($query->num_rows()>0){
            return  $query->result_array();          
        }else{
            return null;
        }

    }
    public function getimage($id){
        $query = $this->db->get_where($this->imagetable, array('user_id'=> $id));
        if($query->num_rows()>0){
        //    echo "image";
            return  $query->row_array();          
        }else{
            return null;
        }
    }

}
?>