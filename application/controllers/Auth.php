<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('users_model');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('admin');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('templates/auth-header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth-footer');
		} else {
			// apabila validasi alert-success
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['username' => $username])->row_array();
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
		<?php
		// jika usernya ada
		if ($user) {
			// jika passwornya benar
			if (password_verify($password, $user['password'])) {
				// jika benra
				$data = [
					'username' 	 => $user['username'],
					'nama_depan' => $user['nama_depan'],
					'role' 			 => $user['role']
				];
				$this->session->set_userdata($data);
				if ($user['role'] == 'administrator') {
					?>
						<script type="text/javascript">
							Swal.fire({
				        icon: 'success',
				        title: 'Success',
				        text: 'Selamat Admin, Anda Berhasil Login!'
				      }).then((result) => {
				      	window.location='<?=site_url('admin')?>';
				      }) 
						</script>
					<?php
				} else {
					?>
						<script type="text/javascript">
							Swal.fire({
				        icon: 'success',
				        title: 'Success',
				        text: 'Selamat Seper Admin, Anda Berhasil Login!'
				      }).then((result) => {
				      	window.location='<?=site_url('superadmin')?>';
				      }) 
						</script>
					<?php
				}
			} else {
				?>
					<script type="text/javascript">
						Swal.fire({
			        icon: 'error',
			        title: 'Peringatan',
			        text: 'Password Anda Salah!'
			      }).then((result) => {
			      	window.location='<?=site_url('auth')?>';
			      }) 
					</script>
				<?php
			}
		} else {
			?>
				<script type="text/javascript">
					Swal.fire({
		        icon: 'error',
		        title: 'Peringatan',
		        text: 'Username Belum Terdaftar!'
		      }).then((result) => {
		      	window.location='<?=site_url('auth')?>';
		      }) 
				</script>
			<?php
		}
	}

	public function register_absensi()
	{
		if ($this->session->userdata('username')) {
			redirect('admin');
		}
		
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
			'is_unique' => 'Username sudah digunakan!',
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
			'matches' => 'Password harus sama!',
			'min_length' => 'Password harus 6 karakter!',
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if($this->form_validation->run()==false) {
			$data['title'] = 'Register';
			$this->load->view('templates/auth-header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth-footer');
		} else {
			$data = [
				'nama_depan'   => htmlspecialchars($this->input->post('nama_depan', 'true')),
				'nama_belakang'=> htmlspecialchars($this->input->post('nama_belakang', 'true')),
				'username'     => htmlspecialchars($this->input->post('username', 'true')),
				'password'     => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role' 			=> htmlspecialchars($this->input->post('role', 'true')),
				'foto' 		   	 => 'default.jpg',
				'created_at'   => date('Y-m-d')
			];
			$this->users_model->register($data);
			$this->session->set_flashdata('message', 'Akun Baru Berhasil DiTambahkan!.');
			redirect('auth');
		}
	}

	public function logout() 
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_depan');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('message', 'Anda Sudah Berhasil Logout.');
		redirect('auth');
	}

}
