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
	public function addFeature(){
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
