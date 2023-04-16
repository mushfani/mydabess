<?php include 'master/header.php'; ?>
 | Profil Pengembang </title><head>
<?php include 'master/navbar_siswa.php'; ?>

    <div class="pagetitle">
      <h1>Profil Pengembang</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <main>
        <section class="section profile">
            <div class="row">
                <div class="col-6 d-flex">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="<?= base_url(); ?>/assets/img/cinta.png" alt="Profile" class="rounded-circle">
                            <h2> Mushfani Ainul Urwah</h2>
                            <h3> Computer Science Of Education UPI </h3>
                            <div class="social-links mt-2">
                                <a href=" https://twitter.com/loveilovemetoo" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href=" https://instagram.com/loveilovemetoo"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex">
                  <div class="card">
                    <div class="card-body " >
                      <h5 class="card-title">Data <span>| Pengembang</span></h5>
                      <div class="d-flex align-items-center">
                        <div class="ps-3" style="font-size:12px">
                            Hello I am a computer science of education student with an interest 
                            in the arts of writing, design,  creative fields, and education. 
                            I am a temporary work in elementary school and sometimes write for fun fiction 
                            stories and aspire to be a educator, creator, operator, or content writer in industry.
                            So if you want to know more about me or want to ask me just visit me on my social media!
                        </div>
                    </div>
                  </div>
                  </div>
                </div>
            </div>
        </section>
    </main>

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