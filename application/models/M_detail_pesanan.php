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
		return $this->db->query("select a.id, a.id_pesanan, a.id_produk, a.nama_produk, a.jumlah, a.total_harga, b.stok  from 
		(select * from detail_pesanan where id_pesanan = {$where}) a
		left join
		(select * from produk) b
		ON a.id_produk = b.id");
	}
}
