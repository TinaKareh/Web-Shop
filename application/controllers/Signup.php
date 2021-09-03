
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller 
{
	public function __construct()
	{
	parent::__construct();	
  
  $this->load->helper('url');
  $this->load->helper('form');
  $this->load->library('form_validation');
  $this->load->library('session');
  $this->load->helper('date');
  $this->load->model('Register_model');
  
	}
	
	public function index(){
 $this->form_validation->set_rules('email', 'Email', 'required');
 $this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]');
 $this->form_validation->set_rules('userName', 'User Name', 'required');
 $this->form_validation->set_rules('fname', 'First Name', 'required');
 $this->form_validation->set_rules('lname', 'Last Name', 'required');
 $this->form_validation->set_rules('phone', 'Phone Number', 'required');
 $this->form_validation->set_rules('role', 'Role', 'required');



	  if ($this->form_validation->run() == TRUE) {

        date_default_timezone_set('Africa/Nairobi'); # add your city to set local time zone
        $dateFormat ="%Y-%m-%d";
        $timeFormat = "%h:%i %s";
        $entry_date = mdate($dateFormat);
        $entry_time = mdate($timeFormat);
		  
		//insert the signup form data into database
    $data = array(
      'user_name' => $this->input->post('userName'),
      'first_name' => $this->input->post('fname'),
      'last_name' => $this->input->post('lname'),
      'email_address' => $this->input->post('email'),
      'role' => $this->input->post('role'),
      'phone_number' => $this->input->post('phone'),
      'user_password' => $this->input->post('pass'),
      'city' => $this->input->post('city'),
      'address' => $this->input->post('address'),
      'zip_code' => $this->input->post('zip'),
      'country' => $this->input->post('country'),
      'home_area' => $this->input->post('home'),
      'created_on' =>$entry_date,
  );
  $role = $data['role'];

  $this->Register_model->insert($data);

  if($role == 'Customer'){

   $this->session->set_userdata($data);
  redirect(base_url('product'));

  }else{
  
    $this->session->set_userdata($data);
    redirect(base_url('dashboard'));

  }	
	  }else{
      $this->load->view('customer_signup');
		
	  }	
         
		}
 }		

?>