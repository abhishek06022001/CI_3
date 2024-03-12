
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	/**
	 * ok now make logout and session validation and redirection here .
	*/
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
        parent::__construct();
  // check the conditions of session and redirect it 
        // Load necessary libraries, models, or helpers
        $this->load->library('session');
		if($this ->session ->userdata('user_id') == null){
			redirect('login_c');
		}     
        //$this->load->model('your_model');
    }
	public function index()
	{    	
		// $this->load->library('session');
		if($this ->session ->userdata('user_id') == null){
			redirect('login_c');
			// echo"hahsdajd";
		}
		// if($_SESSION['user_id']==null){
		// 	redirect('login_c');
		// }
		/**
		 * now load the count of data into an array and load it into the Dashboard
		*/
		$data['part_time'] = getCount(0);
		$data['full_time'] =getCount(1);
		// print_r(getCount(0));
		// exit;
		
		// print_r($data['part_time']);
		// exit;
	
        $this->load->view('DashBoard',$data);
	}
	public function demo(){
		echo "I am here";
		$this->load->view('welcome_message');
	}
	public function charts(){
		$this->load->view('charts');
	}
	public function table(){
		$this->load->view('table');
	}
}
