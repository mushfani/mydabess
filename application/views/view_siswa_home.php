<?php include 'master/header.php'; ?>
 | Home Siswa  </title><head>
<?php include 'master/navbar_siswa.php'; ?>

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-8">
          <div class="row match-height">
            <!-- Reports -->
            <div class="col-6 d-flex">
              <div class="card h-90 w-100" >
                <div class="card-body" >
                  <h5 class="card-title">Aktivitas <span>| Progress</span></h5>
                  <div class="d-flex align-items-center" style="font-size:12px">
                    <table style="font-size:12px">
                      <thead>
                        <tr style= "w-12">
                          <th scope="col w-2" style= "w-2">#</th>
                          <th scope="col w-5" style= "w-2">Materi LKPD</th>
                          <th scope="col w-5" style= "w-2">Status </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($datamaterijoin as $d) :?> 
                          <tr style= "w-12">
                              <td><?=$i++ ?></td>
                              <td>
                                <?php if ($d->total_jawaban_siswa > 0): ?>
                                  <?=$d->judul ?>
                                <?php else: ?>
                                  <?=$d->judul ?></a>
                                <?php endif; ?>
                              </td> 
                              <td>
                                <?php if ($d->total_jawaban_siswa > 0): ?>
                                  <span class="badge border-success border-1 text-success">Sudah Menjawab</span>
                                  
                                <?php else: ?>
                                  <span class="badge border-danger border-1 text-danger">Belum Menjawab</span>
                                  
                                <?php endif; ?>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 d-flex">
              <div class="card h-90 w-100" >
                <div class="card-body" >
                  <h5 class="card-title">Problem <span>| Progress</span></h5>
                  <div class="d-flex align-items-center" style="font-size:12px">
                    <table >
                      <thead>
                        <tr>
                          <th scope="col">#</th><th></th>
                          <th scope="col">Materi</th><th></th>
                          <th scope="col">Waktu</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($dataproblemjoin as $d) :?> 
                          <tr>
                              <td><?=$i++ ?></td><td></td>
                              <td><?=$d->judul ?></td><td></td>
                              <td><?=$d->real_time ?> Menit </td><td></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Rekap <span>| Nilai <?php echo $this->session->userdata('nama_akun')?></span></h5>
                  <!-- Accordion without outline borders -->
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item" >
                      <h2 class="accordion-header" id="flush-headingOne" >
                        <button style="font-size:12px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Test Recall
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="font-size:12px">
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
                                foreach ($data as $d) :?> 
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
                        <button style="font-size:12px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
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
                                foreach ($data3 as $d) :?> 
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
                        <button style="font-size:12px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
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
                                  foreach ($data2 as $d) :?> 
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
                        <button style="font-size:12px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
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
                                  foreach ($data4 as $d) :?> 
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
            <div class="col-12">
                <div class="card">
                  <div class="card-body" style="font-size:12px"  >
                    <h5 class="card-title">Grafik <span>| Pembelajaran</span></h5>
                    <!-- Line Chart -->
                      <div id="reportsChart"></div>

              <script style="font-size:12px">

                const chartData = <?php echo json_encode($chart_data); ?>;
                const categories = chartData.map(item => item[0]);
                const recallSeries = chartData.map(item => item[1]);
                const evaluasiSeries = chartData.map(item => item[2]);
                const formatifSeries = chartData.map(item => item[3]);
                document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#reportsChart"), {
                series: [{
                            name: 'Recall',
                            data: recallSeries
                        },
                        {
                            name: 'Evaluasi',
                            data: evaluasiSeries
                        },
                        {
                            name: 'Formatif',
                            data: formatifSeries
                        }],
                          chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                              show: false
                            },
                          },
                          markers: {
                            size: 4
                          },
                          colors: ['#4154f1', '#2eca6a', '#ff771d'],
                          fill: {
                            type: "gradient",
                            gradient: {
                              shadeIntensity: 1,
                              opacityFrom: 0.3,
                              opacityTo: 0.4,
                              stops: [0, 90, 100]
                            }
                          },
                          dataLabels: {
                            enabled: false
                          },
                          stroke: {
                            curve: 'smooth',
                            width: 2
                          },
                          xaxis: {
                              categories: categories
                          },
                          tooltip: {
                            x: {
                              format: 'dd/MM/yy HH:mm'
                            },
                          }
                        }).render();
                      });
                    </script>
              <!-- End Line Chart -->

                  </div>

                </div>
              </div><!-- End Reports -->
            
          </div>
        </div>
        <div class="col-lg-4 ">
          <div class="card">
              <div class="card-body pb-0">
              </div>
              <div class="card-body pb-0" >
                <h5 class="card-title">Top Score Recall <span> | Kelas 11</span></h5>            
                <div class="news">
                  <div class="post-item clearfix">
                    <!-- Default Table -->
                    <table class="table" style="font-size:12px">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Test</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Skor</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                            foreach ($dataku as $d) :?> 
                              <tr>
                                  <td><?=$i++ ?></td>
                                  <td><?=$d->nama_recall?></td>
                                  <td><?=$d->nama_akun?></td>
                                  <td><?=$d->skor_total?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    <!-- End Default Table Example -->
                  </div>
                </div><!-- End sidebar recent posts-->
              </div>
              <div class="card-body pb-0">
                <h5 class="card-title">Top Score Formatif <span> | Kelas 11</span></h5>            
                <div class="news">
                  <div class="post-item clearfix">
                    <table class="table" style="font-size:12px">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Test</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Skor</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                            foreach ($dataku2 as $d) :?> 
                              <tr>
                                  <td><?=$i++ ?></td>
                                  <td><?=$d->nama_formatif?></td>
                                  <td><?=$d->nama_akun?></td>
                                  <td><?=$d->skor_total?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                  </div>
                </div><!-- End sidebar recent posts-->
              </div>
              <div class="card-body pb-0">
                <h5 class="card-title">Top Score Evaluasi<span> | Kelas 11</span></h5>            
                <div class="news">
                  <div class="post-item clearfix">
                    <table class="table" style="font-size:12px">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Test</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Skor</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                            foreach ($dataku3 as $d) :?> 
                              <tr>
                                  <td><?=$i++ ?></td>
                                  <td><?=$d->nama_evaluasi?></td>
                                  <td><?=$d->nama_akun?></td>
                                  <td><?=$d->skor_total?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                  </div>
                </div><!-- End sidebar recent posts-->
              </div>
          </div><!-- End News & Updates -->
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