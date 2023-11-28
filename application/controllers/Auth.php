<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('User_model');
		$_SESSION['login_time'] = time();

		if ($this->session->userdata('id') === null) {
			redirect('auth');
		}
	}
	public function index()
	{
		$ci = get_instance();
		if (time() - $_SESSION['login_time'] >= 1800) {
			session_destroy();
			redirect('auth/');
		}
		// echo "TEST WORK !";
		if ($ci->session->userdata('id_role') == '1') {
			redirect('admin');
		} elseif ($ci->session->userdata('id_role') == '2') {
			redirect('user');
		} else {
			$this->load->view('login');
		}
		// 	// echo ("hello");
	}
	public function Admin()
	{
		$this->load->view('templates/header_adm');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('templates/footer_adm');
		// echo ("hello");
	}

	public function login()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		$nip = $this->input->post('nip');
		$passwd = $this->input->post('password');
		$user = $this->db->get_where('tuser', ['nip_user' => $nip])->row_array();

		if ($this->form_validation->run()) {
			if (isset($user)) {
				// var_dump($user);
				// die;
				if (password_verify($passwd, $user['password'])) {
					// var_dump($user);
					// die;
					$this->session->set_userdata('id', $user['id_user']);
					$this->session->set_userdata('nip', $user['nip_user']);
					$this->session->set_userdata('id_role', $user['id_role']);
					if ($user['id_role'] == '1') {
						echo "<script>location.href='" . base_url('admin') . "';alert('Anda Berhasil Masuk Sebagai Admin');</script>";
					} else if ($user['id_role'] != '1') {
						echo "<script>location.href='" . base_url('user') . "';alert('Anda Berhasil Masuk Sebagai User');</script>";
					}
				} else {
					echo "<script>location.href='" . base_url('auth/') . "';alert('Password Salah');</script>";
				}
			} else {
				echo "<script>location.href='" . base_url('auth/') . "';alert('User Tidak Ada');</script>";
			}
		} else {
			// var_dump($user);
			// die;
			$this->load->view('index');
		}
	}

	public function logout()
	{
		$ci = get_instance();
		$id = $ci->session->userdata('id');
		// var_dump($user);die;
		$this->session->set_flashdata('message_login', $this->flasher('success', 'User has been logged out'));
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('id_role');
		$this->session->unset_userdata('nama_user');
		$this->session->unset_userdata('fotouser');
		$this->session->unset_userdata('nip_user');
		$this->session->unset_userdata('password');
		echo "<script>location.href='" . base_url('auth') . "';alert('User has been logged out');</script>";
	}
	public function flasher($class, $message)
	{
		return
			'<div class="alert alert-' . $class . ' alert-dismissible fade show" role="alert">
                ' . $message . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
	}
}
