<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('M_produk');
        $this->load->model('M_order');
        $this->load->model('M_detail_order');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function checkout()
	{
		$this->load->view('checkout');
	}

	public function katalog()
	{
		$data['produk'] = $this->M_produk->data_produk()->result_array();
		$this->load->view('katalog', $data);
	}

	public function add_cart()
	{
		$id_produk = $this->input->post('id');
		$jumlah = $this->input->post('jumlah');
		$data = $this->M_produk->get_produk($id_produk)->row();
		$cart = array(
			'id'  => $data->id,
			'qty' => $jumlah,
			'price'   => $data->harga,
			'name'   => $data->nama_produk
		);

		$this->cart->insert($cart);
		redirect(base_url());
	}

	public function tambah_pesanan()
	{
		$id_produk = $this->input->post('id');
		$nama_produk = $this->input->post('nama');
		$jumlah_item = $this->input->post('jumlah');
		$harga = $this->input->post('harga');
		
		$id_customer = $this->input->post('id_customer');
		$jumlah_order = $this->input->post('jumlah_order');
		$total_harga = $this->input->post('total_harga');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$tgl = $this->input->post('tanggal');
		$data = array(
			'customer' => $id_customer,
			'no_hp' => $telp,
			'alamat' => $alamat,
			'waktu_kirim' =>$tgl,
			'jumlah' => $jumlah_order,
			'total_harga' => $total_harga,
			'status' => 'Belum terkirim'
		);
		$id_order = $this->M_order->set_order($data);
		foreach ($id_produk as $key => $n) {
			$data2 = array(
				'id_order' => $id_order,
				'nama_produk' => $nama_produk[$key],
				'jumlah' =>$jumlah_item[$key],
				'total_harga'=>$harga[$key]
			);
			$this->M_detail_order->set_detail_order($data2);
		}
		
	}
}
