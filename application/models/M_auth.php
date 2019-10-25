<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model{

	private $nama;
	private $email;
	private $password;
	private $alamat;
	private $nohp;
	private $is_active;

	public function register($data){
		$this->db->insert('customer', $data);
	}
	public function cek_user($email){
		return $this->db->get_where('customer', $email);
	}
}
?>
