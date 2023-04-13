<?php 
class Model_Siswa extends CI_Model 
{

    // public function getMapel(){
    //     $this->db->select("*");
	// 	$this->db->where("kode_mapel",$kode_mapel);
	// 	$data = $this->db->get("tb_siswa_mapel")->result();
	// 	return $data;
    // }

    public function getMapelll(){
        $this->db->select('tb_mapel.kode_mapel, tb_mapel.nama_mapel, tb_mapel.created_at, tb_mapel.kelas');
        $this->db->from('tb_siswa_mapel');
        $this->db->join('tb_mapel','tb_mapel.kode_mapel=tb_siswa_mapel.kode_mapel');
       // $this->db->order_by('kode_mapel',  'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getMapel(){
        $this->db->select('tb_mapel.kode_mapel, tb_mapel.nama_mapel, tb_mapel.created_at, tb_mapel.kelas')->where("tb_siswa_mapel.nis_nip", $this->session->userdata('nis_nip'));
        $this->db->from('tb_siswa_mapel');
        $this->db->join('tb_mapel','tb_mapel.kode_mapel=tb_siswa_mapel.kode_mapel');
       // $this->db->order_by('kode_mapel',  'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function hapusdata($where, $table){
        $this->db->where ($where);
        $this->db->delete ($table);
    }

    public function tambahdata_mapel($data){
        $tambah = $this->db->insert('tb_siswa_mapel',$data);
        return $tambah;
    }

    public function tambahdata_nilai_pretest($data){
        $tambah = $this->db->insert('tb_hasil_pretest',$data);
        return $tambah;
    }

    public function tambahdata_nilai_posttest($data){
        $tambah = $this->db->insert('tb_hasil_posttest',$data);
        return $tambah;
    }

    public function tambahdata_nilai_recall($data){
        $tambah = $this->db->insert('tb_hasil_recall',$data);
        return $tambah;
    }

    public function tampil_data_recall_by_id($id_recall)
	{
		$this->db->select("*");
		$this->db->where("id_recall",$id_recall);
        $this->db->where("nis_nip", $this->session->userdata('nis_nip'));
		$data = $this->db->get("tb_hasil_recall")->result();
		return $data;
	}

    public function tampil_data_formatif_by_id($id_formatif)
	{
		$this->db->select("*");
		$this->db->where("id_formatif",$id_formatif);
        $this->db->where("nis_nip", $this->session->userdata('nis_nip'));
		$data = $this->db->get("tb_hasil_formatif")->result();
		return $data;
	}

    public function tampil_data_evaluasi_by_id($id_evaluasi)
	{
		$this->db->select("*");
		$this->db->where("id_evaluasi",$id_evaluasi);
        $this->db->where("nis_nip", $this->session->userdata('nis_nip'));
		$data = $this->db->get("tb_hasil_evaluasi")->result();
		return $data;
	}

    public function tampil_nilai_recall_byId(){
        $this->db->select('tb_recall.id_recall, tb_recall.nama_recall, tb_hasil_recall.id_recall, 
        tb_hasil_recall.skor_total')->where("tb_hasil_recall.nis_nip", $this->session->userdata('nis_nip'));
        $this->db->from('tb_recall');
        $this->db->join('tb_hasil_recall', 'tb_hasil_recall.id_recall=tb_recall.id_recall');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampil_nilai_recall_limit(){
        $this->db->select('tb_recall.id_recall, tb_recall.nama_recall, tb_hasil_recall.id_recall, 
        tb_hasil_recall.skor_total, tb_hasil_recall.nis_nip, tb_akun.nama_akun');
        $this->db->from('tb_recall');
        $this->db->join('tb_hasil_recall', 'tb_hasil_recall.id_recall=tb_recall.id_recall');
        $this->db->join('tb_akun', 'tb_akun.nis_nip=tb_hasil_recall.nis_nip');
        $this->db->order_by('skor_total',  'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    public function tampil_nilai_formatif_limit(){
        $this->db->select('tb_formatif.id_formatif, tb_formatif.nama_formatif, tb_hasil_formatif.id_formatif, 
        tb_hasil_formatif.skor_total, tb_hasil_formatif.nis_nip, tb_akun.nama_akun');
        $this->db->from('tb_formatif');
        $this->db->join('tb_hasil_formatif', 'tb_hasil_formatif.id_formatif=tb_formatif.id_formatif');
        $this->db->join('tb_akun', 'tb_akun.nis_nip=tb_hasil_formatif.nis_nip');
        $this->db->order_by('skor_total',  'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    public function tampil_nilai_evaluasi_limit(){
        $this->db->select('tb_evaluasi_materi.id_evaluasi, tb_evaluasi_materi.nama_evaluasi, tb_hasil_evaluasi.id_evaluasi, 
        tb_hasil_evaluasi.skor_total, tb_hasil_evaluasi.nis_nip, tb_akun.nama_akun');
        $this->db->from('tb_evaluasi_materi');
        $this->db->join('tb_hasil_evaluasi', 'tb_hasil_evaluasi.id_evaluasi=tb_evaluasi_materi.id_evaluasi');
        $this->db->join('tb_akun', 'tb_akun.nis_nip=tb_hasil_evaluasi.nis_nip');
        $this->db->order_by('skor_total',  'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }
    public function ambil_skor_recall($id_recall) {
        $this->db->select("*");
		$this->db->where("id_recall", $id_recall);
        $this->db->where("nis_nip", $this->session->userdata('nis_nip'));
		$data = $this->db->get("tb_hasil_recall")->row();
		return $data;
    }

    public function ambil_skor_eval($id_evaluasi) {
        $this->db->select("*");
		$this->db->where("id_evaluasi", $id_evaluasi);
        $this->db->where("nis_nip", $this->session->userdata('nis_nip'));
		$data = $this->db->get("tb_hasil_evaluasi")->row();
		return $data;
    }

    public function ambil_skor_formatif($id_formatif) {
        $this->db->select("*");
		$this->db->where("id_formatif", $id_formatif);
        $this->db->where("nis_nip", $this->session->userdata('nis_nip'));
		$data = $this->db->get("tb_hasil_formatif")->row();
		return $data;
    }

    // public function tampil_nilai_problem_byId(){
    //     $this->db->select('tb_jawaban_problem_siswa.id_soal, tb_jawaban_problem_siswa.score, 
    //     tb_jawaban_problem_siswa.retry, tb_soal_problem.id_soal, tb_problem.kode_materi,
    //     tb_materi.kode_materi, tb_problem_session.kode_materi, tb_problem_session_realtime')->where("tb_problem_session.nis_nip", $this->session->userdata('nis_nip'));
    //     $this->db->from('tb_jawaban_problem_siswa');
    //     $this->db->join('tb_soal_problem', 'tb_soal_problem.id_soal=tb_jawaban_problem_siswa.id_soal');
    //     $this->db->join('tb_materi', 'tb_materi.kode_materi=tb_problem_session.kode_materi');
    //     $this->db->join('tb_problem', 'tb_problem.kode_materi=tb_problem_session.kode_materi');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function tampil_nilai_problem_byId(){
        $this->db->select('tb_jawaban_problem_siswa.id_soal, tb_jawaban_problem_siswa.score,
        tb_jawaban_problem_siswa.retry, tb_soal_problem.id_problem, tb_soal_problem.id_soal,
        tb_problem.id_problem, tb_problem.nama_problem')->where("tb_jawaban_problem_siswa.nis_nip", $this->session->userdata('nis_nip'));
        $this->db->from('tb_jawaban_problem_siswa');
        $this->db->join('tb_soal_problem', 'tb_soal_problem.id_soal=tb_jawaban_problem_siswa.id_soal');
        $this->db->join('tb_problem', 'tb_problem.id_problem=tb_soal_problem.id_problem');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampil_nilai_formatif_byId(){
        $this->db->select('tb_formatif.id_formatif, tb_formatif.nama_formatif, tb_hasil_formatif.id_formatif, 
        tb_hasil_formatif.skor_total')->where("tb_hasil_formatif.nis_nip", $this->session->userdata('nis_nip'));
        $this->db->from('tb_formatif');
        $this->db->join('tb_hasil_formatif', 'tb_hasil_formatif.id_formatif=tb_formatif.id_formatif');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampil_nilai_evaluasi_byId(){
        $this->db->select('tb_evaluasi_materi.id_evaluasi, tb_evaluasi_materi.nama_evaluasi, tb_hasil_evaluasi.id_evaluasi, 
        tb_hasil_evaluasi.skor_total')->where("tb_hasil_evaluasi.nis_nip", $this->session->userdata('nis_nip'));
        $this->db->from('tb_evaluasi_materi');
        $this->db->join('tb_hasil_evaluasi', 'tb_hasil_evaluasi.id_evaluasi=tb_evaluasi_materi.id_evaluasi');
        $query = $this->db->get();
        return $query->result();
    }

    public function tambahdata_nilai_formatif($data){
        $tambah = $this->db->insert('tb_hasil_formatif',$data);
        return $tambah;
    }

    public function tambahdata_nilai_evaluasi($data){
        $tambah = $this->db->insert('tb_hasil_evaluasi',$data);
        return $tambah;
    }

    public function tambahdata_jawaban_lkpd($data){
        $tambah = $this->db->insert('tb_jawaban_siswa_lkpd',$data);
        return $tambah;
    }

    public function join_lkpd_materi($nis_nip) {
        $this->db->select('tb_materi.judul, tb_lkpd.id_lkpd, tb_lkpd.file_lkpd, tb_lkpd.kode_materi, tb_lkpd.nama_lkpd, count(tb_jawaban_siswa_lkpd.id) as total_jawaban_siswa');
        $this->db->from('tb_materi');
        $this->db->join('tb_lkpd','tb_lkpd.kode_materi=tb_materi.kode_materi');
        $this->db->join('tb_jawaban_siswa_lkpd', 'tb_jawaban_siswa_lkpd.id_lkpd=tb_lkpd.id_lkpd and tb_jawaban_siswa_lkpd.nis_nip='.$nis_nip.'', 'left');
        $this->db->group_by('tb_materi.judul, tb_lkpd.id_lkpd, tb_lkpd.kode_materi, tb_lkpd.nama_lkpd, tb_lkpd.file_lkpd');
        $this->db->order_by('kode_materi',  'ASC');
        $this->db->order_by('id_lkpd', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getChartData($nis_nip) {
        $query = $this->db->select('tb_akun.nama_akun, tb_hasil_evaluasi.skor_total as evaluasi_score, tb_hasil_recall.skor_total as recall_score, tb_hasil_formatif.skor_total as formatif_score')
            ->from('tb_akun')
            ->join('tb_hasil_evaluasi', 'tb_akun.nis_nip = tb_hasil_evaluasi.nis_nip')
            ->join('tb_evaluasi_materi', 'tb_evaluasi_materi.id_evaluasi = tb_hasil_evaluasi.id_evaluasi')
            ->join('tb_hasil_recall', 'tb_akun.nis_nip = tb_hasil_recall.nis_nip')
            ->join('tb_recall', 'tb_recall.id_recall = tb_hasil_recall.id_recall')
            ->join('tb_hasil_formatif', 'tb_akun.nis_nip = tb_hasil_formatif.nis_nip')
            ->join('tb_formatif', 'tb_formatif.id_formatif = tb_hasil_formatif.id_formatif')
            ->where('tb_akun.nis_nip', $nis_nip)
            ->get();

        return $query->result();
    }

    public function getChartData2($nis_nip) {
        $data = [];
        $query = $this->db->select('kode_materi, judul')->from('tb_materi')->get()->result();

        foreach($query as $dataItem){
            $id_recall = $this->db->select('tb_recall.id_recall')->from('tb_recall')->where('kode_materi = '. $dataItem->kode_materi)->get()->result()[0]->id_recall;
            $id_evaluasi = $this->db->select('tb_evaluasi_materi.id_evaluasi')->from('tb_evaluasi_materi')->where('kode_materi ='. $dataItem->kode_materi)->get()->result()[0]->id_evaluasi;
            // print("<pre>"."kode materi ".print_r($dataItem->judul,true)."id recall ".print_r($id_recall,true)."id eval ".print_r($id_evaluasi,true)."</pre>");

            $dataMateri = array(
                $dataItem->judul,
                $this->db->select('skor_total')->from('tb_hasil_recall')->where('tb_hasil_recall.id_recall = '.$id_recall)->where('nis_nip = '.$nis_nip)->get()->result_array()[0]["skor_total"],
                $this->db->select('skor_total')->from('tb_hasil_evaluasi')->where('tb_hasil_evaluasi.id_evaluasi = '.$id_evaluasi)->where('nis_nip = '.$nis_nip)->get()->result_array()[0]["skor_total"]
            );
            array_push($data, $dataMateri);
        }
        // print("<pre>".print_r($data,true)."</pre>");

        return $data;
    }
}
?>