<?php
 function getMenuItems($id) {
    $CI = &get_instance();
  
    
    $table = "menu_t";
    $sql = "SELECT * FROM $table WHERE (Parent_menu_id = $id AND isDeleted = 0)  order by isOrder";

    $result = $CI->db->query($sql);
   // echo "<pre>";print_r($result->result_array());"</pre>";exit;
    if ($result) {
        return $result->result_array(); 
    } else {
        return array(); 
    }
}
function getState($id){
    $CI = &get_instance();
    $table = "states_m";
    $sql = "select* from $table where state_id = $id";
    $result = $CI->db->query($sql);
    if ($result) {
        return $result->result_array(); 
    } else {
        return array(); 
    }
}
function getCount($where){
    $CI = &get_instance();
    $table = "employee";
    $sql ="select count(*) as total_count from $table where Type =$where AND isdeleted = '0' ";
    $result = $CI->db->query($sql);
    if ($result) {
        return $result->row_array(); // return the Count : frequencey array 
    } else {
        return array(); 
    }
}

?>
