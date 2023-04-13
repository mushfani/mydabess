<?php include 'master/header.php'; ?>
| Grafik Siswa </title><head>
<?php include 'master/navbar_siswa.php'; ?>
    <div class="pagetitle">
      <h1>Daftar Rekap Nilai Pertemuan Materi Anda</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<main>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
              <h5 class="card-title">Rekap Pembelajaran</h5>
              <p>Ini adalah daftar nilai rekap pembelajaran yang telah anda selesaikan</p>
            
              <?php if ($this->session->flashdata('ver') == 'FALSE') { ?>
                <div class="alert alert-<?=$this->session->flashdata("class_alert");?> alert-dismissible" role="alert">
                    <?php echo $this->session->flashdata('alert'); ?>
                    <?php $this->session->set_flashdata('ver',"TRUE");?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?> 

              <div class="row match-height">
                <div class="col-sm-6 d-flex">
                  <div class="card h-90 w-100">
                    <div class="card-body">
                      <h5 class="card-title">Hasil Recall</h5>
                      <!-- Default Table -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Recall Kuis</th>
                            <th scope="col">Skor</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                            foreach ($dataku as $d) :?> 
                              <tr>
                                  <td><?=$i++ ?></td>
                                  <td><?=$d->nama_recall?></td>
                                  <td><?=$d->skor_total?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <!-- End Default Table Example -->
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 d-flex">
                  <div class="card h-90 w-100">
                    <div class="card-body">
                      <h5 class="card-title">Hasil Problem</h5>
                      <!-- Default Table -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Problem</th>
                            <th scope="col">Score</th>
                            <th scope="col">Try</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                            foreach ($dataku2 as $d) :?> 
                              <tr>
                                  <td><?=$i++ ?></td>
                                  <td><?=$d->nama_problem?></td>
                                  <td><?=$d->score?></td>
                                  <td><?=$d->retry?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <!-- End Default Table Example -->
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 d-flex">
                  <div class="card h-90 w-100">
                    <div class="card-body">
                      <h5 class="card-title">Hasil Formatif</h5>
                      <!-- Default Table -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Formatif</th>
                            <th scope="col">Skor</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                            foreach ($dataku3 as $d) :?> 
                              <tr>
                                  <td><?=$i++ ?></td>
                                  <td><?=$d->nama_formatif?></td>
                                  <td><?=$d->skor_total?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <!-- End Default Table Example -->
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 d-flex">
                  <div class="card h-90 w-100">
                    <div class="card-body">
                      <h5 class="card-title">Hasil Evaluasi</h5>
                      <!-- Default Table -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Evaluasi</th>
                            <th scope="col">Skor</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                            foreach ($dataku4 as $d) :?> 
                              <tr>
                                  <td><?=$i++ ?></td>
                                  <td><?=$d->nama_evaluasi?></td>
                                  <td><?=$d->skor_total?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <!-- End Default Table Example -->
                    </div>
                  </div>
                </div>
              </div>
                
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