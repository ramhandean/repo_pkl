<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class C_utama extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_utama');
	}
	public function index()
	{
		$this->load->view('V_login');
	}
	public function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = ['username'=>$username, 'password'=>md5($password)];

		$cek = $this->M_utama->cek_login($where);
		if ($cek == false) {
			$this->session->set_flashdata('error', 'login');
			$this->load->view('V_login');
			
		}else{
			$data_session = ['id_user' => $cek['id_user']];
			$this->session->set_userdata($data_session);

			redirect('C_user');
		}
	}
	public function masukPenjual()
	{
		$penjual = $this->M_utama->cek_loginPenjual($this->session->userdata('id_user'));
		$id_penjual = $this->M_utama->all_penjual($this->session->userdata('id_user'));
		if ($penjual) {
			$this->session->set_flashdata('error', 'login');
			$data['data'] = $this->M_utama->barangPenjual($id_penjual['id_penjual']);
			$this->load->view('V_penjual', $data);
		}else{

			$this->session->set_flashdata('status', 'Gagal Masuk Penjual');
			redirect('C_user');
		}
	}
	public function beliBarang()
	{
		redirect('C_user');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('C_utama'));
	}
	
}