<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_detail_pesanan extends CI_Model
{

	private $id;
	private $id_pesanan;
	private $nama_produk;
	private $jumlah;
	private $total_harga;

	public function set_detail_pesanan($data)
	{
		$this->db->insert('detail_pesanan', $data);
	}
	public function get_detail_pesanan($where)
	{
		return $this->db->get_where('detail_pesanan', $where);
	}
}
