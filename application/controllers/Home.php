<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('M_produk');
        $this->load->model('M_order');
        $this->load->model('M_detail_order');
        $this->load->model('M_pembayaran');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function checkout()
	{
		$this->load->view('checkout');
	}
	public function payment($invoice)
	{
		$data['pesanan'] = $this->M_order->get_order(['id' => $invoice])->result_array();
		$this->load->view('payment', $data);
	}
	public function make_payment()
	{
		$id_order = $this->input->post('id_order');
		$no_rek = $this->input->post('no_rek');
		$nama_rek = $this->input->post('nama_rek');
		$bank_rek = $this->input->post('bank_rek');
		$bank_tujuan = $this->input->post('bank_tujuan');
		$filename = time() . '_' . substr(str_replace(' ', '_', $_FILES['bukti']['name']), -12);
		$config = [
			'file_name' 	=> $filename,
			'upload_path' 	=> 'assets/images/bukti',
			'allowed_types'	=> 'jpg|jpeg|png',
			'max_size' 		=> '10000'
		];
		$data = [
			'id_order' 		=> $id_order,
			'no_rekening' 	=> $nama_rek,
			'bank_rekening'	=> $bank_rek,
			'bank_tujuan' 	=> $bank_tujuan,
			'file' 			=> $filename
		];

		$this->load->library('upload', $config);
		$this->upload->do_upload('bukti');
		$this->M_pembayaran->add_bukti($data);
		redirect(base_url('pesanan'));
	}

	public function pesanan()
	{	
		$data['pesanan'] = $this->M_order->get_order(['customer' => $this->session->userdata('id')])->result_array();
		$this->load->view('pesanan',$data);
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
		$data = $this->M_produk->getProduk(['id' => $id_produk])->row();
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
		$harga = $this->input->post('total_harga');
		$jml_item = 0;
		$jml_harga = 0;
		foreach ($jumlah_item as $key => $n) {
			$jml_item+=$jumlah_item[$key];
			$jml_harga+=$harga[$key];
		}
		
		$id_customer = $this->input->post('id_customer');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$tgl = $this->input->post('tanggal');
		$data = array(
			'customer' => $id_customer,
			'no_hp' => $telp,
			'alamat' => $alamat,
			'waktu_pesan' => date("Y-m-d"),
			'waktu_kirim' =>$tgl,
			'jumlah' => $jml_item,
			'total_harga' => $jml_harga,
			'status' => 'Menunggu Pembayaran'
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
			$this->cart->destroy();
		}
		redirect('payment');
		
	}
}
