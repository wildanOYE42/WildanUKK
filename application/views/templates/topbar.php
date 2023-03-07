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

                <!-- Notifications Dropdown Menu -->
                <?php if ($this->session->userdata('level')): ?>
            <li class="nav-item dropdown no-arrow mx-1">

            <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">
            <?= $this->db->get_where('pengaduan', ['status_notif' => 0])->num_rows(); ?>
          </span>
        </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  notifikasi
                </h6>
                <?php foreach ($notif as $n) { ?>
                  <?php if ($n->status_notif == 0): ?>
                    <a style="padding-right:40px;" id="status-btn" class="dropdown-item d-flex align-items-center"
                      href="<?= base_url('pengaduan/status_notif/') . md5($n->id_pengaduan); ?>">
                      <div class="mr-3">
                        <div class="icon-circle bg-primary">
                          <img src="<?= base_url('asset/upload/') . $n->foto; ?>" alt="" width="49" height="40"
                            class="d-inline-block align-text-top">

                        </div>
                      </div>
                      <div>
                        <div class="small text-gray-500">
                          <?= $n->tgl_pengaduan; ?>
                        </div>
                        <span class="font-weight-bold">
                          <?= $n->isi_laporan; ?>
                        </span>

                      </div>
                    </a>
                  <?php endif; ?>
                <?php }
                ?>
                <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('pengaduan') ?>">tampilkan
                  semua aduan</a>
              </div>
            </li>
          <?php endif; ?>
  <!-- /.navbar -->


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown toggle">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if (array_key_exists('level', $pengguna)) : ?>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $pengguna['nama_petugas']; ?></span>
                <?php else : ?>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $pengguna['nama']; ?></span>
                <?php endif; ?>
                <img src="<?= base_url('asset/img/user.png'); ?>" class="rounded-circle" height="35" alt="" loading="lazy" />
              </a>

              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if ($this->session->userdata('nik')) : ?>
                  <a class="dropdown-item" href="<?= base_url('user'); ?>">
                  <?php elseif ($this->session->userdata('level')) : ?>
                    <a class="dropdown-item" href="<?= base_url('admin'); ?>">
                    <?php endif; ?>
                    <?php if ($this->session->userdata('level')) : ?>
                      <a class="dropdown-item" href="<?= base_url('admin/edit'); ?>">
                      <?php elseif ($this->session->userdata('nik')) : ?>
                        <a class="dropdown-item" href="<?= base_url('user/edit'); ?>">
                        <?php endif; ?>
                        <i class="fas fa fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                        <span>Edit Profile</span></a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logout" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                        </a>
              </div>
            </li>
      </div>


      </li>
      </ul>

      </nav>
      <!-- End of Topbar -->