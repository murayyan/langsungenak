<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_detail_order extends CI_Model{

	private $id;
	private $id_order;
	private $nama_produk;
	private $jumlah;
	private $total_harga;

	public function set_detail_order($data){
		$this->db->insert('detail_order', $data);
	}
}
?>
