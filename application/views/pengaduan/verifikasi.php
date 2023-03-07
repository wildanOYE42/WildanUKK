<?php date_default_timezone_set('Asia/Jakarta'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h3>Detail Laporan Pengaduan</h3>

          <div class="row mb-3">
            <div class="col-lg-6">
              <div class="card shadow">
                <img src="<?= base_url('asset/upload/') . $pengaduan->foto; ?>">
                <div class="card-body">
                  <hr>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card shadow">
                <div class="card-body">
                <i class="fa fa-user"> <?= $pengaduan->nama; ?></i>
                <hr>
                <h6 class="fa fa-book"> Isi Laporan</h6>
                <br>
                <i class=""><?= $pengaduan->isi_laporan; ?></i>
                  <hr>
                  <small>NIK : <?= $pengaduan->nik; ?></small>
                  <br>
                  <small class="text-muted"><?= date('D,d M Y H:i:s', $pengaduan->id_pengaduan); ?></small>
                  <hr>

                  <h6 class="text-center">Tanggapan</h6>
                  <hr>
                    <div class="alert alert-info text-center">Apakah pengaduan ini layak untuk diterima jika tidak ditolak.</div>
                  <hr>
                  <tbody>
                    <tr>
                        <?php if ($pengaduan->verifikasi == null) : ?>
                          <a href="<?= base_url('pengaduan/tolak_pengaduan/') . $pengaduan->id_pengaduan; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Tolak </a>
                          <a href="<?= base_url('pengaduan/terima_pengaduan/') . $pengaduan->id_pengaduan; ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right">Terima</i></a>
                        <?php else: ?>
                          <?php if ($pengaduan->verifikasi == "diterima") : ?>
                          <a href="<?= base_url('pengaduan')?>" class="badge badge-success badge-pill py-3 px-4">
                            Diterima
                          </a>
                        <?php else : ?>
                          <a href="<?= base_url('pengaduan')?>" class="badge badge-danger badge-pill py-3 px-4">
                            Ditolak
                          </a>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                </tbody>


                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->



