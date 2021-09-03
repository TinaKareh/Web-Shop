<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Signin extends CI_Controller {
 
 public function __construct() {
 parent::__construct();
 $this->load->helper(array('form', 'url'));
 $this->load->library(array('form_validation','session'));
 }
 
 public function login() {
 
 $this->form_validation->set_rules('email', 'Email', 'required');
 $this->form_validation->set_rules('pass', 'Password', 'required');
 
 if ($this->form_validation->run() == FALSE) {
 
 $this->load->view('customer_login');
 
 } else {
 
 $email = $this->input->post('email');
 $password = $this->input->post('pass');
 
 $user = $this->db->get_where('customer_details',array('email_address' => $email))->row();
 $row  =$this->db->get_where('customer_details',array('user_password' => $password))->row();

 
 if(!$user) {
 $this->session->set_flashdata('login_error', 'Please check your email and try again.', 300);
 redirect(uri_string());
 }
 
 
 if(!$row) {
 $this->session->set_flashdata('login_error', 'Please check your password and try again.', 300);
 redirect(uri_string());
 }
 
 $data = array(
 'custoner_id' =>$user->customer_id,
 'user_name' => $user->user_name,
 'first_name' => $user->first_name,
 'last_name' => $user->last_name,
 'email_address' => $user->email_address,
 'phone_number' => $user->phone_number,
 'user_password' => $user->user_password,
 'role' => $user->role,
 );
 
 
 $this->session->set_userdata($data);

 if($user->role == 'Vendor'){
    redirect(base_url('dashboard')); 
 }
 
 redirect(base_url('product_filter')); // redirect to home
 exit;
 
 } 
 }
 
 public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('sign-in'));
    }
}