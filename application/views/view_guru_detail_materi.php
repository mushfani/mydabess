<?php include 'master/header.php'; ?>
 | Detail Materi Guru </title><head>
<?php include 'master/navbar_guru.php'; ?>

    <div class="pagetitle">
      <?php
        foreach ($datamapel as $d) :?>
        <h1 value="<?=$d->kode_mapel ?>"><?=$d->nama_mapel ?></h1>
      <?php endforeach; ?>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"> Materi </li>
          <li class="breadcrumb-item active">Sub Materi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Panduan Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title"><?= $datamateri->judul?> <span>| <?= $datamateri->sub_judul?></span></h5>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <?= $datamateri->deskripsi?> 
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Panduan Card -->


            <!-- Panduan Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Video <span>| Materi</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                              Supaya kamu dapat lebih memahami materi, yuk simak video materi berikut!
                              <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $datamateri->video_materi ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Panduan Card -->

             <!-- Panduan Card -->
             <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Modul <span>| Materi</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                            Supaya kamu dapat lebih memahami materi, silakan baca dan download modul materi berikut!
                            <iframe src="https://drive.google.com/file/d/<?= $datamateri->modul_materi ?>" width="560" height="480" allow="autoplay"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Panduan Card -->
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