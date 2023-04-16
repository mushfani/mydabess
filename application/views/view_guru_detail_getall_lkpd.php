<?php include 'master/header.php'; ?>
 | Cek Data LKPD Detail Guru </title><head>
<?php include 'master/navbar_guru.php'; ?>

    <div class="pagetitle">
    <h1>Daftar Soal <?= $dataevaluasi->nama_lkpd?> </h1>
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
              <h5 class="card-title">Data Siswa Hasil LKPD</h5>
              <p>Ini adalah daftar hasil skor LKPD siswa yang tersedia dalam pembelajaran anda</p>
              <!-- Table with stripped rows -->
              <table class="table datatable" >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIS </th>
                    <th scope="col">Nama Siswa </th>
                    <th scope="col">Jawaban </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($datasiswa as $d) :?>
                    <tr>
                        <td><?=$i++ ?></td>
                        <td><?=$d->nis_nip ?></td>
                        <td><?=$d->nama_akun ?></td>
                        <td><a href="<?php echo base_url(). 'guru/data_siswa_lkpd/'.$d->id_lkpd.'/'.$d->nis_nip ?>" > Cek Jawaban</td>
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