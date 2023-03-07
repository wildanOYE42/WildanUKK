<?php
class Auth extends CI_Controller
{
	public function index() {
		$this->load->view('auth/login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$admin = $this->db->get_where('petugas', ['username' => $username])->row_array();
		$masyarakat = $this->db->get_where('masyarakat', ['username' => $username])->row_array();


		if ($admin) {
			if ($password == $admin['password']) {
				$data = [
					'username' => $admin['username'],
					'level' => $admin['level']
				];
				$this->session->set_userdata($data);
				redirect('admin');
			} elseif ($masyarakat) {

				if ($password == $masyarakat['password']) {
					if ($masyarakat['aktif'] == 1) {
						$data = [
							'username' => $masyarakat['username'],
							'nik' => $masyarakat['nik']
						];
						$this->session->set_userdata($data);
						redirect('user');
					} else {
						$this->session->set_flashdata('false', 'Akun sudah tidak aktif');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('false', 'Password salah');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('false', 'Password salah');
				redirect('auth');
			}
		} elseif ($masyarakat) {
			if ($password == $masyarakat['password']) {
				if ($masyarakat['aktif'] == 1) {
					$data = [
						'username' => $masyarakat['username'],
						'nik' => $masyarakat['nik']
					];
					$this->session->set_userdata($data);
					redirect('user');
				} else {
					$this->session->set_flashdata('false', 'Akun sudah tidak aktif');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('false', 'Password salah');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('false', 'Username tidak terdaftar');
			redirect('auth');
		}
	}


	// public function login() {
	// 	$post = $this->input->post(null, TRUE);
	// 	$this->load->model('m_login');
	// 	$query = $this->m_login->login($post);
	// 	if ($query->num_rows() > 0) {
	// 		$row = $query->row();
	// 		$params = array(
	// 			'id_petugas' => $row->id_petugas,
	// 			'level' => $row->level
	// 		);
	// 		$this->session->set_userdata($params);
	// 		echo "<script>
	// 		alert('Berhasil Login');
	// 		window.location='". base_url('admin'). "';
	// 		</script>";
	// 	} else {
	// 		echo "<script>
	// 		alert('Gagal Login');
	// 		window.location='". base_url('auth'). "';
	// 		</script>";
	// 	}
	// }

	public function register()
	{

		if ($this->session->userdata('level')) {
			redirect('admin');
		} elseif ($this->session->userdata('nik')) {
			redirect('user');
		}

		// validasi semua inputan yang ada di halaman register
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|min_length[16]|max_length[16]|numeric|is_unique[masyarakat.nik]', [
			'required' => 'NIK harus di isi',
			'min_length' => 'NIK harus 16 angka',
			'max_length' => 'NIK harus 16 angka',
			'is_unique' => 'NIK sudah terdaftar',
			'numeric' => 'NIK harus angka'
		]);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]', [
			'required' => 'Nama harus di isi',
			'min_length' => 'Nama Min 3 Huruf'
		]);

		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[masyarakat.username]', [
			'required' => 'Username harus di isi',
			'min_length' => 'Username Min 5 karakter',
			'is_unique' => 'Username Sudah terdaftar'
		]);

		$this->form_validation->set_rules('telp', 'No Telp', 'required|trim|min_length[11]|is_unique[masyarakat.telp]|max_length[13]|numeric', [
			'required' => 'No telp harus di isi',
			'min_length' => 'No telp Min 11 angka',
			'max_length' => 'No telp Max 13 angka',
			'numeric' => 'No telp harus angka',
			'is_unique' => 'No telp sudah terdaftar'
		]);

		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|matches[repassword]', [
			'required' => 'Password harus di isi',
			'min_length' => 'Password min 5 karakter',
			'matches' => 'Password harus sama dengan Ulangi Password'
		]);

		$this->form_validation->set_rules('repassword', 'repassword', 'required|trim|matches[password]', [
			'required' => 'Ulangi Password harus di isi',
			'matches' => 'Ulangi Password harus sama dengan Password'
		]);

		// jalankan form validasi 
		if ($this->form_validation->run() == false) {
			// jika validasi gagal
			$this->load->view('auth/register');
		} else {
			// jika validasi berhasil
			$this->edit_register();
		}
	}

	public function edit_register()
	{
		$data = [
			'nik' => htmlspecialchars($this->input->post('nik')),
			'nama' => htmlspecialchars($this->input->post('nama')),
			'username' => htmlspecialchars($this->input->post('username')),
			'password' => md5($this->input->post('password')),
			'telp' => htmlspecialchars($this->input->post('telp')),
			'aktif' => 1
		];

		if ($this->db->insert('masyarakat', $data)) {
			$this->session->set_flashdata('true', 'Akun baru berhasil dibuat, silahkan login');
			redirect('auth');
		} else {
			$this->session->set_flashdata('false', 'Akun baru gagal di buat, silahkan coba kembali');
			redirect('auth/register');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata(
            'message',
            '<div class="alert-success" role="alert">
            congratulation,your account has been creted. login!
            </div>'
		);
		redirect('auth');
	}


}
