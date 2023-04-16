<?php include 'master/header.php'; ?>
 | Mapel Siswa  </title><head>
<?php include 'master/navbar_siswa.php'; ?>

<div class="pagetitle">
      <h1>Daftar Mata Pelajaran</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
              <?php if ($this->session->flashdata('ver') == 'FALSE') { ?>
                <div class="alert alert-<?=$this->session->flashdata("class_alert");?> alert-dismissible" role="alert">
                    <?php echo $this->session->flashdata('alert'); ?>
                    <?php $this->session->set_flashdata('ver',"TRUE");?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?>
              <h5 class="card-title">Mata pelajaran</h5>
              <p>Ini adalah daftar mata pelajaran yang telah anda tambahkan</p>
              <!-- Basic Modal -->
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addMapel">
                Tambah Mapel
              </button>
              <div class="modal fade" id="addMapel" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Mapel</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="<?php echo base_url(). 'siswa/enrollMapel'; ?>">
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="kode_mapel" id="kode_mapel" placeholder="kode mapel">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="button" class="btn btn-primary">Tambah</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mata Pelajaran</th>
                    <th scope="col">Created</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Kelas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($data as $d) :?>
                    <tr>
                        <td><?=$i++ ?></td>
                        <td><a href="<?php echo base_url(). 'siswa/materi/'.$d->kode_mapel ?>"> <?=$d->nama_mapel ?></td>
                        <td><?=$d->created_at ?></td>
                        <td><?=$d->kode_mapel ?></td>
                        <td><?=$d->kelas ?></td>
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