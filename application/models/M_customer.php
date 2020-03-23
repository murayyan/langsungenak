<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_customer extends CI_Model{

	private $nama;
	private $email;
	private $password;
	private $alamat;
	private $nohp;
	private $is_active;

	public function register($data)
	{
		$this->db->insert('customer', $data);
	}

	public function cek_user($where)
	{
		return $this->db->get_where('customer', $where);
	}

	public function getKuota($where)
	{
		return $this->db->get_where('customer', $where);
	}

	public function updateKuota($id, $data)
	{
		$this->db->set($data);
		$this->db->where($id);
		$this->db->update('customer');
	}
}
