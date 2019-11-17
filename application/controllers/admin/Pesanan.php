<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('M_order');
    }

    public function authentication(){
		if ($this->session->userdata('level')!='SPV') {
			redirect('admin/login');
		}
    }
    
    public function data_pesanan(){
        $this->authentication();
        $data['order'] = $this->M_order->data_order()->result_array();
		$this->load->view('admin/data_pesanan', $data);		
    }
}
