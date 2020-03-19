<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pengantaran extends CI_Model
{
    private $id;
	private $nama_pengantar;
	private $no_hp;
	private $stok;
    
    public function jadwal_antar_all()
    {
        $this->db->select('*');
        $this->db->from('jadwal_antar j');
        $this->db->join('pesanan p', 'j.id_pesanan = p.id');
        $this->db->join('customer c', 'p.customer = c.id');
        $this->db->where('j.status', 'Belum Dikirim');
		$this->db->order_by('j.waktu_pengantaran', 'ASC');
        return $this->db->get();
    }

    public function jadwal_antar($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_antar j');
        $this->db->join('pesanan p', 'j.id_pesanan = p.id');
        $this->db->join('customer c', 'p.customer = c.id');
        $this->db->where('j.id_kurir', $id);
        $this->db->where('j.status', 'Belum Dikirim');
		$this->db->order_by('j.waktu_pengantaran', 'ASC');
        return $this->db->get();
    }

    public function jadwal_terkirim_all()
    {
        $this->db->select('*');
        $this->db->from('jadwal_antar j');
        $this->db->join('pesanan p', 'j.id_pesanan = p.id');
        $this->db->join('customer c', 'p.customer = c.id');
        $this->db->where('j.status', 'Terkirim');
		$this->db->order_by('j.waktu_pengantaran', 'ASC');
        return $this->db->get();
    }

    public function jadwal_terkirim($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_antar j');
        $this->db->join('pesanan p', 'j.id_pesanan = p.id');
        $this->db->join('customer c', 'p.customer = c.id');
        $this->db->where('j.id_kurir', $id);
        $this->db->where('j.status', 'Terkirim');
		$this->db->order_by('j.waktu_pengantaran', 'ASC');
        return $this->db->get();
    }

    public function addJadwal($data)
    {
        $this->db->insert('jadwal_antar', $data);
    }

    public function updateStatus($data, $id)
    {
        $this->db->where('id_pesanan', $id);
        $this->db->update('jadwal_antar', $data);
    }

    public function cekKurir($id)
    {
        return $this->db->get_where('jadwal_antar', ['id_pesanan' => $id]);
    }

    public function inputRetur()
    {
        $this->db->select('p.*, c.nama');
        $this->db->from('pesanan p');
        $this->db->join('customer c', 'p.customer = c.id');
        $this->db->where('p.status', 'Terkirim');
        return $this->db->get();
    }
}
