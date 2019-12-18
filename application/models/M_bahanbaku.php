<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_bahanbaku extends CI_Model
{
	private $id;
	private $nama_bahan;
	private $kategori;
	private $stok;

	public function data_bahan()
	{
		return $this->db->get('bahan_baku');
	}

	public function addBahan($data)
	{
		$this->db->insert('bahan_baku', $data);
	}

	public function updateBahan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('bahan_baku', $data);
	}
	public function change_stok($id, $bahan)
	{

		$this->db->query("update bahan_baku set stok = stok - {$bahan} where id={$id}");
	}
}
