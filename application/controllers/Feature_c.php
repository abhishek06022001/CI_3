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
    public function Feature(){
		$data['arr'] = $this->Feature_m->getdata();

        $this->load->view('Feature',$data);
    }
	public function addFeature(){
		// echo "<pre>";print_r(   );echo "</pre>";exit;
		$data['featureName']= $this->input->post("featureName");// Menu_title
		$data['featureIcon'] = $this->input->post("featureIcon");// label 
		// echo "<pre>";print_r(  $data );echo "</pre>";exit;
		// add in menu db 
		$this->Feature_m->save($data);
		redirect('DashBoard');
	}
}
