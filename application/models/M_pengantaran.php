<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pengantaran extends CI_Model
{
    private $id;
	private $nama_pengantar;
	private $no_hp;
	private $stok;
    
    public function jadwal_antar($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_antar j');
        $this->db->join('pesanan p', 'j.id_pesanan = p.id');
        $this->db->join('customer c', 'p.customer = c.id');
        $this->db->where('j.id_kurir', $id);
		$this->db->order_by('waktu_pengantaran', 'ASC');
        return $this->db->get();
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
}
