<?php include 'master/header.php'; ?>
| LKPD Siswa </title><head>
<?php include 'master/navbar_siswa.php'; ?>

    <div class="pagetitle">
      <h1> Daftar LKPD </h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
              <h5 class="card-title">LKPD</h5>
              <p>Ini adalah daftar LKPD yang tersedia dalam pembelajaran anda</p>

              <?php if ($this->session->flashdata('message_success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('message_success') ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
            
              <?php if ($this->session->flashdata('ver') == 'FALSE') { ?>
                <div class="alert alert-<?=$this->session->flashdata("class_alert");?> alert-dismissible" role="alert">
                    <?php echo $this->session->flashdata('alert'); ?>
                    <?php $this->session->set_flashdata('ver',"TRUE");?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Materi LKPD</th>
                    <th scope="col">File LKPD </th>
                    <th scope="col">Status </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($datamaterijoin as $d) :?> 
                    <tr>
                        <td><?=$i++ ?></td>
                        <td>
                          <?php if ($d->total_jawaban_siswa > 0): ?>
                            <?=$d->judul ?>
                          <?php else: ?>
                            <a href="<?php echo base_url(). 'siswa/detail_lkpd/'.$d->id_lkpd ?>" ><?=$d->judul ?></a>
                          <?php endif; ?>
                        </td>
                        <td><iframe src="https://docs.google.com/document/d/e/<?=$d->file_lkpd?>" width="560" height="250" allow="autoplay"></iframe></td>
                        <td>
                          <?php if ($d->total_jawaban_siswa > 0): ?>
                            <span class="badge rounded-pill bg-success">Sudah Menjawab</span>
                          
                          <?php else: ?>
                            <span class="badge rounded-pill bg-danger">Belum Menjawab</span>
                            
                          <?php endif; ?>
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