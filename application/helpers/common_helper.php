<?php
function getMenuItems($id)
{
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
function getState($id)
{
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
function getCount($where)
{
    $CI = &get_instance();
    $table = "employee";
    $sql = "select count(*) as total_count from $table where Type =$where AND isdeleted = '0' ";
    $result = $CI->db->query($sql);
    if ($result) {
        return $result->row_array(); // return the Count : frequencey array 
    } else {
        return array();
    }
}
function checkRolePermission($user_id, $role_id, $menu_id, $permission = '')
{
    $ans = false;
    $CI = &get_instance();
    if (checkIfUseridispresent($user_id)) {
        $table = "user_permission_t";
        $sql = "select * from $table where user_id = ? AND menu_id= ?  AND permission= ? ";
        $result = $CI->db->query($sql, array($user_id, $menu_id, $permission));
        if ($result->num_rows() > 0) {
            $ans = true;
        }
    } else {
        $table = "role_permissions_t";
        $sql = "select * from $table where role_id = ? AND menu_id= ?  AND permission= ? ";
        $result = $CI->db->query($sql, array($role_id, $menu_id, $permission));
        if ($result->num_rows() > 0) {
            $ans = true;
        }
    }
    return $ans;
}
function checkIfUseridispresent($user_id)
{
    $CI = &get_instance();
    $table = "user_permission_t";
    $sql = "SELECT * FROM $table WHERE user_id = ?";
    $result = $CI->db->query($sql, array($user_id));
    if ($result->num_rows() > 0) {
        //  echo "<pre>";
        //  print_r($result->result_array()); // Printing the result as an array
        //  echo "</pre>";
        //  exit;
        // You may also use print_r($result->row()); to print a single row
        return true;
    }
    return false;
}

function get_current_url()
{
    $CI = &get_instance();
    return $CI->config->site_url($CI->uri->uri_string());
}
function getDatabyHref($href)
{
    $CI = &get_instance();
    $table = "menu_t";
    $sql = "select * from $table where hreflink= ? ";
    $result = $CI->db->query($sql, array($href));
    return $result->result_array();
}
?>
<!-- 
    function checkRolePermission($user_id, $role_id, $menu_id, $permission = '')
{
    $ans = false;
    $CI = &get_instance();
    if (uidexists($user_id)) {
        $table2 = "user_permission_t";
        $sql = "select* from $table2 where user_id = ? AND menu_id =? AND permission =   ?    ";
        $result = $CI->db->query($sql, array($user_id, $menu_id, $permission));
        if ($result->num_rows() > 0) {
            return true;
        }
    } else {
        $table = "role_permissions_t";
        $sql = "select * from $table where role_id = ? AND menu_id= ?  AND permission=   ?    ";
        $result = $CI->db->query($sql, array($role_id, $menu_id, $permission));
        if ($result->num_rows() > 0) {
            return true;
        }
    }
  return $ans;
}
-->