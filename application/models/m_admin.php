<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model{

	private $id;
	private $email;
	private $password;
	private $nama;
	private $level;

	public function register($data){
		$this->db->insert('admin', $data);
	}
	public function data_user(){
		return $this->db->get('admin');
	}
	public function cek_admin($email){
		return $this->db->get_where('admin', $email);
	}
}
?>
