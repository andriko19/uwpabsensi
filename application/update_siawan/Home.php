<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		// if (!$this->session->userdata('username')) {
		// 	redirect('home/login_admin');
		// }
		// $this->load->library('form_validation');
		$this->load->model('users_model');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function absen()
	{
		$nik = $this->input->post('nik');
		date_default_timezone_set('Asia/Jakarta');
		$tgl=date('Y-m-d');
		$jam_klr=date('H:i:s');
		$jam_msk=date('H:i:s');
		// $jam_set=11:00:00;

		$karyawan = $this->users_model->getKaryawanById($nik);
		$cek_nik = $this->users_model->cek_nik($nik);
		$cek_abs_klr = $this->users_model->kar_abs_klr($nik,$tgl);
		$cek_set = $this->users_model->cek_set($nik,$tgl);

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
			<body>
				<?php
          if (function_exists('date_default_timezone_set'))
          date_default_timezone_set('Asia/Jakarta');
        ?>
			</body>
		<?php

		if (!$cek_nik){
			?>
				<script type="text/javascript">
					Swal.fire({
						// position: 'top-end',
		        icon: 'error',
		        title: 'Akun Anda Belum Terdaftar, Silahkan Menghubungi Admin',
		       	showConfirmButton: false,
  					timer: 4500
		      }).then((result) => {
		      	window.location='<?=site_url('home')?>';
		      }) 
				</script>
			<?php			
		}  else if ($cek_abs_klr && $jam_msk!='00:00:00') {
			$this->users_model->kar_abs_klr($nik,$tgl);
			?>
				<script type="text/javascript">
					var karyawan= <?php echo json_encode($karyawan['nama_karyawan']); ?>;

					var d = new Date();
					var hours = d.getHours();
			    var minutes = d.getMinutes();
			    var seconds = d.getSeconds();
			    var tanggal = ("0" + d.getDate()).slice(-2);
			    var month = new Array();
			    month[0] = "Januari";
			    month[1] = "Februari";
			    month[2] = "Maret";
			    month[3] = "April";
			    month[4] = "Mei";
			    month[5] = "Juni";
			    month[6] = "Juli";
			    month[7] = "Agustus";
			    month[8] = "September";
			    month[9] = "Oktober";
			    month[10] = "Nopember";
			    month[11] = "Desember";
			    var bulan = month[d.getMonth()];
			    var tahun = d.getFullYear();

					Swal.fire({
						// position: 'top-end',
		        icon: 'success',
		        title: 'Selamat Jalan '+karyawan+' Tanggal ' + tanggal + ' ' + bulan + ' ' + tahun +' Jam Pulang '+hours+':'+minutes+':'+seconds+' WIB.',
		       	showConfirmButton: false,
  					timer: 5500
		      }).then((result) => {
		      	window.location='<?=site_url('home')?>';
		      })
				</script>
			<?php
		} else if ($cek_nik) {
			$this->users_model->kar_abs_msk($nik);
			?>
				<script type="text/javascript">

					var karyawan= <?php echo json_encode($karyawan['nama_karyawan']); ?>;

					var d = new Date();
					var hours = d.getHours();
			    var minutes = d.getMinutes();
			    var seconds = d.getSeconds();
			    var tanggal = ("0" + d.getDate()).slice(-2);
			    var month = new Array();
			    month[0] = "Januari";
			    month[1] = "Februari";
			    month[2] = "Maret";
			    month[3] = "April";
			    month[4] = "Mei";
			    month[5] = "Juni";
			    month[6] = "Juli";
			    month[7] = "Agustus";
			    month[8] = "September";
			    month[9] = "Oktober";
			    month[10] = "Nopember";
			    month[11] = "Desember";
			    var bulan = month[d.getMonth()];
			    var tahun = d.getFullYear();

					Swal.fire({
						// position: 'top-end',
		        icon: 'success',
		        title: 'Selamat Datang '+karyawan+' Tanggal ' + tanggal + ' ' + bulan + ' ' + tahun +' Jam Masuk '+hours+':'+minutes+':'+seconds+' WIB.',
		       	showConfirmButton: false,
  					timer: 5500
		      }).then((result) => {
		      	window.location='<?=site_url('home')?>';
		      })
				</script>
			<?php			
		} 
	}
}