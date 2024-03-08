<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Employee_c extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_m');
	}
	public function empnew()
	{
		$data['arr'] = $this->Employee_m->getdata();
		$this->load->view('Employeenew', $data);
	}

	// public function index($data)
	// {    
    //      if($data == ''){
	// 		$data['arr'] = $this->Employee_m->getdata();
	// 		$this->load->view('Employeenew', $data);
	// 	 }
			
		
	
	// }
	public function index()
	{    
        
		$where = '';
		$type='';
		if($this->input->post('typeSearch')!=''){
			//echo "<pre>";print_r($_POST);exit;
			$type = $this->input->post('typeSearch');
			$where .= " AND Type='".$type."'";
		}
		//echo "<pre>";print_r($where);exit;
		$data['arr'] = $this->Employee_m->getdata($where);
		$data['typeSearch'] = $type;
		$this->load->view('Employeenew', $data);
	}
	public function getbyid()
	{
		$id = $this->input->post('ID');
		$result = $this->Employee_m->getdatabyid($id);
		echo json_encode($result);
	}
	public function addemployee()
	{	
		$Name = $this->input->post('Name');
		$Phone = $this->input->post('Phone');
		$emp_t_id = $this->input->post('emp_t_id');
		$Type = $this->input->post('Type');
		$DOB = $this->input->post('DOB');
		$DOJ = $this->input->post('DOJ');
		$Email = $this->input->post('Email');		
		$data = array(
			'Name' 	=> $Name,
			'Phone' => $Phone,
			'Type' 	=> $Type,
			'DOB' 	=> $DOB,
			'DOJ' 	=> $DOJ,
			'Email'  => $Email,
		);
		if ($emp_t_id != null) {
			$this->Employee_m->editdata($data,$emp_t_id);
		} else {
			$this->Employee_m->insertdataa($data);
		}
	}
	public function typeSearch(){   
		// echo '<script>alert("Invalid file");</script>';
		
		// get data by the type  into an array 
		// then load the data 
		$data['arr'] = $this->Employee_m->getdatabytype(1);	
		$this->load->view('Employeenew', $data);	
		
		// print_r($data);
		// exit;
	}
	public function serchType($data)
	{
		$this->load->view('Employeenew', $data);	

	}
	

	public function editemployee()
	{
		$data = $this->input->post();
	}
	public function deleteEmployee()
	{
		$emp_id = $this->input->post('ID');
		$this->Employee_m->deletedata($emp_id);
	}
	public function getDataFromType()
	{
		echo '<script>alert("Invalid file");</script>';
		exit;
		$type = $this->input->get('ID');
		$table = $this->Employee_m->getdatafromtype($type);
		echo $table ;
	}
	public function exportExcel()
	{
		$data['arr'] = $this->Employee_m->getdata();
		// got complete all cols from database
		// print_r($data['arr']);  
		// exit;
		// change the DOB format here 
	// col titles
		$columnTitles = array('Name', 'Phone', 'Email', 'Type', 'DOB', 'DOJ');
		// array for part time
		$columnDisplayValues = array(
			'Type' => array(
				0 => 'PART TIME',
				1 => 'FULL TIME'
			)
		);
		// naya instance
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		// added the cols title row into excelsheet 
		$spreadsheet->getActiveSheet()->fromArray(array($columnTitles), null, 'A1');
		// get the filtered daata from the entire data from db 
		$selectedData = array_map(function ($row) use ($columnTitles, $columnDisplayValues) {
			if (isset($row['Type']) && isset($columnDisplayValues['Type'][$row['Type']])) {
				$row['Type'] = $columnDisplayValues['Type'][$row['Type']];
				$newTime = date('d/M/Y',strtotime($row['DOB']));
				$newTimedoj = date('d/M/Y',strtotime($row['DOJ']));
				$row['DOB'] =$newTime ; // change the DOB format here 
				$row['DOJ'] = $newTimedoj;// change the DOJ format here
			}
			return array_intersect_key($row, array_flip($columnTitles));// compares the key and returns an array  matches with key=>
		}, $data['arr']);
		//style the first row 
		$cellrange = 'A1:F1';
		$spreadsheet->getActiveSheet()->getStyle($cellrange)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_BLUE);
		$spreadsheet->getActiveSheet()->getStyle($cellrange)->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		// inserrt all the rows from A2	
		$spreadsheet->getActiveSheet()->fromArray($selectedData, null, 'A2');

		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="export.xlsx"');
		header('Cache-Control: max-age=0');
		//download 
		$writer->save('php://output');
		exit;
	}
	public function importdata()
	{
		if (isset($_POST['save_excel_data'])) {
			$fileName = $_FILES['import_file']['name'];
			$file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
			$allowed_ext = ['xls', 'csv', 'xlsx'];
			if (in_array($file_ext, $allowed_ext)) {
				// take data into an array and 
				$inputFileNamePath = $_FILES['import_file']['tmp_name'];
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
				$data = $spreadsheet->getActiveSheet()->toArray();
				// print_r($data);
				// exit;
				// now insert all data in the database right
				// but how ? make a function in model 
				$this->Employee_m->insertindb($data);
			
				echo '<script>window.location.href = "' . base_url('empnew') . '";</script>';
				exit;
			} else {
				echo '<script>alert("Invalid file");</script>';
				echo '<script>window.location.href="' . site_url('Employees') . '";</script>';
			}
		}
	}
}
