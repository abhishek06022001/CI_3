<?php

class Feature_m extends CI_Model
{
    protected $table = 'menu_t';
    public function save($data){
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $columnNames = array('Menu_title','label');
        $insertDatas = array_combine($columnNames,$data);
        $this->db->insert($this->table,$insertDatas);
    }   
    public function getdata (){

        $query = $this->db->query('SELECT * FROM menu_t');
        if ($query->num_rows() > 0) {
            // echo "<pre>";print_r($query->result_array());echo "</pre>";exit; 
            return $query->result_array();
        } else {
            return null;
        }
    }
}
