<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
	 	$this->load->model('Model_Register');
		$this->load->library('session');
		$this->load->library('form_validation');
	}
 
	public function index()
	{
		//var_dump('test');
		$this->load->view('view_register');

	}

	public function proses()
	{
		// var_dump('test');
		$this->form_validation->set_rules('nis_nip', 'nis_nip','trim|required|min_length[1]|max_length[10]|is_unique[tb_akun.nis_nip]');
		$this->form_validation->set_rules('id_role', 'id_role', 'required|trim');
		$this->form_validation->set_rules('nama_akun', 'nama_akun','trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('kelas', 'kelas', 'required|trim');
		// $this->form_validation->set_rules('foto_profil', 'foto_profil', 'callback_validation_file');

		//var_dump($this->form_validation->run());

		if ($this->form_validation->run()==true)
	   	{	
			$nis_nip = $this->input->post('nis_nip');
			$id_role = $this->input->post('id_role');
			$nama_akun = $this->input->post('nama_akun');
			$password = $this->input->post('password');
			$kelas = $this->input->post('kelas');
			$foto_profil = $this->validation_file();

			//var_dump($nis_nip);

			$data = array(
                'nis_nip' => $nis_nip,
                'id_role' => $id_role,
                'nama_akun' => $nama_akun,
                'password' => $password,
                'nama_akun' => $nama_akun,
                'kelas' => $kelas,
                'foto_profil' => $foto_profil
            );

			$this->Model_Register->register($data);

			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
			redirect('login');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('register');
		}
	}

	public function validation_file()
	{
		$config['upload_path']          = './foto/';
		$config['allowed_types']        = 'gif|jpg|png|PNG';
		$config['max_size']             = 2048;
		$config['max_width']            = 2048;
		$config['max_height']           = 2048;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto_profil'))
		{
			$data = $this->upload->data();
            return $data['file_name'];
		}
		else
		{
			$this->form_validation->set_message('validasi file', $this->upload->display_errors());
			return false;
		}

	}
}