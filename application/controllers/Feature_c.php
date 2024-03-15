<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
class Feature_c extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Feature_m');
	}
    public function Index(){
		$data['arr'] = $this->Feature_m->getdata();

        $this->load->view('Feature',$data);
    }
	public function getbypid(){
		$menu_id = $this->input->post('menu_id');
		//gets hit here
		$result = $this->Feature_m->getDataByFeatureId($menu_id);
		// print_r($result);
		
		echo json_encode($result);
	}
	public function updatebypid(){
		// echo "<pre>";print_r($_POST);exit; echoed prints in the 
	
		$menu_id= $this ->input->post('menu_id');
		// echo "<pre>";print_r($menu_id);exit;
		$Menu_title = $this->input->post('name');
		$label = $this->input->post('editFeatureIcon');
		$data = array(
			'Menu_Title'=>$Menu_title,
			'label'=>$label
		);
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->Feature_m->updateData($menu_id,$data);

	}
	public function addFeature(){
		// echo "<pre>";print_r($_POST);exit;
		// echo "<pre>";print_r("hey"   );echo "</pre>";exit;
		$data['featureName']= $this->input->post("featureName");// Menu_title
		$data['featureIcon'] = $this->input->post("featureIcon");// label 
		// echo "<pre>";print_r(  $data );echo "</pre>";exit;
		// add in menu db 
		$this->Feature_m->save($data);
		redirect('Feature');
	}
	//edit feature
	// delete feeature
	public function deleteFeature(){
		// echo "<pre>";print_r("hey"  );echo "</pre>";exit;
		$menu_id = $this->input->post('ID');
		// echo "<pre>";print_r( $menu_id);echo "</pre>";exit;
		$this->Feature_m->deletedata($menu_id);
	}

}
