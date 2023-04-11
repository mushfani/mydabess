<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
	 	$this->load->model('Model_Login');
		$this->load->library('session');
		$this->load->library('form_validation');

	}
 
	public function index()
	{
		$this->load->view('view_login');
	}
	
	public function proses()
	{
		$this->form_validation->set_rules('nis_nip', 'nis_nip','trim|required');
		$this->form_validation->set_rules('password', 'password', 'required|trim');
		
		$nis_nip = $this->input->post('nis_nip');
		$password = $this->input->post('password');

		$user = $this->Model_Login->login($nis_nip,$password);

		if ($user) {
			$session_data = array(
				'nis_nip' => $user->nis_nip,
				'id_role' => $user->id_role,
				'nama_akun' => $user->nama_akun,
				'kelas' => $user->kelas,
				'foto_profil' => $user->foto_profil,
				'is_login' => true
			);
	
			$this->session->set_userdata($session_data);
	
			if ($this->session->userdata('id_role') == 2) {
				redirect('siswa');				
			} else {
				redirect('guru');
			}
		} else {
			$this->session->set_flashdata('error', 'Nis/Nip & Password salah!');
			redirect('login', $data);
		}
	}
 
	public function logout()
	{
		$this->session->unset_userdata('nis_nip');
		$this->session->unset_userdata('nama_akun');
		$this->session->unset_userdata('is_login');
		$this->session->set_userdata('logged_in', FALSE);
        $this->session->sess_destroy();
		redirect('login');
	}
}