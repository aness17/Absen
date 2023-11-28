<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
	public function cekauth()
	{
		$ci = get_instance();
		if ($ci->session->userdata('id_role') == '1') {
			if (time() - $_SESSION['login_time'] >= 1800) {
				session_destroy();
				echo "<script>location.href='" . base_url('auth') . "';alert('Session Timeout.');</script>";
			}
		}
		if ($ci->session->userdata('id_role') != '1') {
			$this->session->set_flashdata('message_login', $this->flasher('success', 'Your not autorized'));
			$this->session->unset_userdata('id_user');
			$this->session->unset_userdata('id_role');
			$this->session->unset_userdata('name_user');
			echo "<script>location.href='" . base_url('auth') . "';alert('Your not authorized.');</script>";
		}
	}
	public function index()
	{
		$tgl = date('Y-m-d');
		$attday = $this->Att_model->sumAtt($tgl);
		$atthistory = $this->Att_model->selectAtttoday($tgl);
		$att = $this->Att_model->sumAbsen($tgl);
		$user = $this->User_model->sumUser();

		// var_dump($user);
		// die;
		$data = [
			'attday' => $attday,
			'user' => $user,
			'att' => $att,
			'atthistory' => $atthistory,
			'header' => 'dashboard'
		];
		$this->load->view('templates/header_adm');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer_adm');
		// echo ("hello");
	}
	public function datauser()
	{
		$user = $this->User_model->selectAll();

		$data = [
			'user' => $user,
			'header' => 'user'
		];
		$this->load->view('templates/header_adm');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/datauser', $data);
		$this->load->view('templates/footer_adm');
		// echo ("hello");
	}
	public function dataatt()
	{
		$att = $this->Att_model->selectAll();

		$data = [
			'att' => $att,
			'header' => 'att'
		];
		$this->load->view('templates/header_adm');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/dataatt', $data);
		$this->load->view('templates/footer_adm');
		// echo ("hello");
	}
	public function adduser()
	{
		// $ci = get_instance();
		// if ($ci->session->userdata('id') != '1') {
		// 	redirect('admin/');
		// } else {
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nohp', 'No. Hp', 'required');
		// $this->form_validation->set_rules('fotoproduk', 'Foto Produk', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Karyawan', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');


		if ($this->form_validation->run() == true) {
			$config['upload_path']          = './fotouser/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 1000;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('fotouser')) {
				$db = [
					'nip_user' => $this->input->post('nip'),
					'nama_user' => $this->input->post('nama'),
					'nohp_user' => $this->input->post('nohp'),
					'alamat_user' => $this->input->post('alamat'),
					'fotouser' => $this->upload->data()["file_name"],
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'id_role' => $this->input->post('role')
				];

				var_dump($db);

				if ($this->User_model->create($db) > 0) {
					echo "<script>location.href='" . base_url('user') . "';alert('Data User Berhasil Ditambahkan');</script>";
				} else {
					$this->session->set_flashdata('message_login', $this->flasher('danger', 'Data User Gagal Ditambahkan'));
				}
				echo "<script>location.href='" . base_url('admin/datauser') . "';</script>";
			} else {
				$this->session->set_flashdata('message_login', $this->flasher('danger', $this->upload->display_errors()));
				echo "<script>location.href='" . base_url('admin/datauser') . "';</script>";
			}
		} else {
			$data = [
				'header' => 'user'
			];
			$this->load->view('templates/header_adm');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/adduser');
			$this->load->view('templates/footer_adm');
		}
		// }
	}
	public function edit($id)
	{
		// $ci = get_instance();
		// if ($ci->session->userdata('id') != '1') {
		// 	redirect('admin/');
		// } else {
		$user = $this->User_model->getUserbyId($id);
		// var_dump($user);
		// die;
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nohp', 'No. Hp', 'required');
		// $this->form_validation->set_rules('fotoproduk', 'Foto Produk', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Karyawan', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');


		if ($this->form_validation->run() == true) {
			$db = [
				'id_user' => $id,
				'nip_user' => $this->input->post('nip'),
				'nama_user' => $this->input->post('nama'),
				'nohp_user' => $this->input->post('nohp'),
				'alamat_user' => $this->input->post('alamat'),
				// 'fotouser' => $this->upload->data()["file_name"],
				'password' => $this->input->post('password'),
				'id_role' => $this->input->post('role')
			];
			if ($_FILES["fotouser"]["name"] != "") {
				$config['upload_path']          = './fotouser/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 1000;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('fotouser')) {
					unlink(FCPATH . 'fotouser/' . $user["fotouser"]);
					$db['fotouser'] = $this->upload->data()["file_name"];
				} else {
					$this->session->set_flashdata('message_login', $this->flasher('danger', $this->upload->display_errors()));
					var_dump($this->upload->display_errors());
					die;
					redirect('produk/edit/' . $id);
				}
			}
			if ($this->User_model->update($db) > 0) {
				$this->session->set_flashdata('message_login', $this->flasher('success', 'User has been registered!'));
			} else {
				$this->session->set_flashdata('message_login', $this->flasher('danger', 'Failed to create User'));
			}
			redirect('admin/datauser');
		} else {
			$data = [
				'user' => $user,
				'header' => 'user'
			];
			$this->load->view('templates/header_adm');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edituser', $data);
			$this->load->view('templates/footer_adm');
		}
		// }
	}
	public function delete($id)
	{
		// $ci = get_instance();
		// if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '1' || $ci->session->userdata('id_role') == '2' || $ci->session->userdata('id_role') == '3') {
		// 	echo ("Akses diblok");
		// } else {
		if ($id) {
			$user = $this->User_model->getUserbyId($id);

			unlink(FCPATH . 'fotouser/' . $user["fotouser"]);

			if ($this->User_model->delete($id) > 0) {
				$this->session->set_flashdata('message', $this->flasher('success', 'Success To Add Data'));
			} else {
				$this->session->set_flashdata('message', $this->flasher('danger', 'Failed To Add Data'));
			}
		} else {
			$this->session->set_flashdata('message', $this->flasher('danger', 'Id Is null'));
		}
		echo "<script>location.href='" . base_url('admin/datauser') . "';alert('Success');</script>";
		// }
	}
	public function deleteatt($id)
	{
		// $ci = get_instance();
		// if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '1' || $ci->session->userdata('id_role') == '2' || $ci->session->userdata('id_role') == '3') {
		// 	echo ("Akses diblok");
		// } else {
		if ($id) {
			$att = $this->Att_model->getAttbyId($id);

			unlink(FCPATH . 'fotouser/' . $att["fotouser"]);

			if ($this->Att_model->delete($id) > 0) {
				$this->session->set_flashdata('message', $this->flasher('success', 'Success To Add Data'));
			} else {
				$this->session->set_flashdata('message', $this->flasher('danger', 'Failed To Add Data'));
			}
		} else {
			$this->session->set_flashdata('message', $this->flasher('danger', 'Id Is null'));
		}
		echo "<script>location.href='" . base_url('admin/dataatt') . "';alert('Success.');</script>";
		// }
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
