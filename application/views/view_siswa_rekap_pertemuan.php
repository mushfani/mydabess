<?php include 'master/header.php'; ?>
| Grafik Siswa </title><head>
<?php include 'master/navbar_siswa.php'; ?>
    <div class="pagetitle">
      <h1>Daftar Rekap Nilai Pertemuan Materi Anda</h1>
      
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
                <div class="col-sm-4 d-flex">
                  <div class="card h-90 w-100">
                    <div class="card-body">
                      <h5 class="card-title">Rekap Nilai Pembelajaran</h5>
                      <!-- Accordion without outline borders -->
                      <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                              Test Recall
                            </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                              <table style="font-size:12px">
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
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                              Test TP Formatif
                            </button>
                          </h2>
                          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                              <table style="font-size:12px">
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
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                              Test Problem Adaptive
                            </button>
                          </h2>
                          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">
                                <table style="font-size:12px">
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
                              </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingfour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                              Test Evaluasi
                            </button>
                          </h2>
                          <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">
                                <table style="font-size:12px">
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
                              </div>
                          </div>
                        </div>
                      </div><!-- End Accordion without outline borders -->
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