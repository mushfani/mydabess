<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Page Register </title>
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
                  <span class="d-none d-lg-block">MyDabess</span>
			          </div>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                    <p class="text-center small">Masukkan Data Personal Anda!</p>
                  </div>

                  <?php if ($this->session->flashdata('ver') == 'FALSE') { ?>
                    <div class="alert alert-<?=$this->session->flashdata("class_alert");?> alert-dismissible" role="alert">
                        <?php echo $this->session->flashdata('alert'); ?>
                        <?php $this->session->set_flashdata('ver',"TRUE");?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php } ?>

                  <form method="post" action="<?php echo base_url(); ?>register/proses" enctype="multipart/form-data">
                    
                    <div class="col-12">
                      <label for="yourName" class="form-label">NIS/NIP</label>
                      <input type="text" name="nis_nip" id="nis_nip" class="form-control"  required>
                      <div class="invalid-feedback">Masukkan NIS/NIP kamu!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama_akun" id="nama_akun" class="form-control"  required>
                      <div class="invalid-feedback">Masukkan Nama Lengkap kamu!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <input type="password" name="password" id="password" class="form-control"  required>
                        <div class="invalid-feedback">Masukkan Password kamu!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Ulangi Password</label>
                      <div class="input-group has-validation">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <div class="invalid-feedback">Masukkan Password kamu!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Kelas</label>
                      <input type="text" name="kelas" id="kelas"class="form-control" required>
                      <div class="invalid-feedback">Masukkan Kelas kamu!</div>
                    </div>

                    <div class="col-12">
                      <label for="role" class="form-label">Role</label>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="id_role" id="id_role" value="1"> Guru
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="id_role" id="id_role" value="2"> Siswa
                        </label>
                      </div>
                    </div>

                    <div class="col-12">
                      <label class="custom-file-label" for="customFile">Foto Profil</label>
                      <div class="custom-file">
                        <input type="file" name="foto_profil" class="custom-file-input" id="customFile" size="20" >
                      </div>
                      <script>
                      // Add the following code if you want the name of the file appear on select
                      $(".custom-file-input").on("change", function() {
                      var fileName = $(this).val().split("\\").pop();
                      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                      });
                      </script>
                    </div>
                      
                    <div class="col-12">
                      <button type="submit" name="button" class="btn btn-primary w-100">Register</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Punya akun? <a href="<?php echo base_url() ?>login/index">Log in</a></p>
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