

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('pengguna/');?>">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Pengguna <sup>:)</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">




    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('pengguna/');?>">
        <i class="fas fa-fw fa-search"></i>
        <span>Cari Data</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pengguna/tambahRekamMedis') ?>">
          <i class="fas fa-fw fa-plus-square"></i>
          <span>Tambahkan Data</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>



            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>




              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $pengguna['nama']; ?></span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
           <div class="form-row">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tambah Rekam Medis</h1>

            <?= $this->session->flashdata('pesan_registrasi'); ?>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <form method="post" action="<?= base_url('pengguna/tambahRekamMedis'); ?>">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label>Nomor Rekam Medis</label>
                    <input type="number" class="form-control " id="nomorrm" name="nomorrm" value="<?= set_value('nomorrm') ?>">
                    <?= form_error('nomorrm', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Nomor KTP</label>
                    <input type="text" class="form-control" id="nomorktp" name="nomorktp" value="<?= set_value('nomorktp') ?>">
                    <?= form_error('nomorktp', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nama</label>
                    <input type="text" style="text-transform: uppercase;"  class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Alamat</label>
                    <input type="text" style="text-transform: uppercase;" class="form-control" name="alamat" id="inputAddress" value="<?= set_value('alamat') ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>

                  </div>
                  <div class="form-group col-md-6">
                    <label>Pekerjaan</label>
                    <input type="text" style="text-transform: uppercase;" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?= set_value('pekerjaan') ?>">
                    <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>

                  </div>
                </div>
                

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Kabupaten / Kota</label>
                    <select id="kabupaten" style="text-transform: uppercase" class="form-control" name="kabupaten" required>
                      <option selected>Pilih Kabupaten Kota...</option>
                      <?php
                      foreach($lokasi_kabupaten as $data):?>
                        <option value="<?= $data['lokasi_ID'] ?>"><?= $data['lokasi_nama'] ?></option>";
                        
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('kabupaten', '<small class="text-danger pl-3">', '</small>'); ?>

                  </div>
                  <div class="form-group col-md-6">
                    <label>Kecamatan</label>
                   <!--  <select id="kecamatan" class="form-control" name="kecamatan" required>
                      <option selected>Pilih Kecamatan</option>
                      <option>...</option>
                    </select> -->
                    <input type="text" style="text-transform: uppercase" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" value="<?= set_value('kecamatan') ?>">
                    <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>

                  </div>

                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Kelurahan</label>
                    <!-- <select id="kelurahan" class="form-control" name="kelurahan" required>
                      <option selected>Pilih Kelurahan</option>
                      <option>...</option>
                    </select> -->
                    <input type="text" style="text-transform: uppercase" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan" value="<?= set_value('kelurahan') ?>">
                    <?= form_error('kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>

                  </div>
                  <div class="form-group col-md-6">
                    <label>Dusun</label>
                    <input type="text" style="text-transform: uppercase" class="form-control" id="dusun" name="dusun" placeholder="Dusun" value="<?= set_value('dusun') ?>">
                    <?= form_error('dusun', '<small class="text-danger pl-3">', '</small>'); ?>

                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambahkan</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Rekam Medis Kolbu 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Keluar??</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" di bawah jika anda ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>


