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
              <h5 class="card-title">Data Siswa <?= isset($datasiswa[0]->nama_akun) ? $datasiswa[0]->nama_akun : ''?> Hasil LKPD</h5>
              <p>Ini adalah daftar hasil skor LKPD siswa yang tersedia dalam pembelajaran anda</p>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th>Id</th>
                    <th scope="col">Soal </th>
                    <th scope="col">Jawaban </th>
                    <th scope="col">Skor</th>
                    <th scope="col">Ubah Skor</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($datasiswa as $d) :?> 
                    <tr>
                        <td><?=$i++ ?></td>
                        <td><?=$d->nis_nip?></td>
                        <td><?=$d->soal ?></td>
                        <td><?=$d->jawaban ?></td>
                        <td><?=$d->skor ?></td>
                        <td>
                          <a class="btn btn-warning" href="<?php echo base_url().'guru/edit_skor_lkpd/'. $d->id_soal.'/'.$d->nis_nip?>"> <i class="bx bx-edit-alt me-1"></i> </a>
                        </td>
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