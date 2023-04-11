<?php include 'master/header.php'; ?>
| Detail Problem Siswa </title><head>
<?php include 'master/navbar_siswa.php'; ?>

    <div class="pagetitle">
        <h1>Daftar Soal (Ini manggil nama problem) </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

       <!-- Soal Card -->
    <div class="col-xxl-4 col-xl-12">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Kerjakan soal dengan benar dan teliti!</h5>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                        <form method="post" action="<?php echo base_url(). 'siswa/check_jawaban_problem/' .  $datasoal->id_soal ?>">   
                            <!-- Soal Card -->
                            <div class="row">
                                <div class="col-sm-14">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Video Problem Materi <span>| <?=$datasoal->id_soal?> </span></h5>
                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $datasoal->video_problem ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Soal <span>| <?=$datasoal->id_soal?> </span></h5>
                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <?=$datasoal->soal?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Tulis Secara Berurutan Menggunakan Bahasa Indonesia! </span></h5>
                                        <div class="d-flex align-items-center">
                                            <div class="ps-3">
                                                <input type="text" name="jawaban1" class="form-control" placeholder="Jawaban Kesatu">
                                            </div>
                                            <div class="ps-3">
                                                <input type="text" name="jawaban2" class="form-control" placeholder="Jawaban Kedua">
                                            </div>
                                            <div class="ps-3">
                                                <input type="text" name="jawaban3" class="form-control" placeholder="Jawaban Ketiga">
                                            </div>
                                            <input type="hidden" name="id_soal[]" value="<?= $datasoal->id_soal?>">
                                            <input type="hidden" name="nis_nip" value="<?= $this->session->userdata("nis_nip");?>">
                                            <input type="hidden" name="id_problem" value="<?= $datasoal->id_problem?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <!-- <div class="col-sm-4">
                            <button type="submit" class="btn btn-warning"> Prev </button>
                        </div> -->
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary" <?php echo $cek > 0 ? 'disabled' : '' ?> onclick="return confirm ('Apakah Anda Yakin Akan Submit Kuis ini ?')"> Submit </button>
                        </div>
                        <!-- <div class="col-sm-4">
                            <button type="submit" class="btn btn-success"> Next </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div><!-- End Soal Card -->
    </form>
  <!-- Vendor JS Files -->
  <script src="<?php echo base_url() ?>/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url() ?>/assets/js/main.js"></script>

</body>

</html>