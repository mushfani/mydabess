<?php include 'master/header.php'; ?>
 | Formatif Detail Guru </title><head>
<?php include 'master/navbar_guru.php'; ?>

    <div class="pagetitle">
    <h1>Daftar Soal <?= $datamateri->nama_formatif?> </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
              <h5 class="card-title">Soal Formatif TP</h5>
              <p>Ini adalah daftar soal formatif TP yang tersedia dalam pembelajaran anda</p>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addMateri">
                Tambah Soal Formatif
              </button>
              <?php if ($this->session->flashdata('ver') == 'FALSE') { ?>
                <div class="alert alert-<?=$this->session->flashdata("class_alert");?> alert-dismissible" role="alert">
                    <?php echo $this->session->flashdata('alert'); ?>
                    <?php $this->session->set_flashdata('ver',"TRUE");?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?>
              <div class="modal fade" id="addMateri" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Soal Formatif</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="<?php echo base_url(). 'guru/tambah_soal_formatif'; ?>">
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="hidden" name="id_formatif" id="id_formatif" value="<?=$this->uri->segment(3)?>">
                          <input type="text" class="form-control input_user" name="no_soal" id="no_soal" placeholder="no soal">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="soal" id="soal" placeholder="soal">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="jawaban_a" id="jawaban_a" placeholder="jawaban a">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="jawaban_b" id="jawaban_b" placeholder="jawaban b">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="jawaban_c" id="jawaban_c" placeholder="jawaban c">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="jawaban_d" id="jawaban_d" placeholder="jawaban d">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="jawaban_e" id="jawaban_e" placeholder="jawaban e">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="jawaban_benar" id="jawaban_benar" placeholder="jawaban benar">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="skor" id="skor" placeholder="skor">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="button" class="btn btn-primary">Tambah</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Soal</th>
                    <th scope="col">Jawaban A</th>
                    <th scope="col">Jawaban B</th>
                    <th scope="col">Jawaban C</th>
                    <th scope="col">Jawaban D</th>
                    <th scope="col">Jawaban E</th>
                    <th scope="col">Jawaban Benar</th>
                    <th scope="col">Skor</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($datasoalevaluasi as $d) :?> 
                    <tr>
                        <td><?=$i++ ?></td>
                        <td><?=$d->soal ?></td>
                        <td><?=$d->jawaban_a ?></td>
                        <td><?=$d->jawaban_b ?></td>
                        <td><?=$d->jawaban_c ?></td>
                        <td><?=$d->jawaban_d ?></td>
                        <td><?=$d->jawaban_e?></td>
                        <td><?=$d->jawaban_benar ?></td>
                        <td><?=$d->skor ?></td>
                        <td>
                          <a class="btn btn-warning" href="<?php echo base_url().'guru/edit_soal_formatif/'. $d->id_soal.'/'.$dataidformatif?>"> <i class="bx bx-edit-alt me-1"></i> </a>
                          <a class="btn btn-danger" href="<?php echo base_url().'guru/delete_soal_formatif/'. $d->id_soal.'/'.$dataidformatif?>"> <i class="bx bx-trash me-1"></i> </a>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </section>

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