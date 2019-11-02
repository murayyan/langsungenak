<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_produk extends CI_Model{

	private $id;
	private $nama_produk;
    private $deskripsi;
    private $kategori;
    private $harga;
    private $gambar;

	public function add_produk($data){
		$this->db->insert('produk', $data);
	}
	public function data_produk(){
		return $this->db->get('produk');
    }
    
}
?>
