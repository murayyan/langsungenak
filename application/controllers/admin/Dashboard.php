<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	 
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	public function authentication(){
		if ($this->session->userdata('level')!='SPV') {
			redirect('admin/login');
		}
	}

	public function dashboard(){
		$this->authentication();
	    $this->load->view('admin/dashboard');
		
		
	}




}
