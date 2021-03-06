<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_produk extends CI_Model
{

	private $id;
	private $nama_produk;
	private $deskripsi;
	private $kategori;
	private $harga;
	private $gambar;

	public function data_produk()
	{
		return $this->db->get('produk');
	}

	public function getProduk($where)
	{
		return $this->db->get_where('produk', $where);
	}

	public function add_produk($data)
	{
		$this->db->insert('produk', $data);
	}

	public function edit_produk($data, $where)
	{
		$this->db->where($where);
		$this->db->update('produk', $data);
	}

	public function change_stok($id, $jumlah)
	{
		$this->db->query("update produk set stok = stok + {$jumlah} where id={$id}");
	}

	public function decrease_stok($id, $jumlah)
	{
		$this->db->query("update produk set stok = stok - {$jumlah} where id={$id}");
	}
}
