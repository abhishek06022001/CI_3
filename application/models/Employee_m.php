<?php

class Employee_m extends CI_Model
{
    protected $table = 'employee';
    public function getdata()
    {
        // $query = $this->db->get_where($this->table,array('isdeleted'=>0));
        $query = $this->db->query('SELECT * FROM  employee where isdeleted= 0  order by emp_t_id desc ');
        if ($query->num_rows() > 0) {
            // echo "<pre>";print_r($query->result_array());echo "</pre>";exit; 
            return $query->result_array();
        } else {
            return null;
        }
    }
    public function getdatabyid($id)
    {
        $query = $this->db->get_where($this->table, array('emp_t_id' => $id, 'isdeleted' => 0));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }
    public function getdatabytype($Type){
        $query = $this->db->get_where($this->table, array('Type' => $Type, 'isdeleted' => 0));
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    public function insertData($data)
    { 
       	// echo 'hi';
        // print_r($data);
        // exit;
        // if($data['Name'] != ''){
        //     $this->db->insert($this->table, $data);
        //     print_r($this->db->last_query());
        //     exit;
        //     return $this->db->insert_id();
        // }
        if($data[0] != 'Name'){
            $columnNames = array('Name', 'Phone','Email','Type','DOJ','DOB');
            $insertDatas = array_combine($columnNames, $data);
        }
        $this->db->insert($this->table, $insertDatas);
    }
    public function insertdataa($data){
        $this->db->insert($this->table, $data);
    }
    public function editdata($data,$emp_t_id)
    {
        //get 
        $this->db->where('emp_t_id', $emp_t_id);
        $this->db->update($this->table, $data);
    }
    public function updateDataByPhone($data) 
    {    
        // echo 'here2';
        // print_r($data) ;
        //  exit;
         $insertDatas = $data;
        if($data[0] != 'Name'){
            $columnNames = array('Name', 'Phone','Email','Type','DOJ','DOB');
            $insertDatas = array_combine($columnNames, $data);
        }
           
        $this->db->where('Phone', $insertDatas['Phone']); 
        
        $this->db->update($this->table, $insertDatas);
      
    }
    public function deletedata($id)
    {
        $data = array(
            'isdeleted' => 1
        );
        $this->db->where('emp_t_id', $id);
        $this->db->update($this->table, $data);
    }
    public function getRowByPhoneNumber($phone)
    {
        $query = $this->db->get_where($this->table, array('Phone' => $phone)); // this array is a condition 
        if ($query->num_rows() > 0) {
              return true;
        } else {
              return false;
        }
    }
    public function getdatafromtype($type){
        $query =$this->db->get_where($this->table, array('Type' => $type));
    }
    public function insertindb($data)
    {
       
        // check phone number in each and either edit or insert based on condition 
        $skipFirstRow = true;
        foreach ($data as $row) {
            if ($skipFirstRow) {
                $skipFirstRow = false;
                continue;
            }
            // now go through each row and insert or update it accordingly           
            $phone = $row[1];  
        //   print_r($row);
        //     exit;
          
            $entry =  $this->getRowByPhoneNumber($phone);
            $type = $row[3];
            $doj  = $row[4];
            $dob  = $row[5];
            $formats = ['d/M/Y', 'd-M-Y', 'd M Y', 'Y-m-d','d-m-Y', 'j-M-Y'];
            foreach ($formats as $format) {
                $dateObj = DateTime::createFromFormat($format, $doj);
                if ($dateObj !== false) {
                    $row[4] = $dateObj->format('Y-m-d');
                    break; 
                }
            }
            
            foreach ($formats as $format) {
                $dateObj = DateTime::createFromFormat($format, $dob);
                if ($dateObj !== false) {
                    $row[5] = $dateObj->format('Y-m-d');
                    break; 
                }
            }
            
            // exit;   
            if(strtolower($type)  == 'part time'){
                $row[3]=0 ;
            }else if(strtolower($type)  == 'full time'){
                $row[3]= 1;
            }else{
                $row[3]= 'NA';
            }
            // echo $entry;
            //  exit;
            if ($entry) {
                echo 'here1';
                $this->updateDataByPhone($row);
            } else {      
                echo 'here2';     
                $this-> insertData($row);
            }   
        }
    }
}
