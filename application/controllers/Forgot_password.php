<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{
	  public function __construct() {
        parent::__construct();
		
 $this->load->helper('url', 'form');
  $this->load->helper('date');
  $this->load->library('form_validation');
  $this->load->model('M_account');
    }
 
	
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password Confirmation', 'required|matches[pass]');

        if ($this->form_validation->run() == FALSE) {
			
            $this->load->view('reset_password');
			
        } else{
            $email = $this->input->post('email');
			$data = $data = array('user_password' => $this->input->post('pass'));
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->M_account->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('email_error', 'Email Address doesnt exist.');
                redirect(base_url('reset_password'));
			}
			$id = $userInfo->customer_id;
			
            if (!$this->M_account->updatePassword($id,$data)) {
                $this->session->set_flashdata('password_error', 'Password not updated');
				redirect(base_url('reset_password'));
            } else {
                $this->session->set_flashdata('password_success', 'Password successfully updated. You can now login.');
				redirect(base_url('sign-in'));
            }
            
        
			
        }
    }
}