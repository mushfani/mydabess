<?php 
class Model_Guru extends CI_Model 
{

    public function getRecords(){
        $query = $this->db->get('tb_mapel');
        return $query->result();
    }
    
    public function getRecords2(){
        $this->db->order_by('kode_materi', 'ASC');
        $query = $this->db->get('tb_materi');
        return $query->result();
    }

    public function getRecords3(){
        $query = $this->db->get('tb_evaluasi_materi');
        return $query->result();
    }

    public function getRecords3ByIdEvaluasi($id_evaluasi){
        $this->db->select("*");
        $this->db->where("id_evaluasi",$id_evaluasi);
        $query = $this->db->get('tb_evaluasi_materi');
        return $query->row();
    }

    public function getRecords4(){
        $query = $this->db->get('tb_soal_evaluasi');
        return $query->result();
    }

    public function getRecords5(){
        $this->db->order_by('kode_materi', 'ASC');
        $query = $this->db->get('tb_recall');
        return $query->result();
    }

    public function getRecords5ByIdRecall($id_recall){
        $this->db->select("*");
        $this->db->where("id_recall",$id_recall);
        $query = $this->db->get('tb_recall');
        return $query->row();
    }

    public function getRecords6(){
        $query = $this->db->get('tb_recall_soal');
        return $query->result();
    }

    public function getRecords7(){
        $this->db->order_by('kode_materi', 'ASC');
        $query = $this->db->get('tb_formatif');
        return $query->result();       
    }

    public function getRecords7ByIdFormatif($id_formatif){
        $this->db->select("*");
        $this->db->where("id_formatif",$id_formatif);
        $query = $this->db->get('tb_formatif');
        return $query->row();
    }

    public function getRecords8(){
        $query = $this->db->get('tb_formatif_soal');
        return $query->result();
    }

    public function getRecords9(){
        $query = $this->db->get('tb_lkpd');
        return $query->result();
    }

    public function getRecords9ByIdLkpd($id_lkpd){
        $this->db->select("*");
        $this->db->where("$id_lkpd",$id_lkpd);
        $query = $this->db->get('tb_lkpd');
        return $query->row();
    }

    public function getRecords10(){
        $query = $this->db->get('tb_soal_lkpd');
        return $query->result();
    }

    public function getRecords10ByIdSoal($id_soal){
        $this->db->select("*");
        $this->db->where("id_soal",$id_soal);
        $query = $this->db->get('tb_jawaban_siswa_lkpd');
        return $query->row();
    }

    public function getRecords10ByIdSoalNis($id_soal, $nis_nip){
        $this->db->select("*");
        $this->db->where("id_soal",$id_soal);
        $this->db->where("nis_nip",$nis_nip);
        $query = $this->db->get('tb_jawaban_siswa_lkpd');
        return $query->row();
    }

    public function getRecords11(){
        $this->db->order_by('kode_materi', 'ASC');
        $query = $this->db->get('tb_problem');
        return $query->result();
    }

    public function getRecords11ByIdProblem($id_problem){
        $this->db->select("*");
        $this->db->where("$id_problem",$id_problem);
        $query = $this->db->get('tb_problem');
        return $query->row();
    }

    public function tampilsoallogthink()
	{
		$query = $this->db->get('tb_test_lt_soal');
        return $query->result();
	}

    public function tampilsoalpretest()
	{
		$query = $this->db->get('tb_pretest_soal_basdat');
        return $query->result();
	}

    public function tampilsoalposttest()
	{
		$query = $this->db->get('tb_posttest_soal_basdat');
        return $query->result();
	}

    public function tampilsoalevaluasi_by_id($id_evaluasi)
	{
		$this->db->select("*");
		$this->db->where("id_evaluasi",$id_evaluasi);
		$data = $this->db->get("tb_soal_evaluasi")->result();
		return $data;
	}

    public function tampilsoalevaluasi_by_row($id_soal)
	{
		$this->db->select("*");
		$this->db->where("id_soal",$id_soal);
		$data = $this->db->get("tb_soal_evaluasi")->row();
		return $data;
	}

    public function tampilsoalrecall_by_id($id_recall)
	{
		$this->db->select("*");
		$this->db->where("id_recall",$id_recall);
		$data = $this->db->get("tb_recall_soal")->result();
		return $data;
	}

    public function tampilsoalrecall_by_row($id_soal)
	{
		$this->db->select("*");
		$this->db->where("id_soal",$id_soal);
		$data = $this->db->get("tb_recall_soal")->row();
		return $data;
	}

    public function tampilsoalformatif_by_id($id_formatif)
	{
		$this->db->select("*");
		$this->db->where("id_formatif",$id_formatif);
		$data = $this->db->get("tb_formatif_soal")->result();
		return $data;
	}

    public function tampilsoalformatif_by_row($id_soal)
	{
		$this->db->select("*");
		$this->db->where("id_soal",$id_soal);
		$data = $this->db->get("tb_formatif_soal")->row();
		return $data;
	}

    public function tampilsoallkpd_by_id($id_lkpd)
	{
		$this->db->select("*");
		$this->db->where("id_lkpd",$id_lkpd);
		$data = $this->db->get("tb_soal_lkpd")->result();
		return $data;
	}

    public function jmltampilsoallkpd_by_id($id_lkpd)
	{
		$this->db->select("*");
		$this->db->where("id_lkpd",$id_lkpd);
        $data = $this->db->get("tb_soal_lkpd");
        return $data;
	}

    public function tampilsoallkpd_by_row($id_soal)
	{
		$this->db->select("*");
		$this->db->where("id_soal",$id_soal);
		$data = $this->db->get("tb_soal_lkpd")->row();
		return $data;
	}

    public function tampilmapel_by_id($nis_nip)
	{
		$this->db->select("*");
		$this->db->where("nis_nip",$nis_nip);
		$data = $this->db->get("tb_mapel")->row();
		return $data;
	}

    public function tampilmateri_by_id($nis_nip)
	{
		$this->db->select("*");
		$this->db->where("nis_nip",$nis_nip);
		$data = $this->db->get("tb_materi")->row();
		return $data;
	}

    public function tampilmapel_by_kode($kode_mapel)
	{
		$this->db->select("*");
		$this->db->where("kode_mapel",$kode_mapel);
		$data = $this->db->get("tb_mapel")->row();
		return $data;
	}

    public function tampilmateri_by_kode($kode_materi)
	{
		$this->db->select("*");
		$this->db->where("kode_materi",$kode_materi);
		$data = $this->db->get("tb_materi")->row();
		return $data;
	}

    public function tampilevaluasi_by_id($id_evaluasi)
	{
		$this->db->select("*");
		$this->db->where("id_evaluasi",$id_evaluasi);
		$data = $this->db->get("tb_evaluasi_materi")->row();
		return $data;
	}

    public function tampilrecall_by_id($id_recall)
	{
		$this->db->select("*");
		$this->db->where("id_recall",$id_recall);
		$data = $this->db->get("tb_recall")->row();
		return $data;
	}

    public function tampildatarecall_by_id($id_recall)
	{
		$this->db->select("*");
		$this->db->where("id_recall",$id_recall);
		$data = $this->db->get("tb_hasil_recall")->row();
		return $data;
	}

    public function join_evaluasi_siswa() {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun');
        $this->db->from('tb_hasil_evaluasi');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_hasil_evaluasi.nis_nip');
        $this->db->order_by('nama_akun',  'ASC');
       // $this->db->order_by('id_evaluasi', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_formatif_siswa() {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun');
        $this->db->from('tb_hasil_evaluasi');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_hasil_evaluasi.nis_nip');
        $this->db->order_by('nama_akun',  'ASC');
       // $this->db->order_by('id_evaluasi', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_recall_siswa() {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun');
        $this->db->from('tb_hasil_recall');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_hasil_recall.nis_nip');
        $this->db->order_by('nama_akun',  'ASC');
      //  $this->db->order_by('id_recall', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_recall_siswa_byId($id_recall) {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun, tb_hasil_recall.id, tb_hasil_recall.id_recall, tb_hasil_recall.skor_total');
        $this->db->from('tb_hasil_recall');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_hasil_recall.nis_nip');
        $this->db->where('tb_hasil_recall.id_recall', $id_recall);
        $this->db->order_by('nama_akun',  'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_recall_siswa_byNis($nis_nip) {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun, tb_hasil_recall.id, tb_hasil_recall.id_recall, tb_hasil_recall.skor_total');
        $this->db->from('tb_hasil_recall');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_hasil_recall.nis_nip');
        $this->db->where('tb_hasil_recall.nis_nip', $nis_nip);
        $this->db->order_by('nama_akun',  'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_evaluasi_siswa_byId($id_evaluasi) {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun, tb_hasil_evaluasi.id, tb_hasil_evaluasi.id_evaluasi, tb_hasil_evaluasi.skor_total');
        $this->db->from('tb_hasil_evaluasi');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_hasil_evaluasi.nis_nip');
        $this->db->where('tb_hasil_evaluasi.id_evaluasi', $id_evaluasi);
        $this->db->order_by('nama_akun',  'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_formatif_siswa_byId($id_formatif) {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun, tb_hasil_formatif.id, tb_hasil_formatif.id_formatif, tb_hasil_formatif.skor_total');
        $this->db->from('tb_hasil_formatif');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_hasil_formatif.nis_nip');
        $this->db->where('tb_hasil_formatif.id_formatif', $id_formatif);
        $this->db->order_by('nama_akun',  'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_problem_siswa() {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun');
        $this->db->from('tb_jawaban_problem_siswa');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_jawaban_problem_siswa.nis_nip');
        $this->db->order_by('nama_akun',  'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_lkpd_siswa() {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun');
        $this->db->from('tb_jawaban_siswa_lkpd');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_jawaban_siswa_lkpd.nis_nip');
        $this->db->order_by('nama_akun',  'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_lkpd_siswa_byId($id_lkpd) {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun, tb_jawaban_siswa_lkpd.id, tb_jawaban_siswa_lkpd.id_lkpd, tb_jawaban_siswa_lkpd.skor');
        $this->db->from('tb_jawaban_siswa_lkpd');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_jawaban_siswa_lkpd.nis_nip');
        $this->db->where('tb_jawaban_siswa_lkpd.id_lkpd', $id_lkpd);
        $this->db->order_by('nama_akun',  'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_lkpd_soal_siswa_byId($idUser, $idlkpd) {
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun,tb_soal_lkpd.id_soal, tb_soal_lkpd.soal, tb_jawaban_siswa_lkpd.id, tb_jawaban_siswa_lkpd.jawaban, tb_jawaban_siswa_lkpd.id_lkpd, tb_jawaban_siswa_lkpd.skor', 'tb_soal_lkpd.id_lkpd');
        $this->db->from('tb_jawaban_siswa_lkpd');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_jawaban_siswa_lkpd.nis_nip');
        $this->db->join('tb_soal_lkpd','tb_jawaban_siswa_lkpd.id_soal = tb_soal_lkpd.id_soal');
        $this->db->where('tb_jawaban_siswa_lkpd.nis_nip', $idUser);
        $this->db->where('tb_jawaban_siswa_lkpd.id_lkpd', $idlkpd);
        $this->db->order_by('nama_akun', 'ASC');
        // $this->db->group_by('tb_soal_lkpd.id_soal, tb_jawaban_siswa_lkpd.id, tb_soal_lkpd.id_lkpd');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_lkpd_siswa_byIdDistinc($id_lkpd) {
        $this->db->distinct();
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun, tb_jawaban_siswa_lkpd.id, tb_jawaban_siswa_lkpd.id_lkpd, tb_jawaban_siswa_lkpd.skor, tb_jawaban_siswa_lkpd.jawaban');
        $this->db->from('tb_jawaban_siswa_lkpd');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_jawaban_siswa_lkpd.nis_nip');
        $this->db->where('tb_jawaban_siswa_lkpd.id_lkpd', $id_lkpd);
        $this->db->group_by('nis_nip');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_problem_siswa_byIdDistinc($id_problem) {
        $this->db->distinct();
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun, tb_jawaban_problem_siswa.id_soal, 
        tb_jawaban_problem_siswa.score, tb_jawaban_problem_siswa.retry, tb_soal_problem.id_soal');
        $this->db->from('tb_jawaban_problem_siswa');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_jawaban_problem_siswa.nis_nip');
        $this->db->join('tb_soal_problem','tb_soal_problem.id_soal= tb_jawaban_problem_siswa.id_soal');
        $this->db->where('tb_soal_problem.id_problem', $id_problem);
        $this->db->group_by('nis_nip');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_jawaban_siswa_byIdDistinc($id_soal) {
        $this->db->distinct();
        $this->db->select('tb_akun.nis_nip, tb_akun.nama_akun, tb_jawaban_siswa_lkpd.id, tb_jawaban_siswa_lkpd.id_lkpd, tb_jawaban_siswa_lkpd.id_soal, tb_jawaban_siswa_lkpd.skor, tb_jawaban_siswa_lkpd.jawaban');
        $this->db->from('tb_jawaban_siswa_lkpd');
        $this->db->join('tb_akun','tb_akun.nis_nip = tb_jawaban_siswa_lkpd.nis_nip');
        $this->db->where('tb_jawaban_siswa_lkpd.id_soal', $id_soal);
        $this->db->group_by('nis_nip');
        $query = $this->db->get();
        return $query->row();
    }

    public function tampilformatif_by_id($id_formatif)
	{
		$this->db->select("*");
		$this->db->where("id_formatif",$id_formatif);
		$data = $this->db->get("tb_formatif")->row();
		return $data;
	}

    public function tampillkpd_by_id($id_lkpd)
	{
		$this->db->select("*");
		$this->db->where("id_lkpd",$id_lkpd);
		$data = $this->db->get("tb_lkpd")->row();
		return $data;
	}

    public function tambahdata_mapel($data){
        $tambah = $this->db->insert('tb_mapel',$data);
        return $tambah;
    }

    public function hapusdata_mapel($where, $table)
    {	
        $this->db->where ($where);
        $this->db->delete ($table);
    }

    function edit_mapel($kode_mapel, $data){
        $this->db->where("kode_mapel",$kode_mapel);
        $this->db->update("tb_mapel",$data);
    }

    public function tambahdata_materi($data){
        
        $tambah = $this->db->insert('tb_materi',$data);
        return $tambah;
    }

    function edit_materi($kode_materi, $data){
        $this->db->where("kode_materi",$kode_materi);
        $this->db->update("tb_materi",$data);
    }

    public function hapusdata_materi($where, $table)
    {	
        $this->db->where ($where);
        $this->db->delete ($table);
    }

    public function tambahdata_evaluasi($data){
        
        $tambah = $this->db->insert('tb_evaluasi_materi',$data);
        return $tambah;
    }

    function edit_evaluasi($id_evaluasi, $data){
        $this->db->where("id_evaluasi",$id_evaluasi);
        $this->db->update("tb_evaluasi_materi",$data);
    }

    public function hapusdata_evaluasi($where, $table){
        $this->db->where ($where);
        $this->db->delete ($table);
    }

    public function join_eval_materi() {
        $this->db->select('tb_materi.judul, tb_evaluasi_materi.id_evaluasi, tb_evaluasi_materi.kode_materi, tb_evaluasi_materi.nama_evaluasi');
        $this->db->from('tb_materi');
        $this->db->join('tb_evaluasi_materi','tb_evaluasi_materi.kode_materi=tb_materi.kode_materi');
        $this->db->order_by('kode_materi',  'ASC');
        $this->db->order_by('id_evaluasi', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_lkpd_materi() {
        $this->db->select('tb_materi.judul, tb_lkpd.id_lkpd, tb_lkpd.kode_materi, tb_lkpd.nama_lkpd');
        $this->db->from('tb_materi');
        $this->db->join('tb_lkpd','tb_lkpd.kode_materi=tb_materi.kode_materi');
        $this->db->order_by('kode_materi',  'ASC');
        $this->db->order_by('id_lkpd', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_formatif_materi() {
        $this->db->select('tb_materi.judul, tb_formatif.id_formatif, tb_formatif.kode_materi, tb_formatif.nama_formatif');
        $this->db->from('tb_materi');
        $this->db->join('tb_formatif','tb_formatif.kode_materi=tb_materi.kode_materi');
        $this->db->order_by('kode_materi',  'ASC');
        $this->db->order_by('id_formatif', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function join_recall_materi() {
        $this->db->select('tb_materi.judul, tb_recall.id_recall, tb_recall.kode_materi, tb_recall.nama_recall');
        $this->db->from('tb_materi');
        $this->db->join('tb_recall','tb_recall.kode_materi=tb_materi.kode_materi');
        $this->db->order_by('kode_materi',  'ASC');
        $this->db->order_by('id_recall', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function tambahdata_soalevaluasi($data){
        
        $tambah = $this->db->insert('tb_soal_evaluasi',$data);
        return $tambah;
    }

    public function edit_soalevaluasi($id_soal, $data){
        $this->db->where("id_soal",$id_soal);
        $this->db->update("tb_soal_evaluasi",$data);
    }

    public function hapusdata_soalevaluasi($where, $table){
        $this->db->where ($where);
        $this->db->delete ($table);
    }

    public function tambahdata_formatif($data){
        $tambah = $this->db->insert('tb_formatif',$data);
        return $tambah;
    }

    function edit_formatif($id_formatif, $data){
        $this->db->where("id_formatif",$id_formatif);
        $this->db->update("tb_formatif",$data);
    }

    public function tambahdata_recall($data){
        $tambah = $this->db->insert('tb_recall',$data);
        return $tambah;
    }

    function edit_recall($id_recall, $data){
        $this->db->where("id_recall",$id_recall);
        $this->db->update("tb_recall",$data);
    }

    public function tambahdata_soalrecall($data){
        
        $tambah = $this->db->insert('tb_recall_soal',$data);
        return $tambah;
    }

    public function edit_soalrecall($id_soal, $data){
        $this->db->where("id_soal",$id_soal);
        $this->db->update("tb_recall_soal",$data);
    }

    public function tambahdata_soalformatif($data){
        
        $tambah = $this->db->insert('tb_formatif_soal',$data);
        return $tambah;
    }

    public function edit_soalformatif($id_soal, $data){
        $this->db->where("id_soal",$id_soal);
        $this->db->update("tb_formatif_soal",$data);
    }

    public function tambahdata_lkpd($data){
        $tambah = $this->db->insert('tb_lkpd',$data);
        return $tambah;
    }

    function edit_lkpd($id_lkpd, $data){
        $this->db->where("id_lkpd",$id_lkpd);
        $this->db->update("tb_jawaban_siswa_lkpd",$data);
    }

    function edit_skor_lkpd($id_soal, $nis_nip, $data){
        $this->db->where("id_soal",$id_soal);
        $this->db->where("nis_nip",$nis_nip);
        $this->db->update("tb_jawaban_siswa_lkpd",$data);
    }

    public function tambahdata_soallkpd($data){
        
        $tambah = $this->db->insert('tb_soal_lkpd',$data);
        return $tambah;
    }

    public function edit_soallkpd($id_soal, $data){
        $this->db->where("id_soal",$id_soal);
        $this->db->update("tb_soal_lkpd",$data);
    }

    public function ambil_lkpd($id_lkpd) {
        return $this->db->where('id_lkpd', $id_lkpd)
                    ->from('tb_lkpd')
                    ->get()->row();
    }

    public function ambil_skor_recall($id_recall) {
        return $this->db->where('$id_recall', $id_recall)
                    ->from('tb_hasil_recall')
                    ->get()->row();
    }

    public function join_problem_materi() {
        $this->db->select('tb_materi.judul, tb_problem.id_problem, tb_problem.kode_materi, tb_problem.nama_problem');
        $this->db->from('tb_materi');
        $this->db->join('tb_problem','tb_problem.kode_materi=tb_materi.kode_materi');
        $this->db->order_by('kode_materi',  'ASC');
        $this->db->order_by('id_problem', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampilproblem_by_id($id_problem)
	{
		$this->db->select("*");
		$this->db->where("id_problem",$id_problem);
		$data = $this->db->get("tb_soal_problem")->row();
		return $data;
	}

    public function tampilJawabanGuruByIdSoal($id_soal){
        $this->db->select("*");
		$this->db->where("id_soal",$id_soal);
        $data = $this->db->get("tb_jawaban_problem_guru")->result();
        return $data;
    }

    public function tampilSoalProblemByIdSoal($id_soal){
        $this->db->select("*");
		$this->db->where("id_soal",$id_soal);
        $data = $this->db->get("tb_soal_problem")->row();
        return $data;
    }

    public function cekJawabanSiswa($id_jawaban_guru, $id_soal, $nis_nip){
        $this->db->select("*");
		$this->db->where("id_jawaban_guru",$id_jawaban_guru);
        $this->db->where("id_soal",$id_soal);
        $this->db->where("nis_nip", $nis_nip);
        $data = $this->db->get("tb_jawaban_problem_siswa")->num_rows();
        return $data;
    }

    public function create_jawaban_siswa($data){
        $tambah = $this->db->insert('tb_jawaban_problem_siswa',$data);
        return $tambah;
    }

    function update_jawaban_siswa($id_jawaban_siswa, $data){
        $this->db->where("id_jawaban_siswa",$id_jawaban_siswa);
        $this->db->update("tb_jawaban_problem_siswa",$data);
    }

    public function getPosisiJawaban($posisi){
        $this->db->select("*");
        $this->db->where("id_soal",$posisi);
        //$this->db->where("nis_nip", $nis_nip);
        $data = $this->db->get("tb_soal_problem")->row();
        return $data;
    }

    public function getJawabanById($id_jawaban_guru, $id_soal, $nis_nip){
        $this->db->select("*");
		$this->db->where("id_jawaban_guru",$id_jawaban_guru);
        $this->db->where("id_soal",$id_soal);
        $this->db->where("nis_nip", $nis_nip);
        $data = $this->db->get("tb_jawaban_problem_siswa")->row();
        return $data;
    }

    public function getJawabanSiswaByNisdanIdSoal($id_soal, $nis_nip){
        $this->db->select("*");
        $this->db->where("id_soal", $id_soal);
        $this->db->where("nis_nip", $nis_nip);
        $this->db->where("score != 0");
        $data = $this->db->get("tb_jawaban_problem_siswa")->num_rows();
        return $data;
    }

    public function getJawabanSiswaByNisdanIdSoal2($id_soal, $nis_nip){
        $this->db->select("*");
        $this->db->where("id_soal", $id_soal-1);
        $this->db->where("nis_nip", $nis_nip);
        $data = $this->db->get("tb_jawaban_problem_siswa")->num_rows();
        return $data;
    }

    public function getSoalByIdProblem($id_problem){
        $this->db->select("*");
        $this->db->where("id_problem", $id_problem);
        $data = $this->db->get("tb_soal_problem")->row();
        return $data;
    }

    public function getProblemByIdProblem($id_problem){
        $this->db->select("*");
        $this->db->where("id_problem", $id_problem);
        $data = $this->db->get("tb_problem")->row();
        return $data;
    }

    public function hasSession($kode_materi, $nis_nip) {
        return $this->db
                ->from('tb_problem_session')
                ->where('kode_materi', $kode_materi)
                ->where('nis_nip', $nis_nip)
                ->where('start IS NOT NULL')
                ->get()
                ->row();
    }

    public function createSession($data) {
        return $this->db->insert('tb_problem_session', $data);
    }

    public function updateSession($kode_materi, $nis_nip, $data) {
        return $this
            ->db
            ->where('kode_materi', $kode_materi)
            ->where('nis_nip', $nis_nip)
            ->update('tb_problem_session', $data);
    }

    public function getDurasi($kode_materi){
        $this->db->select("*");
        $this->db->where("kode_materi", $kode_materi);
        $this->db->where("nis_nip", $this->session->userdata('nis_nip'));
        $data = $this->db->get("tb_problem_session")->row();
        return $data;
    }

    // public function tampilsoalproblem_by_id($id_problem)
	// {
	// 	$this->db->select("*");
	// 	$this->db->where("id_problem",$id_problem);
	// 	$data = $this->db->get("tb_recall_soal")->result();
	// 	return $data;
	// }
}
?>