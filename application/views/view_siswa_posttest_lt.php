<?php include 'master/header.php'; ?>
| Posttest Logical Thinking </title><head>
<?php include 'master/navbar_siswa.php'; ?>

    <div class="pagetitle">
        <h1>Daftar Kuesioner Posttest Logical Thinking </h1>
     
    </div><!-- End Page Title -->

    <!-- Soal Card -->
    <div class="col-lg-12">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title" style="font-size:16px">Kerjakan kuesioner di bawah ini sesuai dengan kemampuan anda!</h5>
                <table>
                    <tr>
                        <td> 1 : Sangat Tidak Setuju,  </td>
                        <td> 2 : Tidak Setuju,  </td>
                        <td> 3 : Netral,  </td>
                        <td> 4 : Setuju,  </td>
                        <td> 5 : Sangat Setuju.  </td>
                    </tr>
                </table><br>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                        <form method="post" action="<?php echo base_url(). 'siswa/cek_pretest_basdat' ?>">
                            <?php 
                                foreach ($datasoalevaluasi as $d) :?> 
                                <div class="col-lg-12">
                                    <?=$d->no_soal?>
                                    <td>. <?=$d->soal ?></td>    
                                    <table>
                                        <tr>
                                            <td> 
                                                <div class="form-check mb-2"  >
                                                    <input class="form-check-input" type="radio" name="option_<?=$d->no_soal?>" id="jawaban_a" value="a" required>
                                                    <label class="form-check-label mx-4 " for="option_<?=$d->no_soal?>">1 <?=$d->jawaban_a ?></label>
                                                    
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="option_<?=$d->no_soal?>" id="jawaban_b" value="b" required>
                                                    <label class="form-check-label mx-4" for="option_<?=$d->no_soal?>">2 <?=$d->jawaban_b ?></label>
                                                </div>
                                            </td>
                                            <td> 
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="option_<?=$d->no_soal?>" id="jawaban_c" value="c" required>
                                                    <label class="form-check-label mx-4" for="option_<?=$d->no_soal?>">3 <?=$d->jawaban_c ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="option_<?=$d->no_soal?>" id="jawaban_d" value="d" required>
                                                    <label class="form-check-label mx-4" for="option_<?=$d->no_soal?>">4 <?=$d->jawaban_d ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="option_<?=$d->no_soal?>" id="jawaban_e" value="e" required>
                                                    <label class="form-check-label mx-4" for="option_<?=$d->no_soal?>">5 <?=$d->jawaban_e ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table><br>                    
                                    <input type="hidden" name="id_soal" value="<?= $d->id_soal?>">
                                    <input type="hidden" name="nis_nip" value="<?= $this->session->userdata("nis_nip");?>">
                                    <input type="hidden" name="id" value="<?= $d->id?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Soal Card -->
        <button type="submit" class="btn btn-primary" onclick="return confirm ('Apakah Anda Yakin Akan Submit Kuis ini ?')"> Submit </button>
        <button type="reset" class="btn btn-danger" onclick="return confirm ('Apakah Anda Yakin Akan Reset Seluruh Jawaban Kuis ini ?')"> Reset </button>
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