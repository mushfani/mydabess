<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <div class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">MYDabess</span>
      </div>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= base_url().'foto/'.$this->session->userdata('foto_profil')?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $this->session->userdata('nama_akun')?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $this->session->userdata('nama_akun')?></h6>
              <span><?php echo $this->session->userdata('kelas')?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url() ?>login/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>guru/index">
          <i class="bi bi-grid"></i>
          <span>Panduan</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Pertemuan Pembelajaran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url() ?>guru/mata_pelajaran" >
              <i class="bi bi-circle"></i><span>Mata Pelajaran</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>guru/recall">
              <i class="bi bi-circle"></i><span>Recall Quiz</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>guru/materi">
              <i class="bi bi-circle"></i><span>Materi</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>guru/lkpd">
              <i class="bi bi-circle"></i><span>LKPD</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>guru/formatif">
              <i class="bi bi-circle"></i><span>Task TP Formatif</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>guru/evaluasi">
              <i class="bi bi-circle"></i><span>Evaluasi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Rekap Pembelajaran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url() ?>guru/getAll_hasil_recall" >
              <i class="bi bi-circle"></i><span>Hasil Recall Quiz</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>guru/getAll_hasil_problem">
              <i class="bi bi-circle"></i><span>Hasil Problem</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>guru/getAll_hasil_lkpd">
              <i class="bi bi-circle"></i><span>Hasil LKPD</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>guru/getAll_hasil_formatif">
              <i class="bi bi-circle"></i><span>Hasil Task TP Formatif</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>guru/getAll_hasil_evaluasi">
              <i class="bi bi-circle"></i><span>Hasil Evaluasi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Dashboard Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">