<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAdmin extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$tgl=date('Y-m-d');

		$user = $this->session->userdata('username');
		$data['user'] 		= $this->admin_model->user($user);
		$data['karyawan'] = $this->admin_model->hitungJumlahKaryawan();
		$data['users'] 		= $this->admin_model->hitungJumlahUsers();
		$data['masuk'] 		= $this->admin_model->hitungJumlahKaryawanMasuk($tgl);
		$data['title'] 		= 'Dashboard';
		
		$this->load->view('templates/admin-header', $data);
		$this->load->view('templates/admin-navbar', $data);
		$this->load->view('templates/admin-sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/admin-footer');
	}

	public function records_kehadiran()
	{
		$user = $this->session->userdata('username');
		$data['user'] 		= $this->admin_model->user($user);
		$data['getTahun'] 		= $this->admin_model->getTahun();
		$data['records_kehadiran'] = $this->admin_model->getRecordsKehadiran();
		$data['title'] 		= 'Records Kehadiran';
		
		$this->load->view('templates/admin-header', $data);
		$this->load->view('templates/admin-navbar', $data);
		$this->load->view('templates/admin-sidebar');
		$this->load->view('admin/records_kehadiran_superadmin', $data);
		$this->load->view('templates/admin-footer');
	}

	public function hapus_semua_records()
	{
		// $id_departemen = $this->uri->segment(3);
		$this->admin_model->hapusSemuaRecords(); //simpan ke database
	  $this->session->set_flashdata('message', 'Data Records Kehadiran Berhasil DiHapus Semua!.');
		redirect('superadmin/records_kehadiran');
	}



	public function hapus_bulan_records()
	{
		$bulan	=$this->input->post('bulan');
		$tahun	=$this->input->post('tahun');

		// var_dump($bulan, $tahun);
		// die;
		if($bulan == 0 ){
			$this->admin_model->hapusTahunRecords($tahun);
		} else {
			$this->admin_model->hapusBulanRecords($bulan, $tahun);
		} 

		// $this->admin_model->hapusBulanRecords($bulan, $tahun);
		$this->session->set_flashdata('message', 'Data Records Kehadiran Berhasil DiHapus Semua!.');
		redirect('superadmin/records_kehadiran');

	}

  
}

