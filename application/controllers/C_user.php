<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class C_user extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('id_user')) {
			redirect(site_url('C_utama'));
		}
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_utama');
	}
	public function index()
	{
		$data['data'] = $this->M_utama->all_barang('tbl_barang');
		$this->load->view('V_barang', $data);
	}
	public function detail_barang($id)
	{
		$data['data'] = $this->M_utama->d_barang($id);
		$this->load->view('V_dbarang', $data);
	}
	public function back()
	{
		$data['data'] = $this->M_utama->all_barang('tbl_barang');
		$this->load->view('V_barang', $data);
	}
	public function back2($id)
	{
		$data['data'] = $this->M_utama->d_barang($id);
		$this->load->view('V_dbarang', $data);
	}
	public function checkout($id)
	{
		$data['data'] = $this->M_utama->d_barang($id);
		$this->load->view('V_checkout', $data);
	}
	public function proses_checkout($id_barang)
	{
		$barang = $this->M_utama->barang($id_barang);

		$id_user = $this->session->userdata('id_user');
		$jumlah = $_POST['qty'];
		$alamat = $_POST['alamat'];
		$harga = $jumlah * $barang['harga'];

		$result = $this->M_utama->checkout($alamat, $barang['id_penjual'], $id_user, $jumlah, $id_barang, $harga);

		if ($result == true) {
			$this->session->set_flashdata('status', 'Berhasil Checkout');
		}else{
			$this->session->set_flashdata('status', 'Gagal Checkout');
		}

		redirect('C_user');
	}
	public function masukKeranjang($id_barang)
	{
		$barang = $this->M_utama->barang($id_barang);
		$id_user = $this->session->userdata('id_user');
		$jumlah = $_POST['qty'];
		$total_harga = $jumlah * $barang['harga'];
		$result = $this->M_utama->masuk_keranjang($id_barang, $jumlah, $barang['id_penjual'], $total_harga, $id_user);
		if ($result == true) {
			$this->session->set_flashdata('status', 'Berhasil Dimasukan ke Keranjang');
		}else{
			$this->session->set_flashdata('status', 'Gagal Dimasukan ke Keranjang');
		}

		redirect('C_user');
	}
	public function tampilKeranjang()
	{
		$data['data'] = $this->M_utama->keranjang($id_user = $this->session->userdata('id_user'));
		$this->load->view('V_keranjang', $data);
	}
	public function checkoutKeranjang($id_barang)
	{
		$data['data'] = $this->M_utama->all_keranjang($id_barang);
		$this->load->view('V_checkoutKeranjang', $data);
	}
	public function back3()
	{
		$data['data'] = $this->M_utama->keranjang($id_user = $this->session->userdata('id_user'));
		$this->load->view('V_keranjang', $data);
	}
	public function proses_checkoutKeranjang($id_barang)
	{
		$id_user = $this->session->userdata('id_user');
		$alamat = $_POST['alamat'];

		$result = $this->M_utama->checkoutKeranjang($id_user, $alamat, $id_barang);

		if ($result == true) {
			$this->session->set_flashdata('status', 'Berhasil Checkout Keranjang');
		}else{
			$this->session->set_flashdata('status', 'Gagal Checkout Keranjang');
		}

		redirect('C_user');
	}
	public function checkoutAll()
	{
		$this->load->view('V_checkoutAll');
	}
	public function proses_checkoutAll()
	{
		$id_user = $this->session->userdata('id_user');
		$alamat = $_POST['alamat'];

		$result = $this->M_utama->checkoutAll($id_user, $alamat);

		if ($result == true) {
			$this->session->set_flashdata('status', 'Berhasil Checkout Keranjang');
		}else{
			$this->session->set_flashdata('status', 'Gagal Checkout Keranjang');
		}

		redirect('C_user');
	}
	public function hapusKeranjang($id_transaksi)
	{
		$result = $this->M_utama->hapus_keranjang($id_transaksi);

		if ($result == true) {
			$this->session->set_flashdata('status', 'Berhasil Hapus Keranjang');
		}else{
			$this->session->set_flashdata('status', 'Gagal Hapus Keranjang');
		}

		redirect('C_user');
	}
	public function tampilPesanan()
	{
		$data['data'] = $this->M_utama->pesanan($id_user = $this->session->userdata('id_user'));
		$this->load->view('V_pesanan', $data);
	}
	public function cari()
	{
		$keyword = $_POST['keyword'];
		$data['data'] = $this->M_utama->proses_cari($keyword);
		$this->load->view('V_cari', $data);
	}
	public function edit_barang($id_barang)		
	{
		$data['data'] = $this->M_utama->d_barang($id_barang);
		$this->load->view('V_editBarang', $data);
	}
	public function proses_editBarang($id_barang)
	{
		$nama_barang = $_POST['nama_barang'];
		$harga = $_POST['harga'];
		$stok = $_POST['stok'];
		$result = $this->M_utama->editProses($id_barang, $nama_barang, $harga, $stok);

		if ($result == true) {
	 		$this->session->set_flashdata('status', 'Berhasil Edit Barang');
	 	}else{
	 		$this->session->set_flashdata('status', 'Gagal Edit Barang');
	 	}
	 	redirect('C_utama/masukPenjual/');
	}
	public function tambah_barang()
	{
		$this->load->view('V_tambahBarang');
	}
	public function proses_tambahBarang(){
		$id_penjual = $this->M_utama->all_penjual($this->session->userdata('id_user'));
		$nama_barang = $_POST['nama_barang'];
		$harga = $_POST['harga'];
		$stok = $_POST['stok'];
		
		$image = $_FILES['image'];
		if ($image=''){}else{
			$config['upload_path']		= './assets/image';
			$config['allowed_types']	= 'jpg|png|gif';

			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('image')) {
				echo $this->upload->display_errors(); die();
			}else{
				$image = $this->upload->data('file_name');
			}
		}
		$data = array(
				'kd_barang' => '',
				'id_penjual' => $id_penjual['id_penjual'],
				'nama_barang' => $nama_barang,
				'harga' =>$harga,
				'stok' => $stok,
				'image' => $image
		);

		$result = $this->M_utama->tambah_barang($data);

		if ($result == true) {
				$this->session->set_flashdata('status', 'Berhasil Tambah Barang');
		}else{
			$this->session->set_flashdata('status', 'Gagal Tambah Barang');
		}

	redirect('C_utama/masukPenjual');
	}
	public function hapus_barang($id_barang)
	{
		$result = $this->M_utama->proses_hapusBarang($id_barang);

		if ($result == true) {
			$this->session->set_flashdata('status', 'Berhasil Hapus Barang');
		}else{
			$this->session->set_flashdata('status', 'Gagal Hapus Barang');
		}

		redirect('C_utama/masukPenjual');
	}
	public function pesananBarang()
	{
		$id_penjual = $this->M_utama->all_penjual($this->session->userdata('id_user'));
		$data['data'] = $this->M_utama->tampil_pesanan($id_penjual['id_penjual']);
		$this->load->view('V_pesananBarang', $data);
	}
	public function terima_pesanan($id_transaksi)
	{
		$result = $this->M_utama->proses_terimaPesanan($id_transaksi);

		if ($result == true) {
			$this->session->set_flashdata('status', 'Berhasil Terima Pesanan');
		}else{
			$this->session->set_flashdata('status', 'Gagal Terima Pesanan');
		}

		redirect('C_user/pesananBarang');
	}
	public function tolak_pesanan($id_transaksi)
	{
		$result = $this->M_utama->proses_tolakPesanan($id_transaksi);

		if ($result == true) {
			$this->session->set_flashdata('status', 'Berhasil Tolak Pesanan');
		}else{
			$this->session->set_flashdata('status', 'Gagal Tolak Pesanan');
		}

		redirect('C_user/pesananBarang');
	}
	public function pengiriman()
	{
		$id_penjual = $this->M_utama->all_penjual($this->session->userdata('id_user'));
		$data['data'] = $this->M_utama->tampil_pengiriman($id_penjual['id_penjual']);
		$this->load->view('V_pengirimanBarang', $data);
	}
	public function konfirmasi_pesanan($id_transaksi)
	{
		$result = $this->M_utama->proses_konfirmasiPesanan($id_transaksi);

		if ($result == true) {
			$this->session->set_flashdata('status', 'Pengiriman Sukses 100%');
		}else{
			$this->session->set_flashdata('status', 'Pengiriman Gagal');
		}

		redirect('C_user/pengiriman');
	}
}