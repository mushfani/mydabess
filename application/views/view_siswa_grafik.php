<?php include 'master/header.php'; ?>
| Grafik Siswa </title><head>
<?php include 'master/navbar_siswa.php'; ?>

    <div class="pagetitle">
      <h1>Daftar Grafik Progress Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
      <?php print("<pre>".print_r($chart_data,true)."</pre>");?>
    </div><!-- End Page Title -->
  <main>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
              <h5 class="card-title">Grafik Pembelajaran</h5>
              <p>Ini adalah daftar rekap grafik yang telah anda selesaikan</p>
            
              <?php if ($this->session->flashdata('ver') == 'FALSE') { ?>
                <div class="alert alert-<?=$this->session->flashdata("class_alert");?> alert-dismissible" role="alert">
                    <?php echo $this->session->flashdata('alert'); ?>
                    <?php $this->session->set_flashdata('ver',"TRUE");?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?>

              <!-- Reports -->
              <div class="col-12">
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
                  chart_data.categories.push(data[i].[0]);
                  chart_data.evaluasi_scores.push(parseFloat(data[i].[1]));
                  chart_data.recall_scores.push(parseFloat(data[i].[0]));
                  // chart_data.formatif_scores.push(parseFloat(data[i].formatif_score));
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