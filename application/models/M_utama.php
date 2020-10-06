<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_utama extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function cek_login($where)
	{
		$sql = $this->db->get_where('tbl_user', $where);

		if ($sql->num_rows() < 1) {
			return false;
		} else {
			return $sql->row_array();
		}
	}
	public function all_barang($table_name)
	{
		$get = $this->db->get($table_name)->result_array();
		return $get;
	}
	public function d_barang($id_barang)
	{
		//$barang = $this->db->get_where('tbl_barang', ['kd_barang'=>$id_barang])->row_array();
		//return $barang;
		return $this->db
		->select('tbl_penjual.*, tbl_barang.*')
		->from('tbl_barang')
		->join('tbl_penjual', 'tbl_barang.id_penjual = tbl_penjual.id_penjual')
		->where('tbl_barang.kd_barang', $id_barang)
		->get()
		->row_array();
	}
	public function barang($id_barang)
	{
		return $this->db->get_where('tbl_barang',['kd_barang'=>$id_barang])->row_array();
	}
	public function checkout($alamat, $id_penjual, $id_user, $jumlah, $id_barang, $harga)
	{
		return $this->db->insert('tbl_transaksi', [
				'id_transaksi' => uniqid(),
				'alamat' => $alamat,
				'id_penjual' =>$id_penjual,
				'id_user' => $id_user,
				'jumlah' => $jumlah,
				'kd_barang' => $id_barang,
				'total_harga' => $harga,
				'status' => 'Dipesan'
		]) > 0;
	}
	public function keranjang($id_user)
	{
		return $this->db
		->select('tbl_transaksi.*, tbl_barang.*')
		->from('tbl_transaksi')
		->join('tbl_barang', 'tbl_transaksi.kd_barang = tbl_barang.kd_barang')
		->where('tbl_transaksi.status', 'Dikeranjang')
		->where('tbl_transaksi.id_user', $id_user)
		->get()
		->result_array();
	}
	public function all_keranjang($id_barang)
	{
		return $this->db
		->select('tbl_transaksi.*, tbl_barang.*')
		->from('tbl_transaksi')
		->join('tbl_barang', 'tbl_transaksi.kd_barang = tbl_barang.kd_barang')
		->where('tbl_barang.kd_barang', $id_barang)
		->get()
		->row_array();
	}
	public function masuk_keranjang($id_barang, $jumlah, $id_penjual, $total_harga, $id_user)
	{
		return $this->db->insert('tbl_transaksi', [
				'id_transaksi' => uniqid(),
				'alamat' => '',
				'id_penjual' =>$id_penjual,
				'id_user' => $id_user,
				'jumlah' => $jumlah,
				'kd_barang' => $id_barang,
				'total_harga' => $total_harga,
				'status' => 'Dikeranjang'
		]) > 0;
	}
	public function checkoutKeranjang($id_user, $alamat, $id_barang)
	{
		return $this->db
		->update('tbl_transaksi', [
			'alamat' => $alamat,
			'status' => 'Dipesan'
		],[
			'id_user' => $id_user,
			'status' => 'Dikeranjang',
			'kd_barang' => $id_barang
		]) > 0;
	}
	public function hapus_keranjang($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		return $hapus = $this->db->delete('tbl_transaksi');
	}
	public function checkoutAll($id_user, $alamat)
	{
		return $this->db
		->update('tbl_transaksi', [
			'alamat' => $alamat,
			'status' => 'Dipesan'
		], [
			'id_user' => $id_user,
			'status' => 'Dikeranjang',
		]) > 0;
	}
	public function pesanan($id_user)
	{
		return $this->db
		->select('tbl_transaksi.*, tbl_barang.*')
		->from('tbl_transaksi')
		->join('tbl_barang', 'tbl_transaksi.kd_barang = tbl_barang.kd_barang')
		->where('tbl_transaksi.id_user', $id_user)
		->get()
		->result_array();
	}
	// public function terimaPesanan($id_transaksi, $id_user)
	// {
	// 	return $this->db
	// 	->update('tbl_transaksi', [
	// 		'status' => 'Berhasil'
	// 	], [
	// 		'id_transaksi' => $id_transaksi,
	// 		'id_user' => $id_user,
	// 		'status' => 'Dipesan'
	// 	]) > 0;
	// }
	// public function terima_allPesanan($id_user)
	// {
	// 	return $this->db
	// 	->update('tbl_transaksi', [
	// 		'status' => 'Berhasil'
	// 	], [
	// 		'id_user' => $id_user,
	// 		'status' => 'Dipesan'
	// 	]) > 0;
	// }
	public function cek_loginPenjual($id_user)
	{
		$sql = $this->db->get_where('tbl_penjual', ['id_user' => $id_user]);
		if ($sql->num_rows() > 0) {
			return $sql->row_array();
		} else {
			return false;
		}
	}
	public function all_penjual($id_user)
	{
		return $this->db->get_where('tbl_penjual', ['id_user' => $id_user])->row_array();
	}
	public function barangPenjual($id_penjual)
	{
		return $this->db->get_where('tbl_barang', ['id_penjual' => $id_penjual])->result_array();
	}
	public function editProses($id_barang, $nama_barang, $harga, $stok)
	{
		return $this->db
		->update('tbl_barang', [
			'nama_barang' => $nama_barang,
			'harga' => $harga,
			'stok' => $stok
		], [
			'kd_barang' => $id_barang
		]) > 0;
	}
	public function proses_cari($keyword)
	{
		return $this->db
		->select('*')
		->from('tbl_barang')
		->like('nama_barang', $keyword)
		->get()
		->result_array();
	}
	public function tambah_barang($data)
	{
		return $this->db->insert('tbl_barang', $data) > 0;
	}
	public function tampil_pesanan($id_penjual)
	{
		return $this->db
		->select('tbl_transaksi.*, tbl_barang.*, tbl_user.*')
		->from('tbl_transaksi')
		->join('tbl_barang', 'tbl_transaksi.kd_barang = tbl_barang.kd_barang')
		->join('tbl_user', 'tbl_transaksi.id_user = tbl_user.id_user')
		->where('tbl_transaksi.status', 'Dipesan')
		->where('tbl_transaksi.id_penjual', $id_penjual)
		->get()
		->result_array();
	}
	public function proses_terimaPesanan($id_transaksi)
	{
		return $this->db
		->update('tbl_transaksi', [
			'status' => 'Diproses'
		], [
			'id_transaksi' => $id_transaksi
		]) > 0;
	}
	public function proses_tolakPesanan($id_transaksi)
	{
		return $this->db
		->update('tbl_transaksi', [
			'status' => 'Ditolak'
		], [
			'id_transaksi' => $id_transaksi
		]) > 0;
	}
	public function proses_hapusBarang($id_barang)
	{
		$this->db->where('kd_barang', $id_barang);
		return $hapus = $this->db->delete('tbl_barang');
	}
	public function tampil_pengiriman($id_penjual)
	{
		return $this->db
		->select('tbl_transaksi.*, tbl_barang.*, tbl_user.*')
		->from('tbl_transaksi')
		->join('tbl_barang', 'tbl_transaksi.kd_barang = tbl_barang.kd_barang')
		->join('tbl_user', 'tbl_transaksi.id_user = tbl_user.id_user')
		->where('tbl_transaksi.status', 'Diproses')
		->where('tbl_transaksi.id_penjual', $id_penjual)
		->get()
		->result_array();
	}
	public function proses_konfirmasiPesanan($id_transaksi)
	{
		return $this->db
		->update('tbl_transaksi', [
			'status' => 'Berhasil'
		], [
			'id_transaksi' => $id_transaksi
		]) > 0;
	}
}