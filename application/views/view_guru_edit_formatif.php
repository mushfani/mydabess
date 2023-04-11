<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Formatif </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url() ?>assets/img/data.png" rel="icon">
  <link href="<?php echo base_url() ?>assets/img/data.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <div class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url() ?>/assets/img/data.png" alt="">
                  <span class="d-none d-lg-block">Edit Test Formatif</span>
			</div>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Form Edit</h5>
                    <p class="text-center small">Masukkan Data Test Formatif yang Akan diedit!</p>
                  </div>

                    <?php if ($this->session->flashdata('ver') == 'FALSE') { ?>
                        <div class="alert alert-<?=$this->session->flashdata("class_alert");?> alert-dismissible" role="alert">
                            <?php echo $this->session->flashdata('alert'); ?>
                            <?php $this->session->set_flashdata('ver',"TRUE");?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <form method="post" action="<?php echo base_url(). 'guru/do_edit_formatif'; ?>">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                            </div>
                            <input type="hidden" name="id_formatif" id="id_formatif" value="<?=$this->uri->segment(3);?>">
                            <input type="text" class="form-control input_user" name="nama_formatif" id="nama_formatif" value="<?=$dataevaluasi->nama_formatif ?>" placeholder="nama formatif">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="button" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                  </div>
						
                  	</form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url() ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url() ?>assets/js/main.js"></script>

</body>

</html>