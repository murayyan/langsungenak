<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_order extends CI_Model{

	private $id;
	private $customer;
	private $no_hp;
	private $alamat;
	private $waktu_kirim;
	private $jumlah;
	private $total_harga;
	private $status;

	public function data_order(){
		return $this->db->get('order');
	}

	public function set_order($data){
		$this->db->insert('order', $data);
		return $this->db->insert_id();
	}
	public function get_order($where){
		return $this->db->get_where('order', $where);	
	}
}
?>
