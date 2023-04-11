<?php include 'master/header.php'; ?>
 | Materi Siswa  </title><head>
<?php include 'master/navbar_siswa.php'; ?>

    <div class="pagetitle">
      <h1>Daftar Materi</h1>
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
              <h5 class="card-title">Materi</h5>
              <p>Ini adalah daftar materi yang tersedia dalam pembelajaran anda</p>
    
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
                    <th scope="col">Materi</th>
                    <th scope="col">Sub Materi</th>
                    <th scope="col">Video Materi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($datamateri as $d) :?> 
                    <tr>
                        <td><?=$i++ ?></td>
                        <td><a href="<?php echo base_url(). 'siswa/detail_materi/'.$d->kode_materi ?>" ><?=$d->judul ?></a></td>
                        <td><?=$d->sub_judul ?></td>
                        <?php if ($d->video_materi == null || $d->video_materi == ""):?>
                        <td></td>
                        <?php else:?>
                        <td><iframe src="https://www.youtube.com/embed/<?= $d->video_materi ?>" frameborder="0" allowfullscreen></iframe> </td>
                        <?php endif;?>

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