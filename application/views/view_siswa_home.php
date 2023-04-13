<?php include 'master/header.php'; ?>
 | Home Siswa  </title><head>
<?php include 'master/navbar_siswa.php'; ?>

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-8">
          <div class="row match-height">
            <div class="col-lg-6 d-flex">
              <div class="card h-90" >
                  <div class="card-body" >
                    <h5 class="card-title">Panduan <span>| Logical Thinking & Basis Data</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="ps-3">
                            1. Klik menu <b> Test Logical Thinking atau Evaluasi Basis Data </b><br>
                            2. Pilih menu <b> Pretest atau Posttest </b><br>
                            3. Baca soal dengan teliti <br>
                            4. Selamat mengerjakan test!
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex">
              <div class="card h-90 " >
                  <div class="card-body" >
                  <h5 class="card-title">Panduan <span>| Recall, Formatif, dan Evaluasi</span></h5>
                      <div class="d-flex align-items-center">
                          <div class="ps-3">
                              1. Klik menu <b> Pembelajaran </b><br>
                              2. Klik menu <b> Recall Quiz, Formatif, dan Evaluasi</b><br>
                              3. Daftar test akan ditampilkan pada tabel <br>
                              4. Klik nama mata pelajaran <br>
                              5. Daftar soal akan tampil untuk setiap pertemuan pembelajaran <br>
                              6. Kerjakan soal dengan teliti dan klik tombol submit jika sudah selesai
                          </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex">
              <div class="card h-90" >
                  <div class="card-body" >
                    <h5 class="card-title">Panduan <span>| Materi</span></h5>
                      <div class="d-flex align-items-center">
                          <div class="ps-3">
                              1. Klik menu <b> Pembelajaran </b><br>
                              2. Klik menu <b> Materi</b><br>
                              3. Daftar materi akan ditampilkan pada tabel <br>
                              4. Klik nama mata pelajaran <br>
                              5. Klik judul materi yang akan dipelajari <br>
                              6. Daftar detail seluruh materi akan tampil
                          </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex">
              <div class="card h-90" >
                  <div class="card-body" >
                    <h5 class="card-title">Panduan <span>| LKPD</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="ps-3">
                            1. Klik menu <b> Pembelajaran </b><br>
                            2. Klik menu <b> LKPD</b><br>
                            3. Daftar LKPD materi akan ditampilkan pada tabel <br>
                            4. Klik nama mata pelajaran <br>
                            5. Selanjutnya akan tampil daftar soal LKPD untuk setiap pertemuan pembelajaran <br>
                            6. Kerjakan soal dengan teliti dan klik tombol submit jika sudah selesai.
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title">Top Score Recall <span>| kelas 11</span></h5>            
                <div class="news">
                  <div class="post-item clearfix">
                    <img src="assets/img/news-1.jpg" alt="">
                    <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                    <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                  </div>
                </div><!-- End sidebar recent posts-->
              </div>
              <div class="card-body pb-0">
                <h5 class="card-title">Top Score Formatif <span>| kelas 11</span></h5>            
                <div class="news">
                  <div class="post-item clearfix">
                    <img src="assets/img/news-1.jpg" alt="">
                    <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                    <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                  </div>
                </div><!-- End sidebar recent posts-->
              </div>
              <div class="card-body pb-0">
                <h5 class="card-title">Top Score Evaluasi<span>| kelas 11</span></h5>            
                <div class="news">
                  <div class="post-item clearfix">
                    <img src="assets/img/news-1.jpg" alt="">
                    <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                    <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                  </div>
                </div><!-- End sidebar recent posts-->
              </div>
          </div><!-- End News & Updates -->
        </div>
      </div>

      <div class="row">
         <!-- Reports -->
         <div class="col-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Reports <span>/Rekap Pembelajaran</span></h5>

              <!-- Line Chart -->
              <div id="reportsChart"></div>

                <script>
                  var data = <?php echo json_encode($chart_data); ?>;
                  
                  var chart_data = {
                    categories: [],
                    evaluasi_scores: [],
                    recall_scores: [],
                    formatif_scores: []
                  };

                  for (var i = 0; i < data.length; i++) {
                    chart_data.categories.push(data[i].nama_akun);
                    chart_data.evaluasi_scores.push(parseFloat(data[i].evaluasi_score));
                    chart_data.recall_scores.push(parseFloat(data[i].recall_score));
                    chart_data.formatif_scores.push(parseFloat(data[i].formatif_score));
                  }

                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Evaluasi Score',
                        data: chart_data.evaluasi_scores
                      }, {
                        name: 'Recall Score',
                        data: chart_data.recall_scores
                      }, {
                        name: 'Formatif Score',
                        data: chart_data.formatif_scores
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
                        categories: chart_data.categories
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
        
        <div class="col-lg-4">
          <iframe src="https://drive.google.com/file/d/1osSsePoLnQDJO6rjkwf30g-5AAJ8uUnl/preview" width="300" height="500" allow="autoplay"></iframe>
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