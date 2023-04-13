<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('id_role') != '1') {
			redirect('./Login');
		}

	 	$this->load->model('Model_Guru');
	}

	public function index()
	{
		$this->load->view('view_guru_home');
	}

	public function mata_pelajaran()
	{
		$data['data']=$this->Model_Guru->getRecords();
		$this->load->view('view_guru_matapelajaran', $data);
	}

	public function edit_mapel($kode_mapel)
	{
		$data['data']=$this->Model_Guru->tampilmapel_by_kode($kode_mapel);
		//var_dump($data);die;
		$this->load->view('view_guru_edit_mapel', $data);
		//$this->load->view('view_guru_edit_mapel');
	}

	public function materi()
	{
		$datamateri['datamapel']=$this->Model_Guru->getRecords();
		$datamateri['datamateri']=$this->Model_Guru->getRecords2();
		$this->load->view('view_guru_materi', $datamateri);
	}

	public function recall()
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_recall_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords5();
		//$dataevaluasi['dataidrecall']=$id_recall;
		$this->load->view('view_guru_recall', $dataevaluasi);
	}

	public function edit_recall($id_recall)
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_recall_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->tampilrecall_by_id($id_recall);
		$this->load->view('view_guru_edit_recall', $dataevaluasi);
	}

	public function formatif()
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_formatif_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords7();
		//var_dump($dataevaluasi['dataevaluasi']);die;
		$this->load->view('view_guru_formatif', $dataevaluasi);
	}
	
	public function edit_formatif($id_formatif)
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_formatif_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->tampilformatif_by_id($id_formatif);
		$this->load->view('view_guru_edit_formatif', $dataevaluasi);
	}

	public function detail_materi($kode_materi)
	{
		$datamateri['datamapel']=$this->Model_Guru->getRecords();
		$datamateri['datamateri']=$this->Model_Guru->tampilmateri_by_kode($kode_materi);
		//var_dump($datamateri) ; die();
		$this->load->view('view_guru_detail_materi', $datamateri);
	}

	public function edit_materi($kode_materi)
	{
		$data['datamapel']=$this->Model_Guru->getRecords();
		$data['datamateri']=$this->Model_Guru->tampilmateri_by_kode($kode_materi);
		$this->load->view('view_guru_edit_materi', $data);
	}

	public function edit_evaluasi($id_evaluasi)
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_eval_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->tampilevaluasi_by_id($id_evaluasi);
		$this->load->view('view_guru_edit_evaluasi', $dataevaluasi);
	}

	public function edit_soal_evaluasi($id_soal,$id_evaluasi){
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->getRecords4();
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalevaluasi_by_row($id_soal);
		$datasoalevaluasi['idevaluasi']=$id_evaluasi;
		$datasoalevaluasi['idSoal'] = $id_soal;
		$this->load->view('view_guru_edit_soalevaluasi', $datasoalevaluasi);
	}

	public function edit_soal_formatif($id_soal,$id_formatif){
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->getRecords8();
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalformatif_by_row($id_soal);
		$datasoalevaluasi['idformatif']=$id_formatif;
		$datasoalevaluasi['idSoal'] = $id_soal;
		$this->load->view('view_guru_edit_soalformatif', $datasoalevaluasi);
	}

	public function edit_soal_recall($id_soal,$id_recall){
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->getRecords6();
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalrecall_by_row($id_soal);
		$datasoalevaluasi['idrecall']=$id_recall;
		$datasoalevaluasi['idSoal'] = $id_soal;
		$this->load->view('view_guru_edit_soalrecall', $datasoalevaluasi);
	}

	public function edit_soal_lkpd($id_soal,$id_lkpd){
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->getRecords10();
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoallkpd_by_row($id_soal);
		$datasoalevaluasi['idlkpd']= $id_lkpd;
		$datasoalevaluasi['idSoal'] = $id_soal;
		$this->load->view('view_guru_edit_soallkpd', $datasoalevaluasi);
	}

	public function evaluasi()
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_eval_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords3();
		$this->load->view('view_guru_evaluasi', $dataevaluasi);
	}

	public function lkpd()
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_lkpd_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords9();
		$this->load->view('view_guru_lkpd', $dataevaluasi);
	}

	public function edit_lkpd($id_lkpd)
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_lkpd_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->tampillkpd_by_id($id_lkpd);
		$this->load->view('view_guru_edit_lkpd', $dataevaluasi);
	}

	public function detail_evaluasi($id_evaluasi)
	{
		$datasoalevaluasi['datamateri']=$this->Model_Guru->tampilevaluasi_by_id($id_evaluasi);
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalevaluasi_by_id($id_evaluasi);
		$datasoalevaluasi['dataidevaluasi']=$id_evaluasi;
		$this->load->view('view_guru_detail_evaluasi', $datasoalevaluasi);
	}

	public function getAll_hasil_evaluasi(){
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_eval_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords3();
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_evaluasi_siswa();
		$this->load->view('view_guru_getall_evaluasi', $dataevaluasi);
		
	}

	public function detail_getall_evaluasi($id_evaluasi){
		$dataevaluasi['dataEvaluasi']=$this->Model_Guru->getRecords3ByIdEvaluasi($id_evaluasi);
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_evaluasi_siswa_byId($id_evaluasi);
		$this->load->view('view_guru_detail_getall_evaluasi', $dataevaluasi);
	}

	public function detail_recall($id_recall)
	{
		$datasoalevaluasi['datamateri']=$this->Model_Guru->tampilrecall_by_id($id_recall);
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalrecall_by_id($id_recall);
		$datasoalevaluasi['dataidrecall']=$id_recall;
		$this->load->view('view_guru_detail_recall', $datasoalevaluasi);
	}

	public function getAll_hasil_recall(){
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_recall_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords5();
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_recall_siswa();
		$this->load->view('view_guru_getall_recall', $dataevaluasi);
	}

	public function detail_getall_recall($id_recall){
		$dataevaluasi['dataRecall']=$this->Model_Guru->getRecords5ByIdRecall($id_recall);
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_recall_siswa_byId($id_recall);
		$this->load->view('view_guru_detail_getall_recall', $dataevaluasi);
	}

	public function detail_formatif($id_formatif)
	{
		$datasoalevaluasi['datamateri']=$this->Model_Guru->tampilformatif_by_id($id_formatif);
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalformatif_by_id($id_formatif);
		$datasoalevaluasi['dataidformatif']=$id_formatif;
		$this->load->view('view_guru_detail_formatif', $datasoalevaluasi);
	}

	public function detail_getall_formatif($id_formatif){
		$dataevaluasi['dataFormatif']=$this->Model_Guru->getRecords7ByIdFormatif($id_formatif);
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_formatif_siswa_byId($id_formatif);
		$this->load->view('view_guru_detail_getall_formatif', $dataevaluasi);
	}

	public function getAll_hasil_formatif(){
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_formatif_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords7();
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_formatif_siswa();
		$this->load->view('view_guru_getall_formatif', $dataevaluasi);
	}

	public function detail_lkpd($id_lkpd)
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_lkpd_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords9();
		$this->load->view('view_guru_detail_lkpd', $dataevaluasi);
	}

	public function getAll_hasil_lkpd(){
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_lkpd_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords9();
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_lkpd_siswa();
		$this->load->view('view_guru_getall_lkpd', $dataevaluasi);
	}

	public function getAll_hasil_problem(){
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_problem_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords11();
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_problem_siswa();
		$this->load->view('view_guru_getall_problem', $dataevaluasi);
	}

	public function detail_getall_problem($id_problem){
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords11ByIdProblem($id_problem);
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_problem_siswa_byIdDistinc($id_problem);
		$this->load->view('view_guru_detail_getall_problem', $dataevaluasi);
	}

	public function detail_getall_lkpd($id_lkpd){
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords9ByIdLkpd($id_lkpd);
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_lkpd_siswa_byIdDistinc($id_lkpd);
		$this->load->view('view_guru_detail_getall_lkpd', $dataevaluasi);
	}

	public function data_siswa_lkpd($id_lkpd, $nis_nip){
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords9ByIdLkpd($id_lkpd);
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_lkpd_soal_siswa_byId($nis_nip, $id_lkpd);
		$this->load->view('view_guru_data_siswa_lkpd', $dataevaluasi);
	}

	public function tambah_mapel()
	{
		$this->form_validation->set_rules('kode_mapel', 'kode_mapel','trim|required|min_length[1]|max_length[10]|is_unique[tb_mapel.kode_mapel]');
		//$this->form_validation->set_rules('nis_nip', 'nis_nip', 'required|trim' );
		$this->form_validation->set_rules('nama_mapel', 'nama_mapel', 'required|trim');
		$this->form_validation->set_rules('kelas', 'kelas','required|trim');

		if ($this->form_validation->run()==true)
	   	{	

			$kode_mapel	= $this->input->post('kode_mapel');
			$nis_nip	= $this->session->userdata('nis_nip');
			$nama_mapel	= $this->input->post('nama_mapel');
			$kelas		= $this->input->post('kelas');
			$created_at = date('Y-m-d H:i:s');

			$data = array(
                'kode_mapel' => $kode_mapel,
				'nis_nip' => $nis_nip,
                'nama_mapel' => $nama_mapel,
                'kelas' => $kelas,
                'created_at' => $created_at
            );

			$this->Model_Guru->tambahdata_mapel($data);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('guru/mata_pelajaran');

		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal ditambahkan!');
			redirect('guru/mata_pelajaran', $data);
		}

	}

	public function validate(){
		$this->form_validation->set_rules('nis_nip','Role User','required');
		if($this->form_validation->run()){
			return true;
		}else{
			return false;
		}
	}
	
	public function form_edit_mapel($nis_nip)
	{
		$data['dataById']=$this->Model_Guru->tampilmapel_by_id($nis_nip);
		$this->load->view('guru/edit_mapel',$data);
	}

	function do_edit_mapel()
	{
		$this->form_validation->set_rules('kode_mapel','Kode Mapel','required');
		$kode_mapel = $this->input->post('kode_mapel');
		//var_dump($this->validate());die;
		
		if($this->form_validation->run()){
			//die;
			$this->form_validation->set_error_delimiters();
			$data = array(
				'nama_mapel'	=> $this->input->post('nama_mapel'),
				'kelas'			=> $this->input->post('kelas')
			);

			$this->Model_Guru->edit_mapel($kode_mapel, $data);
			$this->session->set_flashdata('ver', 'FALSE');
            $this->session->set_flashdata('alert', 'Data Berhasil di ubah!');
			redirect("guru/mata_pelajaran");
		}
		else {
			$data['dataById']=$this->Model_Guru->tampilmapel_by_id($nis_nip);
			//$dataById->kode_mapel;
			$this->load->view('guru/mata_pelajaran',$data);
			$this->form_validation->set_message('insert');
		}
	}

	public function delete_mapel($kode_mapel)
	{	
		$where = array('kode_mapel' => $kode_mapel);
		$hapus = $this->Model_Guru->hapusdata($where, 'tb_mapel');
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('class_alert', 'info');
		$this->session->set_flashdata('alert', 'Data Berhasil di hapus');
		redirect('guru/mata_pelajaran');
	}


	public function tambah_materi()
	{
		$this->form_validation->set_rules('kode_materi', 'kode_materi','trim|required|min_length[1]|max_length[10]|is_unique[tb_materi.kode_materi]');
		$this->form_validation->set_rules('kode_mapel', 'kode_mapel', 'required|trim' );
		$this->form_validation->set_rules('judul', 'judul', 'required|trim');
		$this->form_validation->set_rules('sub_judul', 'sub_judul', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');
		$this->form_validation->set_rules('video_apersepsi', 'video_apersepsi', 'required|trim');
		$this->form_validation->set_rules('video_materi', 'video_materi','required|trim');
		$this->form_validation->set_rules('modul_materi', 'modul_materi','required|trim');

		if ($this->form_validation->run()==true)
	   	{	

			$kode_materi	= $this->input->post('kode_materi');
			$kode_mapel		= $this->input->post('kode_mapel');
			$judul			= $this->input->post('judul');
			$sub_judul		= $this->input->post('sub_judul');
			$deskripsi		= $this->input->post('deskripsi');
			$video_apersepsi= $this->input->post('video_apersepsi');
			$video_materi	= $this->input->post('video_materi');
			$modul_materi	= $this->input->post('modul_materi');

			$data = array(
				'kode_materi' => $kode_materi,
                'kode_mapel' => $kode_mapel,
				'judul' => $judul,
				'sub_judul' => $sub_judul,
				'deskripsi' => $deskripsi,
                'video_apersepsi' => $video_apersepsi,
				'video_materi' => $video_materi,
                'modul_materi' => $modul_materi
            );

			$this->Model_Guru->tambahdata_materi($data);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('guru/materi');

		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal ditambahkan!');
			redirect('guru/materi', $data);
		}

	}

	private function get_youtube_id($url) {
		$parsed_url = parse_url($url);
		if(isset($parsed_url['query'])) {
			parse_str($parsed_url['query'], $query_params);
			if(isset($query_params['v'])) {
				return $query_params['v'];
			}
		} else if(isset($parsed_url['path'])) {
			$path_components = explode('/', trim($parsed_url['path'], '/'));
			if(in_array('watch', $path_components) && isset($path_components[1])) {
				return $path_components[1];
			}
		}
		return null;
	}

	function do_edit_materi()
	{
		$this->form_validation->set_rules('kode_materi','Kode Materi','required');
		$kode_materi = $this->input->post('kode_materi');
		//var_dump($this->validate());die;
		// parse_str(parse_url($url, PHP_URL_QUERY), $query_params);
      	// $video_id = $query_params['v'];
		if($this->form_validation->run()){
			//die;
			$this->form_validation->set_error_delimiters();
			$data = array(
				'kode_mapel'	 => $this->input->post('kode_mapel'),
				'judul'			 => $this->input->post('judul'),
				'sub_judul'		 => $this->input->post('sub_judul'),
				'deskripsi'		 => $this->input->post('deskripsi'),
				'video_apersepsi'=> $this->get_youtube_id($this->input->post('video_apersepsi')),
				'video_materi'	 => $this->get_youtube_id($this->input->post('video_materi')),
				'modul_materi'	 => $this->input->post('modul_materi')
			);

			$this->Model_Guru->edit_materi($kode_materi, $data);
			$this->session->set_flashdata('ver', 'FALSE');
            $this->session->set_flashdata('alert', 'Data Berhasil di ubah!');
			redirect("guru/materi");
		}
		else {
			$data['dataById']=$this->Model_Guru->tampilmateri_by_kode($kode_materi);
			//$dataById->kode_mapel;
			$this->load->view('guru/materi',$data);
			$this->form_validation->set_message('insert');
		}
	}

	public function delete_materi($kode_materi)
	{	

		$where = array('kode_materi' => $kode_materi);
		$hapus = $this->Model_Guru->hapusdata_materi($where, 'tb_materi');
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('class_alert', 'info');
		$this->session->set_flashdata('alert', 'Data Berhasil di hapus');
		redirect('guru/materi');
	}

	public function tambah_evaluasi()
	{
		$this->form_validation->set_rules('kode_materi', 'kode_materi', 'required|trim');
		$this->form_validation->set_rules('nama_evaluasi', 'nama_evaluasi','required|trim');

		if ($this->form_validation->run()==true)
	   	{	

			$kode_materi	= $this->input->post('kode_materi');
			$nama_evaluasi	= $this->input->post('nama_evaluasi');

			$data = array(
                'kode_materi' => $kode_materi,
				'nama_evaluasi' => $nama_evaluasi
            );

			$this->Model_Guru->tambahdata_evaluasi($data);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('guru/evaluasi');
		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal ditambahkan!');
			redirect('guru/evaluasi', $data);
		}

	}

	function do_edit_evaluasi()
	{
		$this->form_validation->set_rules('nama_evaluasi','Nama EVALUASI','required');
		$id_evaluasi = $this->input->post('id_evaluasi');
		if($this->form_validation->run()){
			//die;
			$this->form_validation->set_error_delimiters();
			$data = array(
				'nama_evaluasi'	 => $this->input->post('nama_evaluasi')
			);

			$this->Model_Guru->edit_evaluasi($id_evaluasi, $data);
			$this->session->set_flashdata('ver', 'FALSE');
            $this->session->set_flashdata('alert', 'Data Berhasil di ubah!');
			$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_eval_materi();
			$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
			$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords3();
			$this->load->view('view_guru_evaluasi', $dataevaluasi);
		}
		else {
			$dataevaluasi['dataById']=$this->Model_Guru->tampilevaluasi_by_id($id_evaluasi);
			$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_eval_materi();
			$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
			$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords3();
			$this->load->view('view_guru_evaluasi',$dataevaluasi);
			$this->form_validation->set_message('insert');
		}
	}

	public function delete_evaluasi($id_evaluasi)
	{

		$where = array('id_evaluasi' => $id_evaluasi);
		$hapus = $this->Model_Guru->hapusdata_evaluasi($where, 'tb_evaluasi_materi');
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('class_alert', 'info');
		$this->session->set_flashdata('alert', 'Data Berhasil di hapus');
		redirect('guru/evaluasi');
	}

	public function tambah_soal_evaluasi()
	{
		$this->form_validation->set_rules('no_soal', 'no_soal', 'required|trim');
		$this->form_validation->set_rules('soal', 'soal', 'required|trim');
		$this->form_validation->set_rules('jawaban_a', 'jawaban_a', 'required|trim');
		$this->form_validation->set_rules('jawaban_b', 'jawaban_b', 'required|trim');
		$this->form_validation->set_rules('jawaban_c', 'jawaban_c', 'required|trim');
		$this->form_validation->set_rules('jawaban_d', 'jawaban_d','required|trim');
		$this->form_validation->set_rules('jawaban_e', 'jawaban_e','required|trim');
		$this->form_validation->set_rules('jawaban_benar', 'jawaban_benar','required|trim');
		$this->form_validation->set_rules('skor', 'skor','required|trim');

		if ($this->form_validation->run()==true)
	   	{	
			//$id_evaluasi	= $this->uri->segment(3);
			$id_evaluasi	= $this->input->post('id_evaluasi');
			$no_soal		= $this->input->post('no_soal');
			$soal			= $this->input->post('soal');
			$jawaban_a		= $this->input->post('jawaban_a');
			$jawaban_b		= $this->input->post('jawaban_b');
			$jawaban_c		= $this->input->post('jawaban_c');
			$jawaban_d		= $this->input->post('jawaban_d');
			$jawaban_e		= $this->input->post('jawaban_e');
			$jawaban_benar	= $this->input->post('jawaban_benar');
			$skor			= $this->input->post('skor');

			$data = array(
				'id_evaluasi' 	=> $id_evaluasi,
				'no_soal' 		=> $no_soal,
				'soal' 			=> $soal,
                'jawaban_a' 	=> $jawaban_a,
				'jawaban_b' 	=> $jawaban_b,
				'jawaban_c' 	=> $jawaban_c,
				'jawaban_d' 	=> $jawaban_d,
                'jawaban_e' 	=> $jawaban_e,
				'jawaban_benar' => $jawaban_benar,
                'skor' 			=> $skor
            );

			$this->Model_Guru->tambahdata_soalevaluasi($data);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('guru/detail_evaluasi/'. $id_evaluasi);

		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal ditambahkan!');
			redirect('guru/detail_evaluasi/'. $id_evaluasi, $data);
		}

	}

	public function do_edit_soalevaluasi($id_soal){
		
		$no_soal		= $this->input->post('no_soal');
		$soal			= $this->input->post('soal');
		$jawaban_a		= $this->input->post('jawaban_a');
		$jawaban_b		= $this->input->post('jawaban_b');
		$jawaban_c		= $this->input->post('jawaban_c');
		$jawaban_d		= $this->input->post('jawaban_d');
		$jawaban_e		= $this->input->post('jawaban_e');
		$jawaban_benar	= $this->input->post('jawaban_benar');
		$skor			= $this->input->post('skor');
		$id_evaluasi	= $this->input->post('id_evaluasi');

		$data = array(
			'no_soal' 		=> $no_soal,
			'soal' 			=> $soal,
			'jawaban_a' 	=> $jawaban_a,
			'jawaban_b' 	=> $jawaban_b,
			'jawaban_c' 	=> $jawaban_c,
			'jawaban_d' 	=> $jawaban_d,
			'jawaban_e' 	=> $jawaban_e,
			'jawaban_benar' => $jawaban_benar,
			'skor' 			=> $skor
		);

		$this->Model_Guru->edit_soalevaluasi($id_soal, $data);
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('alert', 'Data Berhasil di ubah!');
		$datasoalevaluasi['datamateri']=$this->Model_Guru->tampilevaluasi_by_id($id_evaluasi);
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalevaluasi_by_id($id_evaluasi);
		$datasoalevaluasi['dataidevaluasi']=$id_evaluasi;
		$this->load->view('view_guru_detail_evaluasi', $datasoalevaluasi);

	}

	public function delete_soal_evaluasi($id_soal, $id_evaluasi)
	{

		$where = array('id_soal' => $id_soal);
		$hapus = $this->Model_Guru->hapusdata_soalevaluasi($where, 'tb_soal_evaluasi');
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('class_alert', 'info');
		$this->session->set_flashdata('alert', 'Data Berhasil di hapus');
		redirect('guru/detail_evaluasi/'. $id_evaluasi);
		// redirect($_SERVER['HTTP_REFERER']);
	}

	// INIIIIIIIIIIIIIIII YAAAAAAAAA BARU!!!!!!!!

	public function tambah_formatif()
	{
		$this->form_validation->set_rules('kode_materi', 'kode_materi', 'required|trim');
		$this->form_validation->set_rules('nama_formatif', 'nama_formatif','required|trim');

		if ($this->form_validation->run()==true)
	   	{	

			$kode_materi	= $this->input->post('kode_materi');
			$nama_formatif	= $this->input->post('nama_formatif');

			$data = array(
                'kode_materi' => $kode_materi,
				'nama_formatif' => $nama_formatif
            );

			$this->Model_Guru->tambahdata_formatif($data);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('guru/formatif');

		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal ditambahkan!');
			redirect('guru/formatif', $data);
		}
	}

	function do_edit_formatif()
	{
		$this->form_validation->set_rules('nama_formatif','Nama FORMATIF','required');
		$id_formatif = $this->input->post('id_formatif');
		if($this->form_validation->run()){
			$this->form_validation->set_error_delimiters();
			$data = array(
				'nama_formatif'	 => $this->input->post('nama_formatif')
			);

			$this->Model_Guru->edit_formatif($id_formatif, $data);
			$this->session->set_flashdata('ver', 'FALSE');
            $this->session->set_flashdata('alert', 'Data Berhasil di ubah!');
			$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_formatif_materi();
			$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
			$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords7();
			$this->load->view('view_guru_formatif', $dataevaluasi);
		}
		else {
			$dataevaluasi['dataById']=$this->Model_Guru->tampilformatif_by_id($id_formatif);
			$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_formatif_materi();
			$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
			$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords7();
			//$dataById->kode_mapel;
			$this->load->view('view_guru_formatif',$dataevaluasi);
			$this->form_validation->set_message('insert');
		}
	}

	public function delete_formatif($id_evaluasi)
	{
		$where = array('id_formatif' => $id_evaluasi);
		$hapus = $this->Model_Guru->hapusdata_evaluasi($where, 'tb_formatif');
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('class_alert', 'info');
		$this->session->set_flashdata('alert', 'Data Berhasil di hapus');
		redirect('guru/formatif');
	}

	public function tambah_recall()
	{
		$this->form_validation->set_rules('kode_materi', 'kode_materi', 'required|trim');
		$this->form_validation->set_rules('nama_recall', 'nama_recall','required|trim');

		if ($this->form_validation->run()==true)
	   	{	

			$kode_materi	= $this->input->post('kode_materi');
			$nama_recall	= $this->input->post('nama_recall');

			$data = array(
                'kode_materi' => $kode_materi,
				'nama_recall' => $nama_recall
            );

			$this->Model_Guru->tambahdata_recall($data);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('guru/recall');

		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal ditambahkan!');
			redirect('guru/recall', $data);
		}
	}

	function do_edit_recall()
	{
		$this->form_validation->set_rules('nama_recall','Nama RECALL','required');
		$id_recall = $this->input->post('id_recall');
		if($this->form_validation->run()){
			$this->form_validation->set_error_delimiters();
			$data = array(
				'nama_recall'	 => $this->input->post('nama_recall')
			);

			$this->Model_Guru->edit_recall($id_recall, $data);
			$this->session->set_flashdata('ver', 'FALSE');
            $this->session->set_flashdata('alert', 'Data Berhasil di ubah!');
			$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_recall_materi();
			$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
			$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords5();
			$this->load->view('view_guru_recall', $dataevaluasi);
		}
		else {
			$dataevaluasi['dataById']=$this->Model_Guru->tampilrecall_by_id($id_recall);
			$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_recall_materi();
			$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
			$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords5();
			//$dataById->kode_mapel;
			$this->load->view('view_guru_recall',$dataevaluasi);
			$this->form_validation->set_message('insert');
		}
	}

	public function delete_recall($id_evaluasi)
	{
		$where = array('id_recall' => $id_evaluasi);
		$hapus = $this->Model_Guru->hapusdata_evaluasi($where, 'tb_recall');
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('class_alert', 'info');
		$this->session->set_flashdata('alert', 'Data Berhasil di hapus');
		redirect('guru/recall');
	}

	public function tambah_lkpd()
	{
		$this->form_validation->set_rules('kode_materi', 'kode_materi', 'required|trim');
		$this->form_validation->set_rules('nama_lkpd', 'nama_lkpd','required|trim');
		$this->form_validation->set_rules('file_lkpd', 'file_lkpd','required|trim');

		if ($this->form_validation->run()==true)
	   	{	

			$kode_materi= $this->input->post('kode_materi');
			$nama_lkpd	= $this->input->post('nama_lkpd');
			$file_lkpd	= $this->input->post('file_lkpd');

			$data = array(
                'kode_materi'	=> $kode_materi,
				'nama_lkpd' 	=> $nama_lkpd,
				'file_lkpd'		=> $file_lkpd
            );

			$this->Model_Guru->tambahdata_lkpd($data);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('guru/lkpd');

		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal ditambahkan!');
			redirect('guru/lkpd', $data);
		}
	}

	function do_edit_lkpd()
	{
		$this->form_validation->set_rules('nama_lkpd','Nama LKPD','required');
		$id_lkpd = $this->input->post('id_lkpd');
		if($this->form_validation->run()){
			$this->form_validation->set_error_delimiters();
			$data = array(
				'nama_lkpd'	 => $this->input->post('nama_lkpd')
			);

			$this->Model_Guru->edit_lkpd($id_lkpd, $data);
			$this->session->set_flashdata('ver', 'FALSE');
            $this->session->set_flashdata('alert', 'Data Berhasil di ubah!');
			$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_lkpd_materi();
			$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
			$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords9();
			$this->load->view('view_guru_lkpd', $dataevaluasi);
		}
		else {
			$dataevaluasi['dataById']=$this->Model_Guru->tampillkpd_by_id($id_lkpd);
			$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_lkpd_materi();
			$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
			$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords9();
			//$dataById->kode_mapel;
			$this->load->view('view_guru_lkpd',$dataevaluasi);
			$this->form_validation->set_message('insert');
		}
	}

	public function delete_lkpd($id_lkpd)
	{
		$where = array('id_lkpd' => $id_lkpd);
		$hapus = $this->Model_Guru->hapusdata_evaluasi($where, 'tb_lkpd');
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('class_alert', 'info');
		$this->session->set_flashdata('alert', 'Data Berhasil di hapus');
		redirect('guru/lkpd');
	}

	// INI DETAIL RECALL DAN FORMATIF //

	public function tambah_soal_recall()
	{
		$this->form_validation->set_rules('no_soal', 'no_soal', 'required|trim');
		$this->form_validation->set_rules('soal', 'soal', 'required|trim');
		$this->form_validation->set_rules('jawaban_a', 'jawaban_a', 'required|trim');
		$this->form_validation->set_rules('jawaban_b', 'jawaban_b', 'required|trim');
		$this->form_validation->set_rules('jawaban_c', 'jawaban_c', 'required|trim');
		$this->form_validation->set_rules('jawaban_d', 'jawaban_d','required|trim');
		$this->form_validation->set_rules('jawaban_e', 'jawaban_e','required|trim');
		$this->form_validation->set_rules('jawaban_benar', 'jawaban_benar','required|trim');
		$this->form_validation->set_rules('skor', 'skor','required|trim');

		if ($this->form_validation->run()==true)
	   	{	
			//$id_evaluasi	= $this->uri->segment(3);
			$id_recall		= $this->input->post('id_recall');
			$no_soal		= $this->input->post('no_soal');
			$soal			= $this->input->post('soal');
			$jawaban_a		= $this->input->post('jawaban_a');
			$jawaban_b		= $this->input->post('jawaban_b');
			$jawaban_c		= $this->input->post('jawaban_c');
			$jawaban_d		= $this->input->post('jawaban_d');
			$jawaban_e		= $this->input->post('jawaban_e');
			$jawaban_benar	= $this->input->post('jawaban_benar');
			$skor			= $this->input->post('skor');

			$data = array(
				'id_recall' 	=> $id_recall,
				'no_soal' 		=> $no_soal,
				'soal' 			=> $soal,
                'jawaban_a' 	=> $jawaban_a,
				'jawaban_b' 	=> $jawaban_b,
				'jawaban_c' 	=> $jawaban_c,
				'jawaban_d' 	=> $jawaban_d,
                'jawaban_e' 	=> $jawaban_e,
				'jawaban_benar' => $jawaban_benar,
                'skor' 			=> $skor
            );

			$this->Model_Guru->tambahdata_soalrecall($data);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('guru/detail_recall/'. $id_recall);

		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal ditambahkan!');
			redirect('guru/detail_recall/' . $id_recall, $data);
		}
	}

	public function do_edit_soalrecall($id_soal){
		
		$no_soal		= $this->input->post('no_soal');
		$soal			= $this->input->post('soal');
		$jawaban_a		= $this->input->post('jawaban_a');
		$jawaban_b		= $this->input->post('jawaban_b');
		$jawaban_c		= $this->input->post('jawaban_c');
		$jawaban_d		= $this->input->post('jawaban_d');
		$jawaban_e		= $this->input->post('jawaban_e');
		$jawaban_benar	= $this->input->post('jawaban_benar');
		$skor			= $this->input->post('skor');
		$id_recall		= $this->input->post('id_recall');

		$data = array(
			'no_soal' 		=> $no_soal,
			'soal' 			=> $soal,
			'jawaban_a' 	=> $jawaban_a,
			'jawaban_b' 	=> $jawaban_b,
			'jawaban_c' 	=> $jawaban_c,
			'jawaban_d' 	=> $jawaban_d,
			'jawaban_e' 	=> $jawaban_e,
			'jawaban_benar' => $jawaban_benar,
			'skor' 			=> $skor
		);

		$this->Model_Guru->edit_soalrecall($id_soal, $data);
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('alert', 'Data Berhasil di ubah!');
		$datasoalevaluasi['datamateri']=$this->Model_Guru->tampilrecall_by_id($id_recall);
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalrecall_by_id($id_recall);
		$datasoalevaluasi['dataidrecall']=$id_recall;
		$this->load->view('view_guru_detail_recall', $datasoalevaluasi);

	}

	public function delete_soal_recall($id_soal, $id_recall)
	{

		$where = array('id_soal' => $id_soal);
		$hapus = $this->Model_Guru->hapusdata_soalevaluasi($where, 'tb_recall_soal');
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('class_alert', 'info');
		$this->session->set_flashdata('alert', 'Data Berhasil di hapus');
		redirect('guru/detail_recall/'. $id_recall);
		//redirect($_SERVER['HTTP_REFERER']);
	}

	public function tambah_soal_formatif()
	{
		$this->form_validation->set_rules('no_soal', 'no_soal', 'required|trim');
		$this->form_validation->set_rules('soal', 'soal', 'required|trim');
		$this->form_validation->set_rules('jawaban_a', 'jawaban_a', 'required|trim');
		$this->form_validation->set_rules('jawaban_b', 'jawaban_b', 'required|trim');
		$this->form_validation->set_rules('jawaban_c', 'jawaban_c', 'required|trim');
		$this->form_validation->set_rules('jawaban_d', 'jawaban_d','required|trim');
		$this->form_validation->set_rules('jawaban_e', 'jawaban_e','required|trim');
		$this->form_validation->set_rules('jawaban_benar', 'jawaban_benar','required|trim');
		$this->form_validation->set_rules('skor', 'skor','required|trim');

		if ($this->form_validation->run()==true)
	   	{	
			//$id_evaluasi	= $this->uri->segment(3);
			$id_formatif	= $this->input->post('id_formatif');
			$no_soal		= $this->input->post('no_soal');
			$soal			= $this->input->post('soal');
			$jawaban_a		= $this->input->post('jawaban_a');
			$jawaban_b		= $this->input->post('jawaban_b');
			$jawaban_c		= $this->input->post('jawaban_c');
			$jawaban_d		= $this->input->post('jawaban_d');
			$jawaban_e		= $this->input->post('jawaban_e');
			$jawaban_benar	= $this->input->post('jawaban_benar');
			$skor			= $this->input->post('skor');

			$data = array(
				'id_formatif' 	=> $id_formatif,
				'no_soal' 		=> $no_soal,
				'soal' 			=> $soal,
                'jawaban_a' 	=> $jawaban_a,
				'jawaban_b' 	=> $jawaban_b,
				'jawaban_c' 	=> $jawaban_c,
				'jawaban_d' 	=> $jawaban_d,
                'jawaban_e' 	=> $jawaban_e,
				'jawaban_benar' => $jawaban_benar,
                'skor' 			=> $skor
            );

			$this->Model_Guru->tambahdata_soalformatif($data);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('guru/detail_formatif/'. $id_formatif);

		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal ditambahkan!');
			redirect('guru/detail_formatif/'. $id_formatif, $data);
		}
	}


	public function do_edit_soalformatif($id_soal){
		
		$no_soal		= $this->input->post('no_soal');
		$soal			= $this->input->post('soal');
		$jawaban_a		= $this->input->post('jawaban_a');
		$jawaban_b		= $this->input->post('jawaban_b');
		$jawaban_c		= $this->input->post('jawaban_c');
		$jawaban_d		= $this->input->post('jawaban_d');
		$jawaban_e		= $this->input->post('jawaban_e');
		$jawaban_benar	= $this->input->post('jawaban_benar');
		$skor			= $this->input->post('skor');
		$id_formatif	= $this->input->post('id_formatif');

		$data = array(
			'no_soal' 		=> $no_soal,
			'soal' 			=> $soal,
			'jawaban_a' 	=> $jawaban_a,
			'jawaban_b' 	=> $jawaban_b,
			'jawaban_c' 	=> $jawaban_c,
			'jawaban_d' 	=> $jawaban_d,
			'jawaban_e' 	=> $jawaban_e,
			'jawaban_benar' => $jawaban_benar,
			'skor' 			=> $skor
		);

		$this->Model_Guru->edit_soalformatif($id_soal, $data);
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('alert', 'Data Berhasil di ubah!');
		$datasoalevaluasi['datamateri']=$this->Model_Guru->tampilformatif_by_id($id_formatif);
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalformatif_by_id($id_formatif);
		$datasoalevaluasi['dataidformatif']=$id_formatif;
		$this->load->view('view_guru_detail_formatif', $datasoalevaluasi);
	}

	public function delete_soal_formatif($id_soal, $id_formatif)
	{
		$where = array('id_soal' => $id_soal);
		$hapus = $this->Model_Guru->hapusdata_soalevaluasi($where, 'tb_formatif_soal');
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('class_alert', 'info');
		$this->session->set_flashdata('alert', 'Data Berhasil di hapus');
		redirect('guru/detail_formatif/'. $id_formatif);
		// redirect($_SERVER['HTTP_REFERER']);
	}



	// INI BUAT LKPD SOAL URAIAN

	public function tambah_soal_lkpd()
	{
		$this->form_validation->set_rules('no_soal', 'no_soal', 'required|trim');
		$this->form_validation->set_rules('soal', 'soal', 'required|trim');

		if ($this->form_validation->run()==true)
	   	{	
			//$id_evaluasi	= $this->uri->segment(3);
			$id_lkpd	= $this->input->post('id_lkpd');
			$no_soal	= $this->input->post('no_soal');
			$soal		= $this->input->post('soal');

			$data = array(
				'id_lkpd' 	=> $id_lkpd,
				'no_soal' 	=> $no_soal,
				'soal' 		=> $soal
            );

			$this->Model_Guru->tambahdata_soallkpd($data);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('guru/detail_lkpd/'. $id_lkpd);

		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal ditambahkan!');
			redirect('guru/detail_lkpd/'. $id_lkpd, $data);
		}

	}

	public function do_edit_soallkpd($id_soal){
		
		$no_soal		= $this->input->post('no_soal');
		$soal			= $this->input->post('soal');
		$id_lkpd		= $this->input->post('id_lkpd');

		$data = array(
			'no_soal' 		=> $no_soal,
			'soal' 			=> $soal
		);

		$this->Model_Guru->edit_soallkpd($id_soal, $data);
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('alert', 'Data Berhasil di ubah!');
		$datasoalevaluasi['datamateri']=$this->Model_Guru->tampillkpd_by_id($id_lkpd);
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoallkpd_by_id($id_lkpd);
		$datasoalevaluasi['dataidlkpd']= $id_lkpd;
		$this->load->view('view_guru_detail_lkpd', $datasoalevaluasi);

	}

	public function delete_soal_lkpd($id_soal, $id_lkpd)
	{
		$where = array('id_soal' => $id_soal);
		$hapus = $this->Model_Guru->hapusdata_soalevaluasi($where, 'tb_soal_lkpd');
		$this->session->set_flashdata('ver', 'FALSE');
		$this->session->set_flashdata('class_alert', 'info');
		$this->session->set_flashdata('alert', 'Data Berhasil di hapus');
		redirect('guru/detail_lkpd/'. $id_lkpd);
		// redirect($_SERVER['HTTP_REFERER']);
	}

	public function edit_skor_lkpd($id_soal,$nis_nip){
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords10ByIdSoalNis($id_soal, $nis_nip);
		$dataevaluasi['datasiswa']=$this->Model_Guru->join_jawaban_siswa_byIdDistinc($id_soal);
		$this->load->view('view_guru_edit_skor_lkpd', $dataevaluasi);

	}

	public function do_edit_skor_lkpd($id_soal, $nis_nip){
		// $nis_nip = $this->session->userdata('nis_nip');
		$id_lkpd = $this->input->post('id_lkpd');
		$id_soal = $this->input->post('id_soal');
		$jawaban = $this->input->post('jawaban');

		$this->form_validation->set_rules('skor','SKOR LKPD','required');

		if($this->form_validation->run()){
			$this->form_validation->set_error_delimiters();
			$data = array(
				'skor'	 => $this->input->post('skor')
			);

			$this->Model_Guru->edit_skor_lkpd($id_soal, $nis_nip, $data);
			$this->session->set_flashdata('ver', 'FALSE');
            $this->session->set_flashdata('alert', 'Data Berhasil di ubah!');

			$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords9ByIdLkpd($id_soal);
			$dataevaluasi['datasiswa']=$this->Model_Guru->join_lkpd_soal_siswa_byId($id_soal, $nis_nip);

			// $this->load->view('view_guru_data_siswa_lkpd', $dataevaluasi);
			redirect('/guru/data_siswa_lkpd/'.$id_lkpd.'/'.$nis_nip.'');

			
		}
		else {

			$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords9ByIdLkpd($id_lkpd);
			$dataevaluasi['datasiswa']=$this->Model_Guru->join_lkpd_soal_siswa_byId($nis_nip, $id_lkpd);
			$this->load->view('view_guru_data_siswa_lkpd', $dataevaluasi);
			$this->form_validation->set_message('insert');
		}
	}
}
