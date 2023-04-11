<?php include 'master/header.php'; ?>
 | Materi Guru </title><head>
<?php include 'master/navbar_guru.php'; ?>

    <div class="pagetitle">
      <h1>Daftar Materi</h1>
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
              <h5 class="card-title">Materi</h5>
              <p>Ini adalah daftar materi yang tersedia dalam pembelajaran anda</p>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addMateri">
                Tambah Materi
              </button>
              <?php if ($this->session->flashdata('ver') == 'FALSE') { ?>
                <div class="alert alert-<?=$this->session->flashdata("class_alert");?> alert-dismissible" role="alert">
                    <?php echo $this->session->flashdata('alert'); ?>
                    <?php $this->session->set_flashdata('ver',"TRUE");?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?>
              <div class="modal fade" id="addMateri" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Materi</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="<?php echo base_url(). 'guru/tambah_materi'; ?>">
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="kode_materi" id="kode_materi" placeholder="kode materi">
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Mapel</label>
                          <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="kode_mapel">
                              <option selected>Mata Pelajaran</option>
                              <?php
                              foreach ($datamapel as $d) :?>
                              <option value="<?=$d->kode_mapel ?>"><?=$d->nama_mapel ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="judul" id="judul" placeholder="nama materi">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="sub_judul" id="sub_judul" placeholder="sub materi">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="deskripsi" id="deskripsi" placeholder="deskripsi">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="video_apersepsi" id="video_apersepsi" placeholder="video_apersepsi">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="video_materi" id="video_materi" placeholder="video_materi">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-ad"></i></span>
                          </div>
                          <input type="text" class="form-control input_user" name="modul_materi"id="modul_materi" placeholder="modul_materi">
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
                    <th scope="col">Materi</th>
                    <th scope="col">Sub Materi</th>
                    <th scope="col">Video Materi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($datamateri as $d) :?> 
                    <tr>
                        <td><?=$i++ ?></td>
                        <td><a href="<?php echo base_url(). 'guru/detail_materi/'.$d->kode_materi ?>" ><?=$d->judul ?></a></td>
                        <td><?=$d->sub_judul ?></td>
                        <?php if ($d->video_materi == null || $d->video_materi == ""):?>
                        <td></td>
                        <?php else:?>
                        <td><iframe src="https://www.youtube.com/embed/<?= $d->video_materi ?>" frameborder="0" allowfullscreen></iframe> </td>
                        <?php endif;?>
                          <td>
                          <a class="btn btn-warning" href="<?php echo base_url().'guru/edit_materi/'. $d->kode_materi?>"> <i class="bx bx-edit-alt me-1"></i> </a>
                          <a class="btn btn-danger" href="<?php echo base_url().'guru/delete_materi/'. $d->kode_materi?>"> <i class="bx bx-trash me-1"></i> </a>
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