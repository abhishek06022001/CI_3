<?php
class Profile_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_m');
        $this->load->model('User_m');
        $this->load->library('upload');
        // $this->load->library('input');
        // can use base_url etc bcuz of this helper function.
        $this->load->helper('url');
        if($this ->session ->userdata('user_id') == null){
            $this->load->view('login_c');
		}
    }

    public function index()
    {   
        if($this ->session ->userdata('user_id') == null){
			redirect('login_c');
		}
        // Load the model      
        $user_id = $this->session->userdata('user_id');
        // Get user data
        $data['arr'] = $this->Profile_m->get_user_data_by_id($user_id);
        $data['arr_countries'] = $this->Profile_m->getCountries();
        $data['img'] = $this->Profile_m->getimage($user_id);
        // echo "<pre>";print_r($data);echo "</pre>";exit; 
        // Load view with data
        // Check form submit or not 
        $this->load->view('profile', $data);
    }

    // Functions    
    public function get_states()
    {
        $country_id = $this->input->post('country_id');
        $state_id   = $this->input->post('state_id');
        $stateData = $this->Profile_m->getStatesbyCountryById($country_id);
        $output = '<option value="">Select State</option>';
        foreach ($stateData as $state) {
            $selected = '';
            if ($state_id == $state['state_id']) {
                $selected = 'selected';
            }
            $output .= '<option value="' . $state['state_id'] . '" ' . $selected . '>' . $state['state_name'] . '</option>';
        }
        // echo"<pre>";print_r($output);echo"</pre>";exit;
        echo $output;
    }
    public function get_city()
    {
        $state_id = $this->input->post('state_id');
        $city_id = $this->input->post('city_id');
        $cityData = $this->Profile_m->getCityById($state_id);
        $output = '<option value="">Select city</option>';

        foreach ($cityData as $city) {
            $selected = ($city_id == $city['city_id']) ? 'selected' : ''; // Check if the city is selected
            $output .= '<option value="' . $city['city_id'] . '" ' . $selected . '>' . $city['city_name'] . '</option>';
        }
        // echo "<pre>";print_r($output);echo "</pre>";exit;
        echo $output;
    }
    public function get_image()
    {
        $user_id = $this->session->userdata('user_id');
        $data['img'] = $this->Profile_m->getimage($user_id);
        $this->load->view('profile', $data);
    }
    public function change_password(){
        $this->load->view('change_password.php');
    }

    public function update()
    {
        // check if the db has data if yes update else insert it 
        $user_id    = $this->session->userdata('user_id');
        $fname      = $this->input->post('fname');
        $lname      = $this->input->post('lname');
        $phone      = $this->input->post('phone');
        $address    = $this->input->post('address');
        $country_id = $this->input->post('country');
        $state_id   = $this->input->post('state');
        $city_id    = $this->input->post('city');
        $email      = $this->input->post('email');
        $profile_image = $_FILES['profile_image'];
        $data = array(
            'user_id'   =>$user_id,
            'f_name'    => $fname,
            'l_name'    => $lname,
            'email'     => $email,
            'phone'     => $phone,
            'address'   => $address,
            'country_id' => $country_id,
            'state_id'  => $state_id,
            'city_id'   => $city_id,
            //'profile_image' => $profile_image
        );        
        /**  // echo "<pre>";print_r($_FILES);echo "</pre>";exit;// echo "<pre>";print_r($_FILES);echo "</pre>";exit;          // echo "<pre>";print_r($data);echo "</pre>";exit;           // prints the details          // echo "<pre>";print_r($_FILES);echo "</pre>";exit;          // the Array info 
         *          [profile_image] => Array 
         *          [name] => user_image1.PNG
         *          [type] => image/png
         *          [tmp_name] => C:\xampp\tmp\phpFB12.tmp
         *          [error] => 0
         *          [size] => 22855                                          
         */
        // all the config information regarding the $_FILE upload
        //load upload library already done in construct
        // file upload now 
        /**
         * PRINTING 
         *  echo "<pre>";print_r($var);echo "</pre>";exit;
         *  echo "<pre>";print_r($_FILES);echo "</pre>";exit;
         * echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
         */
        // echo "<pre>";print_r($_FILES);echo "</pre>";exit;
        if ($profile_image != NULL) {
            $data1 = array();
            if (!empty($_FILES['profile_image']['name'])) {
                $user_id = $this->session->userdata('user_id');              
                //create a new file of teh filename 
                //$target_path = 'C:\xampp\htdocs\ci3\uploads\\' . $user_id;
                $target_path = FCPATH.'uploads\\'.$user_id;
                // $target_path = base_url().'uploads/'.$user_id;
                 $file = glob($target_path.'\*');
         
                if(!file_exists($target_path)){
                    mkdir($target_path,0777);
                }
                $config['upload_path'] = 'C:\xampp\htdocs\ci3\uploads\\' . $user_id;
                //MAKE A NEW FOLDER HERE 
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 100;
                $config['file_name'] = $_FILES['profile_image']['name'];
                $this->upload->initialize($config);
                if(count($file)!=0){
                     foreach($file as $a){
                        unlink($a);
                     }
                }
                if ($this->upload->do_upload('profile_image')) {
                    //echo "<pre>";print_r($_FILES);echo "</pre>";exit;
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data['profile_image'] = $filename;
                    $data1['response'] = 'successfully uploaded ' . $filename;
                } else {
                    echo 'error';
                }
            }
        }
        $this->Profile_m->updatedata($user_id, $data);
    }
}
