<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_role') != '2') {
			redirect('./Login');
		}
	 	$this->load->model('Model_Siswa');
		$this->load->model('Model_Guru');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('view_siswa_home');
	}

	public function profil_dev(){
		$this->load->view('a_view_profile');
	}

	public function mata_pelajaran()
	{
		$data['data']=$this->Model_Siswa->getMapel();
		$this->load->view('view_siswa_matapelajaran', $data);
	}

	public function enrollMapel()
	{
		$nis_nip	= $this->session->userdata('nis_nip');
		$kode_mapel	= $this->input->post('kode_mapel');

		$valid_user = $this->db->get_where('tb_mapel', array(//making selection
			'kode_mapel' => $kode_mapel //yang diparatemer
		));

		if ($valid_user->num_rows() > 0) {
			$data2 = array(
				'nis_nip' => $nis_nip,
				'kode_mapel' => $kode_mapel
            );

			$this->Model_Siswa->tambahdata_mapel($data2);
			$this->session->set_flashdata('success_register','Data Berhasil ditambahkan!');
			redirect('siswa/mata_pelajaran');
		} else {
			
			redirect('siswa');
		}
	}

	public function materi()
	{
		$datamateri['datamapel']=$this->Model_Guru->getRecords();
		$datamateri['datamateri']=$this->Model_Guru->getRecords2();
		$this->load->view('view_siswa_materi', $datamateri);
	}

	public function detail_materi($kode_materi)
	{
		$datamateri['datamapel']=$this->Model_Guru->getRecords();
		$datamateri['datamateri']=$this->Model_Guru->tampilmateri_by_kode($kode_materi);
		//var_dump($datamateri) ; die();
		$this->load->view('view_siswa_detail_materi', $datamateri);
	}

	public function recall()
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_recall_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords5();
		$this->load->view('view_siswa_recall', $dataevaluasi);
	}

	public function detail_recall($id_recall)
	{
		if($this->Model_Siswa->tampil_data_recall_by_id($id_recall) == NULL){
			$datasoalevaluasi['datamateri']=$this->Model_Guru->tampilrecall_by_id($id_recall);
			$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalrecall_by_id($id_recall);
			$datasoalevaluasi['idrecall'] = $id_recall;
			$this->load->view('view_siswa_detail_recall', $datasoalevaluasi);
		} else{
			redirect('siswa/recall');
		}
		
	}

	public function formatif()
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_formatif_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords7();
		//var_dump($dataevaluasi['dataevaluasi']);die;
		$this->load->view('view_siswa_formatif', $dataevaluasi);
	}

	public function detail_formatif($id_formatif)
	{
		if($this->Model_Siswa->tampil_data_formatif_by_id($id_formatif) == NULL){
			$datasoalevaluasi['datamateri']=$this->Model_Guru->tampilformatif_by_id($id_formatif);
			$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalformatif_by_id($id_formatif);
			$datasoalevaluasi['idformatif'] = $id_formatif;
			$this->load->view('view_siswa_detail_formatif', $datasoalevaluasi);
		} else{
			redirect('siswa/formatif');
		}
	}

	public function cek_formatif($id_formatif)
	{
		$nis_nip = $this->session->userdata('nis_nip');
		$datasoalevaluasi = $this->Model_Guru->tampilsoalformatif_by_id($id_formatif);
		$score = 0;

		for ($i = 1; $i <= count($datasoalevaluasi); $i++) {
			$option = $this->input->post('option_'.$i);
			if ($option == $datasoalevaluasi[$i-1]->jawaban_benar) {
				$score+=20;
			}
		}

		$data = array(
			'nis_nip' => $nis_nip,
			'id_formatif' => $id_formatif,
			'skor_total' => $score
		);

		$this->Model_Siswa->tambahdata_nilai_formatif($data);		
		redirect('siswa/formatif');

	}

	public function evaluasi()
	{
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_eval_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords3();
		$this->load->view('view_siswa_evaluasi', $dataevaluasi);
	}

	public function detail_evaluasi($id_evaluasi)
	{
		if($this->Model_Siswa->tampil_data_evaluasi_by_id($id_evaluasi) == NULL){
			$datasoalevaluasi['datamateri']=$this->Model_Guru->tampilevaluasi_by_id($id_evaluasi);
			$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalevaluasi_by_id($id_evaluasi);
			$datasoalevaluasi['idevaluasi'] = $id_evaluasi;
			$this->load->view('view_siswa_detail_evaluasi', $datasoalevaluasi);
		} else{
			redirect('siswa/evaluasi');
		}
	}

	public function cek_evaluasi($id_evaluasi)
	{
		$nis_nip = $this->session->userdata('nis_nip');
		$datasoalevaluasi = $this->Model_Guru->tampilsoalevaluasi_by_id($id_evaluasi);
		$score = 0;

		for ($i = 1; $i <= count($datasoalevaluasi); $i++) {
			$option = $this->input->post('option_'.$i);
			if ($option == $datasoalevaluasi[$i-1]->jawaban_benar) {
				$score+=20;
			}
		}

		$data = array(
			'nis_nip' => $nis_nip,
			'id_evaluasi' => $id_evaluasi,
			'skor_total' => $score
		);

		$this->Model_Siswa->tambahdata_nilai_evaluasi($data);	
		redirect('siswa/evaluasi');

	}

	public function cek_recall($id_recall)
	{
		$nis_nip = $this->session->userdata('nis_nip');
		$datasoalevaluasi = $this->Model_Guru->tampilsoalrecall_by_id($id_recall);
		$score = 0;

		for ($i = 1; $i <= count($datasoalevaluasi); $i++) {
			$option = $this->input->post('option_'.$i);
			if ($option == $datasoalevaluasi[$i-1]->jawaban_benar) {
				$score+=20;
			}
		}

		$data = array(
			'nis_nip' => $nis_nip,
			'id_recall' => $id_recall,
			'skor_total' => $score
		);

		$this->Model_Siswa->tambahdata_nilai_recall($data);
		$recall = $this->Model_Siswa->ambil_skor_recall($id_recall,$this->session->userdata('nis_nip') );
		$this->session->set_flashdata('message_success', 'Anda Berhasil Mengerjakan Test Recall Dengan Skor ' . $recall->skor_total. '!');	
		redirect('/siswa/recall');
	}

	public function cek_pretest_basdat()
	{
		$nis_nip = $this->session->userdata('nis_nip');
		$datasoalevaluasi = $this->Model_Guru->tampilsoalpretest();
		$score = 0;

		for ($i = 1; $i <= count($datasoalevaluasi); $i++) {
			$option = $this->input->post('option_'.$i);
			if ($option == $datasoalevaluasi[$i-1]->jawaban_benar) {
				$score+=1;
			}
		}

		$data = array(
			'nis_nip' => $nis_nip,
			'id' => 1,
			'skor_total' => $score
		);

		$this->Model_Siswa->tambahdata_nilai_pretest($data);
		redirect('siswa');

	}

	public function cek_posttest_basdat()
	{
		$nis_nip = $this->session->userdata('nis_nip');
		$datasoalevaluasi = $this->Model_Guru->tampilsoalposttest();
		$score = 0;

		for ($i = 1; $i <= count($datasoalevaluasi); $i++) {
			$option = $this->input->post('option_'.$i);
			if ($option == $datasoalevaluasi[$i-1]->jawaban_benar) {
				$score+=1;
			}
		}

		$data = array(
			'nis_nip' => $nis_nip,
			'id' => 1,
			'skor_total' => $score
		);

		$this->Model_Siswa->tambahdata_nilai_posttest($data);
		redirect('siswa');

	}

	public function lkpd(){
		$dataevaluasi['datamaterijoin']=$this->Model_Siswa->join_lkpd_materi($this->session->userdata('nis_nip'));
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords9();
		$this->load->view('view_siswa_lkpd', $dataevaluasi);
	}

	public function detail_lkpd($id_lkpd){
		$datasoalevaluasi['datamateri']=$this->Model_Guru->tampillkpd_by_id($id_lkpd);
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoallkpd_by_id($id_lkpd);
		$datasoalevaluasi['dataidlkpd']= $id_lkpd;
		$this->load->view('view_siswa_detail_lkpd', $datasoalevaluasi);
	}

	public function tambah_jawaban_lkpd($id_lkpd)
	{
		$nis_nip = $this->session->userdata('nis_nip');
		$id_soal = $this->input->post('id_soal');
		$id_lkpd = $this->input->post('id_lkpd');

		$jmldatasoalevaluasi = $this->Model_Guru->jmltampilsoallkpd_by_id($id_lkpd);

		
		$this->form_validation->set_rules('jawaban', 'jawaban', 'required|trim');

		for ($i = 1; $i <= $jmldatasoalevaluasi->num_rows(); $i++) {
			$jawaban = $this->input->post('option_'.$i);
			$data = array(
				'nis_nip' => $nis_nip,
				'id_lkpd' => $id_lkpd,
				'id_soal' => $id_soal[$i-1],
				'jawaban' => $jawaban
			);
	
			$this->Model_Siswa->tambahdata_jawaban_lkpd($data);		
		}

		$lkpd = $this->Model_Guru->ambil_lkpd($id_lkpd);

		$this->session->set_flashdata('message_success', 'Anda Berhasil Mengerjakan ' . $lkpd->nama_lkpd . ' ini');
		redirect('/siswa/lkpd');	
	}

	public function grafik(){
		$this->load->view('view_siswa_grafik');
	}

	public function rekap(){
		$data['dataku']=$this->Model_Siswa->tampil_nilai_recall_byId();
		//$data['dataku2']=$this->Model_Siswa->tampil_nilai_problem_byId();
		$data['dataku3']=$this->Model_Siswa->tampil_nilai_formatif_byId();
		$data['dataku4']=$this->Model_Siswa->tampil_nilai_evaluasi_byId();
		$this->load->view('view_siswa_rekap_pertemuan', $data);
	}

	public function problem(){
		$dataevaluasi['datamaterijoin']=$this->Model_Guru->join_problem_materi();
		$dataevaluasi['datamateri']=$this->Model_Guru->getRecords2();
		$dataevaluasi['dataevaluasi']=$this->Model_Guru->getRecords11();
		$this->load->view('view_siswa_problem',  $dataevaluasi);
	}
	
	public function pretest_basdat(){
		
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalpretest();
		//$datasoalevaluasi['idpretest'] = $id;
		$this->load->view('view_siswa_pretest_basdat', $datasoalevaluasi );

	}

	public function posttest_basdat(){
		$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalposttest();
		//$datasoalevaluasi['idpretest'] = $id;
		$this->load->view('view_siswa_posttest_basdat', $datasoalevaluasi);
	}


	public function detail_problem($id_problem, $kode_materi){
		$nis_nip = $this->session->userdata('nis_nip');
		$cek = $this->Model_Guru->getSoalByIdProblem($id_problem);

		$hasSession = $this->Model_Guru->hasSession($kode_materi, $nis_nip);

		if (!$hasSession) {
			$this->Model_Guru->createSession([
				'kode_materi' => $kode_materi,
				'nis_nip' => $nis_nip,
				'start' => date('Y-m-d H:i:s')
			]);
		}

		$datasoalevaluasi['cek'] = $this->Model_Guru->getJawabanSiswaByNisdanIdSoal($cek->id_soal, $nis_nip);
		$datasoalevaluasi['datasoal']=$this->Model_Guru->tampilproblem_by_id($id_problem);
		//$datasoalevaluasi['datamateri']=$this->Model_Guru->join_problem_materi();
		//$datasoalevaluasi['datasoalevaluasi']=$this->Model_Guru->tampilsoalrecall_by_id($id_recall);
		$this->load->view('view_siswa_detail_problem',  $datasoalevaluasi);
		
		
	}

	public function check_jawaban_problem($id_soal) {

		$nis_nip = $this->session->userdata('nis_nip');
		$id_problem = $this->input->post('id_problem');
		$jawabanSiswa1 = strtolower($this->input->post('jawaban1'));
		$jawabanSiswa2 = strtolower($this->input->post('jawaban2'));
		$jawabanSiswa3 = strtolower($this->input->post('jawaban3'));

		$jawabanGuru = $this->Model_Guru->tampilJawabanGuruByIdSoal($id_soal);
		$jawabanSoal1 = strtolower($jawabanGuru[0]->jawaban);
		$jawabanSoal2 = strtolower($jawabanGuru[1]->jawaban);
		$jawabanSoal3 = strtolower($jawabanGuru[2]->jawaban);
		// ambil jawaban siswa
		// ambil soal jawaban dari database
		// compare jawaban siswa dan jawaban dari database
		// jika jawabannya benar pergi ke halaman selanjutnya
		if ($jawabanSiswa1 === $jawabanSoal1 && $jawabanSiswa2 === $jawabanSoal2 && $jawabanSiswa3 === $jawabanSoal3) {
			
			$cekjawaban = $this->Model_Guru->cekJawabanSiswa($jawabanGuru[0]->id_jawaban_guru, $id_soal, $nis_nip);

			if ($cekjawaban == 0){
				$data = array(
					'id_jawaban_guru' => $jawabanGuru[0]->id_jawaban_guru,
					'id_soal' => $id_soal,
					'nis_nip' => $nis_nip,
					'jawaban' => " ",
					'score'	  => 100,
					'retry'	  => 0
				);		
				$this->Model_Guru->create_jawaban_siswa($data);
			} else {
				$cekGetRetry = $this->Model_Guru->getJawabanById($jawabanGuru[0]->id_jawaban_guru, $id_soal, $nis_nip);
				$score = 100;
				$score = $score - $cekGetRetry->retry*10;
				$data = array(
					'id_jawaban_guru' => $jawabanGuru[0]->id_jawaban_guru,
					'id_soal' => $id_soal,
					'nis_nip' => $nis_nip,
					'jawaban' => " ",
					'score'	  => $score < 70 ? 70 : $score,
					'retry'	  => $cekGetRetry->retry
				);
				$this->Model_Guru->update_jawaban_siswa($cekGetRetry->id_jawaban_siswa, $data);
			}
			$soalProblem = $this->Model_Guru->tampilSoalProblemByIdSoal($id_soal);
			if ($soalProblem->posisi == 'soal_terakhir') {

				$materi = $this->Model_Guru->getProblemByIdProblem($id_problem);
				$kode_materi = $materi->kode_materi;

				// $getStartEnd = $this->Model_Guru->getDurasi($kode_materi);
				// $waktuStart = $getStartEnd->start;
				// $waktuEnd = $getStartEnd->end;
				// $realtime = $waktuEnd-$waktuStart;

				$this->Model_Guru->updateSession($kode_materi, $nis_nip, [
					'end' => date('Y-m-d H:i:s')
				]);
				redirect('/siswa/problem');
			} else {
				$posisi = $soalProblem->id_soal;
				$nextPosisi = (int)$posisi + 1;
				$problem = $this->Model_Guru->getPosisiJawaban($nextPosisi);
				$id_problem = $problem->id_problem;
				$materi = $this->Model_Guru->getProblemByIdProblem($id_problem);
				redirect('/siswa/detail_problem/' . $id_problem . '/' . $materi->kode_materi);
			}
		} else {
			$cekjawaban = $this->Model_Guru->cekJawabanSiswa($jawabanGuru[0]->id_jawaban_guru, $id_soal, $nis_nip);
			$soalProblem = $this->Model_Guru->tampilSoalProblemByIdSoal($id_soal);
			if ($cekjawaban == 0){
				$data = array(
					'id_jawaban_guru' => $jawabanGuru[0]->id_jawaban_guru,
					'id_soal' => $id_soal,
					'nis_nip' => $nis_nip,
					'jawaban' => " ",
					'score'	  => 0,
					'retry'	  => 1
				);
				$this->Model_Guru->create_jawaban_siswa($data);
				$materi = $this->Model_Guru->getProblemByIdProblem($id_problem);
				redirect('/siswa/detail_problem/' . $id_problem . '/' . $materi->kode_materi);
			}
			else{
				$cekGetRetry = $this->Model_Guru->getJawabanById($jawabanGuru[0]->id_jawaban_guru, $id_soal, $nis_nip);
				//$score = 100;
				$soalProblem = $this->Model_Guru->tampilSoalProblemByIdSoal($id_soal);
				$retry = $cekGetRetry->retry+1;
				$data = array(
					'id_jawaban_guru' => $jawabanGuru[0]->id_jawaban_guru,
					'id_soal' => $id_soal,
					'nis_nip' => $nis_nip,
					'jawaban' => " ",
					'score'	  => 0,
					'retry'	  => $retry
				);
				$this->Model_Guru->update_jawaban_siswa($cekGetRetry->id_jawaban_siswa, $data);

				$materi = $this->Model_Guru->getProblemByIdProblem($id_problem);
				redirect('/siswa/detail_problem/' . $id_problem . '/' . $materi->kode_materi);
			}
			// jika jawabannya salah
			// 1. tambahkan scroe retry
			// kuery ke database ke table tb_jawaban_problem_siswa
			// 
			// 2. redirect ke halaman awal (stay)
		}
	}
}

