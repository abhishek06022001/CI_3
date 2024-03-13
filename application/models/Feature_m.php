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
}
