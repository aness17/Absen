<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
		$this->load->model('Att_model');
		$this->cekauth();
		$_SESSION['login_time'] = time();
	}
	public function index()
	{
		$ci = get_instance();
		$id = $ci->session->userdata('id');
		$user = $this->User_model->getUserbyId($id);
		$absen = $this->Att_model->selectUser($id);

		$data = [
			'user' => $user,
			'absen' => $absen
		];

		$this->load->view('templates/header_usr');
		$this->load->view('user/dashboard', $data);
		$this->load->view('templates/footer_usr');
	}
	public function cekauth()
	{
		$ci = get_instance();
		// $id = $ci->session->userdata('id');
		if ($ci->session->userdata('id_role') == '2') {
			if (time() - $_SESSION['login_time'] >= 1800) {
				session_destroy();
				echo "<script>location.href='" . base_url('auth') . "';alert('Session Timeout.');</script>";
			}
		}
		if ($ci->session->userdata('id_role') == '1') {
			$this->session->set_flashdata('message_login', $this->flasher('success', 'Your not autorized'));
			$this->session->unset_userdata('id_user');
			$this->session->unset_userdata('id_role');
			$this->session->unset_userdata('name_user');
			echo "<script>location.href='" . base_url('auth') . "';alert('Your not authorized.');</script>";
		}
	}
	public function absen()
	{
		$ci = get_instance();
		$id = $ci->session->userdata('id');
		$user = $this->User_model->getUserbyId($id);

		$data = [
			'user' => $user
		];
		$this->load->view('templates/header_usr');
		$this->load->view('user/addabsen', $data);
		$this->load->view('templates/footer_usr');
		// echo ("hello");
	}
	public function addabsen()
	{
		$id = $this->input->post('id');
		$long = $this->input->post('lng');
		$lat = $this->input->post('lat');
		$img = $this->input->post('image');
		$att_status = $this->input->post('att_status');
		$status = $this->input->post('status');
		$stat = $this->input->post('stat');
		$reason = $this->input->post('reason');
		$img = str_replace('data:image/jpeg;base64,', '', $img);
		$img = str_replace(' ', '+', $img);

		//resource gambar diubah dari encode
		$data       = base64_decode($img);
		//menamai file, file dinamai secara random dengan unik
		$file       = uniqid() . '.png';
		$file_path = '' . $file;
		//memindahkan file ke folder upload
		file_put_contents('fotouser/' . $file, $data);
		$data = array(
			'id_user' => $id,
			'att_status' => $att_status,
			'status' => $stat,
			'work_status' => $status,
			'reason' => $reason,
			'foto_absen' => $file_path,
			'longitude' => $long,
			'latitude' => $lat
		);
		//print_r($data);
		$p = $this->Att_model->create($data);
		if ($p) {
			echo 'berhasil';
		} else {
			echo 'gagal';
		}
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
