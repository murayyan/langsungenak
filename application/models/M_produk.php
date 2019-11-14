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
	public function get_produk($id_produk){
		return $this->db->get_where('produk', array('id'=>$id_produk));
    }
    
}
?>
