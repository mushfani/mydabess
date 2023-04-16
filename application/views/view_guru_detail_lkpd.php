<?php include 'master/header.php'; ?>
 | LKPD Detail Guru </title><head>
<?php include 'master/navbar_guru.php'; ?>

    <div class="pagetitle">
    <h1>Daftar Soal <?= $datamateri->nama_lkpd ?> </h1>
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
              <h5 class="card-title">Soal LKPD</h5>
              <p>Ini adalah daftar soal LKPD yang tersedia dalam pembelajaran anda</p>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addMateri">
                Tambah Soal LKPD
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
                      <h5 class="modal-title">Tambah Soal LKPD</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="<?php echo base_url(). 'guru/tambah_soal_lkpd'; ?>">
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="hidden" name="id_lkpd" id="id_lkpd" value="<?=$this->uri->segment(3)?>">
                          <input type="text" class="form-control input_user" name="no_soal" id="no_soal" placeholder="no soal">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="soal" id="soal" placeholder="soal">
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
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($dataevaluasi as $d) :?> 
                    <tr>
                        <td><?=$i++ ?></td>
                        <td><?=$d->soal ?></td>
                        <td>
                          <a class="btn btn-warning" href="<?php echo base_url().'guru/edit_soal_lkpd/'. $d->id_soal.'/'.$dataidlkpd?>"> <i class="bx bx-edit-alt me-1"></i> </a>
                          <a class="btn btn-danger" href="<?php echo base_url().'guru/delete_soal_lkpd/'. $d->id_soal.'/'.$dataidlkpd?>"> <i class="bx bx-trash me-1"></i> </a>
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