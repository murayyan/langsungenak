<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pesanan extends CI_Model
{

	private $id;
	private $customer;
	private $no_hp;
	private $alamat;
	private $waktu_kirim;
	private $jumlah;
	private $total_harga;
	private $status;

	public function data_pesanan()
	{
		return $this->db->get('pesanan');
	}

	public function set_pesanan($data)
	{
		$this->db->insert('pesanan', $data);
		return $this->db->insert_id();
	}

	public function change_status($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('pesanan');
	}

	public function get_pesanan($where)
	{
		$this->db->select('*, pesanan.id');
		$this->db->order_by('waktu_pesan', 'DESC');
		$this->db->join('customer', 'pesanan.customer = customer.id');
		return $this->db->get_where('pesanan', $where);
	}

	public function get_pesananById($where)
	{
		$this->db->select('*, p.id as id_pesanan');
		$this->db->join('customer c', 'p.customer = c.id');
		return $this->db->get_where('pesanan p', $where);
	}

	public function get_bukti_bayar($id)
	{
		return $this->db->get_where('pembayaran', ['id_pesanan' => $id]);
	}

	public function get_kurir()
	{
		return $this->db->get_where('admin', ['level' => 'KURIR']);
	}

	public function get_omset($tahun){
		$this->db->select_sum('total_harga');
		$this->db->where_not_in('status', ['Menunggu Pembayaran', 'Menunggu Konfirmasi']);
		$this->db->like('waktu_pesan', $tahun, 'after');
		return $this->db->get('pesanan');
	}
}
