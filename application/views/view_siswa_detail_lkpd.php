<?php include 'master/header.php'; ?>
| Detail LKPD Siswa </title><head>
<?php include 'master/navbar_siswa.php'; ?>

    <div class="pagetitle">
        <h1>Daftar Soal <?= $datamateri->nama_lkpd?> </h1>
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
                        <form method="post" action="<?php echo base_url(). 'siswa/tambah_jawaban_lkpd/' . $dataidlkpd; ?>">
                            <?php 
                                foreach ($datasoalevaluasi as $d) :?> 
                                <!-- Soal Card -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Soal <span>| No. <?=$d->no_soal?> </span></h5>
                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                <?=$d->soal ?>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                            <h5 class="card-title"> Jawaban <span> | No. <?=$d->no_soal?> </span></h5>
                                                <div class="form-group">
                                                    <label for="option_<?=$d->no_soal?>" ></label>
                                                    <textarea class="form-control" name="option_<?=$d->no_soal?>" id="option_<?=$d->no_soal?>" rows="8" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_soal[]" value="<?= $d->id_soal?>">
                                    <input type="hidden" name="nis_nip" value="<?= $this->session->userdata("nis_nip");?>">
                                    <input type="hidden" name="id_lkpd" value="<?= $d->id_lkpd?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Soal Card -->
        <button type="submit" class="btn btn-primary" onclick="return confirm ('Apakah Anda Yakin Akan Submit Kuis ini ?')"> Submit </button>
    </form>

</main><!-- End #main -->
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