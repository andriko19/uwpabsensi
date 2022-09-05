<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
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

	public function departemen()
	{
		$user = $this->session->userdata('username');
		$data['user'] 			= $this->admin_model->user($user);
		$data['departemen'] = $this->admin_model->getDepartemen();
		$data['title'] 			= 'Departemen';
		
		$this->load->view('templates/admin-header', $data);
		$this->load->view('templates/admin-navbar', $data);
		$this->load->view('templates/admin-sidebar');
		$this->load->view('admin/departemen', $data);
		$this->load->view('templates/admin-footer');
	}

	public function tambah_departemen()
	{
		$user = $this->session->userdata('username');
		$data['user'] 		= $this->admin_model->user($user);
		$data['title'] 		= 'Tambah Departemen';

		$this->form_validation->set_rules('nama_departemen', 'Nama Departemen', 'required|trim|is_unique[data_departemen.nama_departemen]', [
			'is_unique' => 'Nama Departemen sudah terdaftar!',
			'required' => 'Tidak Boleh Kosong!'
		]);

		if($this->form_validation->run()==false) {
			$this->load->view('templates/admin-header', $data);
			$this->load->view('templates/admin-navbar', $data);
			$this->load->view('templates/admin-sidebar');
			$this->load->view('admin/tambah_departemen', $data);
			$this->load->view('templates/admin-footer');
		} else {
			$this->admin_model->tambahDepartemen(); //simpan ke database
		  $this->session->set_flashdata('message', 'Data Departemen Berhasil DiTambahkan!.');
			redirect('admin/departemen');
		}
	}

	public function ubah_departemen()
	{
		$id_departemen = $this->uri->segment(3);
		$user = $this->session->userdata('username');
		$data['user'] 			= $this->admin_model->user($user);
		$data['departemen'] = $this->admin_model->getDataByIdDepartemen($id_departemen);
		$data['title'] 			= 'Ubah Departemen';

		$this->form_validation->set_rules('nama_departemen', 'Nama Departemen', 'required|trim|is_unique[data_departemen.nama_departemen]', [
			'is_unique' => 'Nama Departemen sudah terdaftar!',
			'required' => 'Tidak Boleh Kosong!'
		]);

		if($this->form_validation->run()==false) {
			$this->load->view('templates/admin-header', $data);
			$this->load->view('templates/admin-navbar', $data);
			$this->load->view('templates/admin-sidebar');
			$this->load->view('admin/ubah_departemen', $data);
			$this->load->view('templates/admin-footer');
		} else {
			$this->admin_model->ubahDepartemen(); //simpan ke database
		  $this->session->set_flashdata('message', 'Data Departemen Berhasil DiUbah!.');
			redirect('admin/departemen');
		}
	}

	public function hapus_departemen()
	{
		$id_departemen = $this->uri->segment(3);
		$this->admin_model->hapusDepartemen($id_departemen); //simpan ke database
	  $this->session->set_flashdata('message', 'Data Departemen Berhasil DiHapus!.');
		redirect('admin/departemen');
	}

	public function karyawan()
	{
		$user = $this->session->userdata('username');
		$data['user'] 		= $this->admin_model->user($user);
		$data['karyawan'] = $this->admin_model->getKaryawan();
		$data['title'] 		= 'Karyawan';
		
		$this->load->view('templates/admin-header', $data);
		$this->load->view('templates/admin-navbar', $data);
		$this->load->view('templates/admin-sidebar');
		$this->load->view('admin/karyawan', $data);
		$this->load->view('templates/admin-footer');
	}

	public function tambah_karyawan()
	{
		$user = $this->session->userdata('username');
		$data['user'] 		= $this->admin_model->user($user);
		$data['departemen'] = $this->admin_model->getDepartemen();
		$data['title'] 		= 'Tambah Karyawan';

		$this->form_validation->set_rules('nik', 'NIDN/NIDK/NIK', 'required|trim|is_unique[data_karyawan.nik]', [
			'is_unique' => 'NIDN/NIDK/NIK sudah terdaftar!',
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);

		if($this->form_validation->run()==false) {
			$this->load->view('templates/admin-header', $data);
			$this->load->view('templates/admin-navbar', $data);
			$this->load->view('templates/admin-sidebar');
			$this->load->view('admin/tambah_karyawan', $data);
			$this->load->view('templates/admin-footer');
		} else {
			$config['upload_path']          = './assets/uploads/foto/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 800;
			$config['max_height']           = 800;
			// $config['encrypt_name']			= TRUE;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto'))
			{
				$data = $this->upload->display_errors();
				?>
					<link rel="stylesheet" href="<?= base_url(); ?>assets/sweetalert2/sweetalert2.min.css">
					<link rel="stylesheet" href="<?= base_url(); ?>assets/sweetalert2/animate.min.css">
					<script src="<?= base_url(); ?>assets/Sweetalert2/Sweetalert2.min.js"></script>
					<style type="text/css">
						body {
							font-family: "Helvetice Neve", Helvetice, Arial, sans-serif;
							font-size : 1.124em;
							font-weight: normal;
						}
					</style>
					<body></body>
					<script type="text/javascript">
						Swal.fire({
			        icon: 'error',
			        title: 'Peringatan',
			        text: 'Maaf foto yang anda masukkan tidak sesuai aturan!'
			      }).then((result) => {
			      	window.location='<?=site_url('admin/tambah_karyawan')?>';
			      }) 
					</script>
				<?php
			} else {

				$kirim['nik']						=$this->input->post('nik');
			  $kirim['nama_karyawan']	=$this->input->post('nama_karyawan');
			  $kirim['departemen']		=$this->input->post('departemen');
			  $kirim['foto'] 					=$this->upload->data('file_name');
			  $kirim['created_at']		=date('Y-m-d');

			  //untuk file yang ada pada folder Zend
				$this->load->library('zend');
				 
				//load yang ada di folder Zend
				$this->zend->load('Zend/Barcode');
				 
				//generate barcodenya
				$image_resource	= Zend_Barcode::factory('code128', 'image', array('text'=>$kirim['nik']), array())->draw();
				$image_name			= $kirim['nik'].'.png';
				$image_dir			=	'./assets/uploads/imgqrcode/';
				imagejpeg($image_resource, $image_dir.$image_name);

				$kirim['qrcode'] 			=$image_name;
				// $niksama							=$kirim['nik']; 

			  $this->admin_model->tambahKaryawan($kirim); //simpan ke database
			  $this->session->set_flashdata('message', 'Karyawan Baru Berhasil DiTambahkan!.');
				redirect('admin/karyawan');
			}	
		}
	}

	public function ubah_karyawan()
	{
		$id_karyawan = $this->uri->segment(3);
		$user = $this->session->userdata('username');
		$data['user'] 		= $this->admin_model->user($user);
		$data['karyawan'] = $this->admin_model->getDataByIdKaryawan($id_karyawan)->row_array();
		$data['departemen'] = $this->admin_model->getDepartemen();
		$data['title'] 		= 'Ubah Karyawan';

		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('departemen', 'Departemen', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);

		if($this->form_validation->run()==false) {
			$this->load->view('templates/admin-header', $data);
			$this->load->view('templates/admin-navbar', $data);
			$this->load->view('templates/admin-sidebar');
			$this->load->view('admin/ubah_karyawan', $data);
			$this->load->view('templates/admin-footer');
		} else {
			$id_karyawann		=$this->input->post('id_karyawann');
		  $nama_karyawan	=$this->input->post('nama_karyawan');
		  $departemen			=$this->input->post('departemen');
		  // $input['nama_karyawan'] = $this->input->post('nama_karyawan');
		  // $input['departemen']		= $this->input->post('departemen');
		  $foto_lama			=$this->input->post('fotolama');
		  $path 					= './assets/uploads/foto/';

			// jika ada gambar yang diupload
			$upload_foto = $_FILES['foto']['name'];

			if ($upload_foto) {
				$config['upload_path']          = $path;
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2048;
				$config['max_width']            = 800;
				$config['max_height']           = 800;
				// $config['encrypt_name']			= TRUE;
				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('foto')) {
					$data = $this->upload->display_errors();
					?>
						<link rel="stylesheet" href="<?= base_url(); ?>assets/sweetalert2/sweetalert2.min.css">
						<link rel="stylesheet" href="<?= base_url(); ?>assets/sweetalert2/animate.min.css">
						<script src="<?= base_url(); ?>assets/Sweetalert2/Sweetalert2.min.js"></script>
						<style type="text/css">
							body {
								font-family: "Helvetice Neve", Helvetice, Arial, sans-serif;
								font-size : 1.124em;
								font-weight: normal;
							}
						</style>
						<body></body>
						<script type="text/javascript">
							Swal.fire({
				        icon: 'error',
				        title: 'Peringatan',
				        text: 'Maaf foto yang anda masukkan tidak sesuai aturan!'
				      }).then((result) => {
				      	window.location='<?=site_url('admin/karyawan')?>';
				      }) 
						</script>
					<?php
				} else {
					$foto_baru = $this->upload->data('file_name');
					$upload = (['nama_karyawan' => $nama_karyawan,
											'departemen'		=> $departemen,
											'foto'					=> $foto_baru]);
					$upload_file = array_merge($upload);
					unlink(FCPATH . $path . $foto_lama);
					$where = array('id_karyawan' => $id_karyawann);
					if ($this->admin_model->editKaryawan($upload_file, $where) == true) 
					{
						$this->session->set_flashdata('message', 'Data Karyawan Berhasil Diubah!.');
						redirect('admin/karyawan');
					} else {
						echo "Gagal Upload Database";
					}				
				}
			} else {
				$upload = (['nama_karyawan' => $nama_karyawan,
										'departemen'		=> $departemen,
										'foto'					=> $foto_lama]);
				$upload_file = array_merge($upload);
				// unlink(FCPATH . $path . $foto_lama);
				$where = array('id_karyawan' => $id_karyawann);
				if ($this->admin_model->editKaryawan($upload_file, $where) == true) 
				{
					$this->session->set_flashdata('message', 'Data Karyawan Berhasil Diubah!.');
					redirect('admin/karyawan');
				} else {
					echo "Gagal Upload Database";
				}					
			}
		}
	}

	public function cetak_barcode($id_karyawan)
	{
		$data['barCode'] 	= $this->admin_model->getDataByIdKaryawan($id_karyawan)->row_array();
		$barcode 			= $data['barCode']['nik'];
		$data['title'] 		= 'Cetak Barcode';
		
		$html = $this->load->view('admin/cetak_barcode', $data, TRUE);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-L']);
		$mpdf->SetHTMLHeader('
		<div style="text-align: right; font-weight: bold;">
		    Barcode By Id : '.$barcode.' 
		</div>');
		$mpdf->SetHTMLFooter('
		<table width="100%">
		    <tr>
		        <td width="33%">{DATE j-m-Y}</td>
		        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
		        <td width="33%" style="text-align: right;">Universitas Wijaya Putra</td>
		    </tr>
		</table>');
		$mpdf->WriteHTML($html);
		$mpdf->Output('Cetak_barcode/'.$barcode.'.pdf','I');
	}

	public function cetak_barcode_all()
	{
		$data['karyawan'] = $this->admin_model->getKaryawan();
		$data['title'] 		= 'Cetak Barcode All';
		
		$html = $this->load->view('admin/cetak_barcode_all', $data, TRUE);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-L']);
		$mpdf->SetHTMLHeader('
		<div style="text-align: right; font-weight: bold;">
		    Barcode By Id : All 
		</div>');
		$mpdf->SetHTMLFooter('
		<table width="100%">
		    <tr>
		        <td width="33%">{DATE j-m-Y}</td>
		        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
		        <td width="33%" style="text-align: right;">Universitas Wijaya Putra</td>
		    </tr>
		</table>');
		$mpdf->WriteHTML($html);
		$mpdf->Output('Cetak_barcode_all.pdf','I');
	}

	public function hapus_karyawan($id_karyawan)
	{
		$data = $this->admin_model->getDataByIdKaryawan($id_karyawan)->row();
		$barCode 	='./assets/uploads/imgqrcode/' . $data->qrcode;
		$foto 		='./assets/uploads/foto/' . $data->foto;

		if (is_readable($barCode) && unlink($barCode)) {
			if (is_readable($foto) && unlink($foto)) {
				$this->admin_model->hapusKaryawan($id_karyawan);
				$this->session->set_flashdata('message', 'Data Karyawan Berhasil Dihapus!.' );
				redirect('admin/karyawan');
			} else {
				echo "Gagal";
			}
		} else {
			echo "Gagal";
		}
	}

	public function records_kehadiran()
	{
		$user = $this->session->userdata('username');
		$data['user'] 		= $this->admin_model->user($user);
		$data['records_kehadiran'] = $this->admin_model->getRecordsKehadiran();
		$data['title'] 		= 'Records Kehadiran';
		
		$this->load->view('templates/admin-header', $data);
		$this->load->view('templates/admin-navbar', $data);
		$this->load->view('templates/admin-sidebar');
		$this->load->view('admin/records_kehadiran', $data);
		$this->load->view('templates/admin-footer');
	}

	public function tambah_records_kehadiran()
	{
		$user = $this->session->userdata('username');
		$data['user'] 		= $this->admin_model->user($user);
		$data['title'] 		= 'Tambah Records Kehadiran';

		$this->form_validation->set_rules('nik', 'NIDN/NIDK/NIK', 'required|trim', [
			'is_unique' => 'NIDN/NIDK/NIK sudah terdaftar!',
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);

		if($this->form_validation->run()==false) {
			$this->load->view('templates/admin-header', $data);
			$this->load->view('templates/admin-navbar', $data);
			$this->load->view('templates/admin-sidebar');
			$this->load->view('admin/tambah_records_kehadiran', $data);
			$this->load->view('templates/admin-footer');
		} else {
			$this->admin_model->tambahRecordsKehadiran(); //simpan ke database
		  $this->session->set_flashdata('message', 'Records Kehadiran Berhasil DiTambahkan!.');
			redirect('admin/records_kehadiran');
		}
	}

	function get_autocomplete()
	{
    if (isset($_GET['term'])) {
      $result = $this->admin_model->search_blog($_GET['term']);
      if (count($result) > 0) {
      foreach ($result as $row)
          $result_array[] =array(
              'label'     => $row->nik,
              'nama_karyawan'=> $row->nama_karyawan,
              'departemen'=> $row->departemen,
           );
          echo json_encode($result_array);
      }
    }
  }

  function get_nama_karyawan()
	{
    if (isset($_GET['term'])) {
      $result = $this->admin_model->search_nama_karyawan($_GET['term']);
      if (count($result) > 0) {
      foreach ($result as $row)
          $result_array[] =array(
            'label'=> $row->nama_karyawan,
          );
          echo json_encode($result_array);
      }
    }
  }

  public function laporan()
  {
  	$user = $this->session->userdata('username');
		$data['user'] 		= $this->admin_model->user($user);
		$data['departemen'] = $this->admin_model->getDepartemen();
		$data['title'] 		= 'Laporan Detail Kehadiran';

		$tanggalAwal 	 = $this->input->post('tanggalAwal');
		$tanggalAkhir  = $this->input->post('tanggalAkhir');
		$departemen 	 = $this->input->post('departemen');
		$nama_karyawan = htmlspecialchars($this->input->post('nama_karyawan', true));



		$data['tanggalAwal'] 		= $tanggalAwal;
		$data['tanggalAkhir']		= $tanggalAkhir;
		$data['departemenn']		= $departemen;
		$data['nama_karyawan']	= $nama_karyawan;

		
		$data['subtitle']	= 'Dari Tanggal : <strong>'.date('d F Y', strtotime($tanggalAwal)).'</strong>, Sampai Tanggal : <strong>'.date('d F Y', strtotime($tanggalAkhir)).'</strong>. Departemen : <strong>'.$departemen.'</strong>. Nama Karyawan :<strong>'.$nama_karyawan.'</strong>';

		if($nama_karyawan == null && $departemen == null){
			$data['laporan']= $this->admin_model->tampilkanLaporanTgl($tanggalAwal, $tanggalAkhir);
		} else if ($nama_karyawan == null){
			$data['laporan']= $this->admin_model->tampilkanLaporanDepar($tanggalAwal, $tanggalAkhir, $departemen);
		} else if ($nama_karyawan !== null){
			$data['laporan']= $this->admin_model->tampilkanLaporanNama($tanggalAwal, $tanggalAkhir, $departemen, $nama_karyawan);
		} else {
			echo "Gagal";
		}

		$this->load->view('templates/admin-header', $data);
		$this->load->view('templates/admin-navbar', $data);
		$this->load->view('templates/admin-sidebar');
		$this->load->view('admin/laporan', $data);
		$this->load->view('templates/admin-footer');
  }

  public function cetak_laporan()
  {
  	$tanggalAwal 		= $this->uri->segment(3);
  	$tanggalAkhir 	= $this->uri->segment(4);
  	$departemen 		= $this->uri->segment(5);
  	$nama_karyawan  = rawurldecode($this->uri->segment(6));
  	$data['tanggalAwal']	= $tanggalAwal;
  	$data['tanggalAkhir']	= $tanggalAkhir;
  	$data['departemenn']	= $departemen;
	$data['nama_karyawan']= $nama_karyawan;

  	if($nama_karyawan == null && $departemen == null){
			$data['cetak_laporan']= $this->admin_model->tampilkanLaporanTgl($tanggalAwal, $tanggalAkhir);
		} else if ($nama_karyawan == null){
			$data['cetak_laporan']= $this->admin_model->tampilkanLaporanDepar($tanggalAwal, $tanggalAkhir, $departemen);
		} else if ($nama_karyawan !== null){
			$data['cetak_laporan']= $this->admin_model->tampilkanLaporanNama($tanggalAwal, $tanggalAkhir, $departemen, $nama_karyawan);
		} else {
			echo "Gagal";
		}

  	// $data['cetak_laporan']= $this->admin_model->cetakLaporan($tanggalAwal, $tanggalAkhir);
		$data['title'] 		= 'Cetak Laporan';
		
		$html = $this->load->view('admin/cetak_laporan', $data, TRUE);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
		$mpdf->SetHTMLHeader('
		<div style="text-align: center; font-weight: bold; margin-bottom: 10px;">
		   <img src="'.base_url('assets/img/UWP.png').'" style="height: 50px; width: auto;"> 
		</div>');
		$mpdf->SetHTMLFooter('
		<table width="100%">
		    <tr>
		        <td width="33%">{DATE j-m-Y}</td>
		        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
		        <td width="33%" style="text-align: right;">Universitas Wijaya Putra</td>
		    </tr>
		</table>');
		$mpdf->WriteHTML($html);
		$mpdf->Output('Cetak Laporan Tanggal '.$tanggalAwal.' sd '.$tanggalAkhir.'.pdf','I');
  }

  public function cetak_excel()
  {
  	$tanggalAwal 		= $this->uri->segment(3);
  	$tanggalAkhir 	= $this->uri->segment(4);
  	$departemen 		= $this->uri->segment(5);
  	$nama_karyawan  = rawurldecode($this->uri->segment(6));

  	if($nama_karyawan == null && $departemen == null){
			$data['cetak_excel']= $this->admin_model->tampilkanLaporanTgl($tanggalAwal, $tanggalAkhir);
		} else if ($nama_karyawan == null){
			$data['cetak_excel']= $this->admin_model->tampilkanLaporanDepar($tanggalAwal, $tanggalAkhir, $departemen);
		} else if ($nama_karyawan !== null){
			$data['cetak_excel']= $this->admin_model->tampilkanLaporanNama($tanggalAwal, $tanggalAkhir, $departemen, $nama_karyawan);
		} else {
			echo "Gagal";
		}

  // 	$this->load->view('admin/cetak_excel',$data);

  	require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
  	require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

  	$objPHPEcel = new PHPExcel();

  	$objPHPEcel->getProperties()->setCreator("ICT UWP");
  	$objPHPEcel->getProperties()->setLastModifiedBy("ICT UWP");
  	$objPHPEcel->getProperties()->setTitle("Laporan Kehadiran Karyawan");
  	$objPHPEcel->getProperties()->setSubject("");
  	$objPHPEcel->getProperties()->setDescription("");

  	$objPHPEcel->setActiveSheetIndex(0);

  	$objPHPEcel->getActiveSheet()->setCellValue('A1','LAPORAN KEHADIRAN KARYAWAN UNIVERSITAS WIJATA PUTRA');
  	$objPHPEcel->getActiveSheet()->setCellValue('A2','Dari Tanggal          : '.$tanggalAwal.'');
  	$objPHPEcel->getActiveSheet()->setCellValue('A3','Sampai Tanggal   : '.$tanggalAkhir.'');
  	$objPHPEcel->getActiveSheet()->setCellValue('A4','Departemen         : '.$departemen.'');
  	$objPHPEcel->getActiveSheet()->setCellValue('A5','Nama Karyawan  : '.$nama_karyawan.'');

  	$objPHPEcel->getActiveSheet()->setCellValue('A7','NO');
  	$objPHPEcel->getActiveSheet()->setCellValue('B7','NIDN/NIDK/NIK');
  	$objPHPEcel->getActiveSheet()->setCellValue('C7','NAMA');
  	$objPHPEcel->getActiveSheet()->setCellValue('D7','DEPARTEMEN');
  	$objPHPEcel->getActiveSheet()->setCellValue('E7','TANGGAL');
  	$objPHPEcel->getActiveSheet()->setCellValue('F7','JAM MASUK');
  	$objPHPEcel->getActiveSheet()->setCellValue('G7','JAM PULANG');
  	$objPHPEcel->getActiveSheet()->setCellValue('H7','KETERANGAN');

  	$baris=8;
  	$no=1;

  	foreach ($data['cetak_excel'] as $data) {
  		$objPHPEcel->getActiveSheet()->setCellValue('A'.$baris, $no);
  		$objPHPEcel->getActiveSheet()->setCellValue('B'.$baris, $data['nik']);
  		$objPHPEcel->getActiveSheet()->setCellValue('C'.$baris, $data['nama_karyawan']);
  		$objPHPEcel->getActiveSheet()->setCellValue('D'.$baris, $data['departemen']);
  		$objPHPEcel->getActiveSheet()->setCellValue('E'.$baris, $data['tgl']);
  		$objPHPEcel->getActiveSheet()->setCellValue('F'.$baris, $data['jam_masuk']);
  		$objPHPEcel->getActiveSheet()->setCellValue('G'.$baris, $data['jam_keluar']);
  		$objPHPEcel->getActiveSheet()->setCellValue('H'.$baris, $data['keterangan']);

  		$no++;
  		$baris++;
  	}

  	$filename = "Laporan-Kehadiran-Karyawan".date("d/m/Y-H:i:s").'.xlsx';

  	$objPHPEcel->getActiveSheet()->setTitle("Laporan Kehadiran Karyawan");

  	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  	header('Content-Disposition: attachment;filename="'.$filename.'"');
  	header('Cache-Control: max-age=0');

  	$writer=PHPExcel_IOFactory::createWriter($objPHPEcel,'Excel2007');
  	$writer->save('php://output');

  	exit;
  }

  public function laporan_kalkulasi()
  {
  	$user = $this->session->userdata('username');
		$data['user'] 		= $this->admin_model->user($user);
		$data['departemen'] = $this->admin_model->getDepartemen();
		$data['title'] 		= 'Laporan Kalkulasi Kehadiran';

		$tanggalAwal 	 = $this->input->post('tanggalAwal');
		$tanggalAkhir  = $this->input->post('tanggalAkhir');
		$departemen 	 = $this->input->post('departemen');
		$nama_karyawan = htmlspecialchars($this->input->post('nama_karyawan', true));

		$data['tanggalAwal'] 		= $tanggalAwal;
		$data['tanggalAkhir']		= $tanggalAkhir;
		$data['departemenn']		= $departemen;
		$data['nama_karyawan']	= $nama_karyawan;

		
		$data['subtitle']	= 'Dari Tanggal : <strong>'.date('d F Y', strtotime($tanggalAwal)).'</strong>, Sampai Tanggal : <strong>'.date('d F Y', strtotime($tanggalAkhir)).'</strong>. Departemen : <strong>'.$departemen.'</strong>. Nama Karyawan :<strong>'.$nama_karyawan.'</strong>';

		if($nama_karyawan == null && $departemen == null){
			$data['laporan']= $this->admin_model->tampilkanLaporanKalTgl($tanggalAwal, $tanggalAkhir);
		} 
			// else if ($nama_karyawan == null){
		// 	$data['laporan']= $this->admin_model->tampilkanLaporanDepar($tanggalAwal, $tanggalAkhir, $departemen);
		// } else if ($nama_karyawan !== null){
		// 	$data['laporan']= $this->admin_model->tampilkanLaporanNama($tanggalAwal, $tanggalAkhir, $departemen, $nama_karyawan);
		// } else {
		// 	echo "Gagal";
		// }

		$this->load->view('templates/admin-header', $data);
		$this->load->view('templates/admin-navbar', $data);
		$this->load->view('templates/admin-sidebar');
		$this->load->view('admin/laporan_kalkulasi', $data);
		$this->load->view('templates/admin-footer');
  }

  
}

