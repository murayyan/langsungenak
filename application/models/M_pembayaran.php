<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pembayaran extends CI_Model{

	private $id;
	private $id_pesanan;
	private $no_rekening;
	private $bank_rekening;
	private $bank_tujuan;
	private $file;

	public function add_bukti($data){
		$this->db->insert('pembayaran', $data);
	}
	
}
