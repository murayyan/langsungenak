<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_rencana_produksi extends CI_Model
{

	private $id;
	private $id_pesanan;
	private $nama_produk;
	private $jumlah;
	private $total_harga;

	public function set_rencana_produksi($data)
	{
		$this->db->insert('rencana_produksi', $data);
	}

	public function get_produksi()
	{
		return $this->db->query("select id, nama_produk, jumlah, status from
		(select * from produk) a
		left join 
		(select id_produk, sum(jumlah) as jumlah, status from rencana_produksi where status = 'proses' group by id_produk) b
		ON a.id = b.id_produk");
	}
}
