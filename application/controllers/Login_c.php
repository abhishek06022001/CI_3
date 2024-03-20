<?php

use App\Models\Login_m;

class Login_c extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Login_m');
    $this->load->model('Role_m');

    $this->load->library('session');
    // $this->load->library('input');
    if ($this->session->userdata('user_id') == null) {
      $this->load->view('login.php');
    }
  }
  public function index()
  {
    return $this->load->view('login');
  }
  public function change_password()
  {
    return $this->load->view('change_password.php');
  }
  public function changed_password()
  {
    $old_password = $this->input->post('old_password');
    $new_password = $this->input->post('new_password');

    // $confim_password = $this->input->post('confim_password');
    $user_id = $_SESSION['user_id'];

    $fetched_pass = $this->Login_m->fetch_pass($user_id);

    $encoded_pass = base64_encode($old_password);
    $encoded_new_pass =  base64_encode($new_password);
    // echo "<pre>";print_r($user_id);echo "</pre>";exit;
    if ($encoded_pass === $fetched_pass) {
      $this->Login_m->change_pass($user_id, $encoded_new_pass);
      redirect('login_c');
    } else {
      $this->session->set_flashdata('error_message', 'Old password wrong');
      redirect('change_password');
    }
  }

  public function login_check()
  {
    $email = $this->input->post('inputEmail');
    $password = $this->input->post('inputPassword');
    $users = $this->Login_m->get_user_by_email($email);
    if ($users) {
      $encoded_pass = base64_encode($password);
      // echo "<pre>";print_r($encoded_pass);echo "</pre>";exit;
      if ($users['password'] == $encoded_pass) {
        session_start();
        $this->session->set_userdata('user_id', $users['user_id']);
        $this->session->set_userdata('username', $users['username']);
        $this->session->set_userdata('role_id', $users['role_id']);
        // role id is getting stored here 
        /**
         * 
         * 
         */
        //  $_SESSION['user_id']= $users['user_id'];
        //  $_SESSION['username']= $users['username'];
        //  $_SESSION['role_id'] = $users['role_id'];        
        redirect('home');
      }else {
        $this->session->set_flashdata('error_message', 'WRONG PASSWORD');
        redirect('login_c');
      }
    }else{
      $this->session->set_flashdata('error_message', 'wrong username');
      redirect('login_c');
    }
    //  if($this->session->flashdata('error_message')){
    //   echo '<div class="error">' . $this->session->flashdata('error_message') . '</div>';
    //  }
  }
}
