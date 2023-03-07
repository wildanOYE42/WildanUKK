      <?php date_default_timezone_set('Asia/Jakarta'); ?>

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Detail Laporan Pengaduan</h1>

        <div class="row mb-3">
          <div class="col-lg-6">
            <div class="card shadow">
              <img src="<?= base_url('asset/upload/') . $pengaduan->foto; ?>">
              <div class="card-body">
                <p><?= $pengaduan->isi_laporan; ?></p>
                <hr>
                <i class="fa fa-user"> <?= $pengaduan->nama; ?></i><br>
                <small>NIK : <?= $pengaduan->nik; ?></small><br>
                <small>Status : 
                <?php if ($pengaduan->status == "selesai") { ?>
                  Selesai
                <?php } else if ($pengaduan->status == "proses") { ?>
                  Proses
                <?php } else { ?>
                  Ditolak
                <?php } ?></small><br>
                <small class="text-muted"><?= date('D,d M Y H:i:s', $pengaduan->id_pengaduan); ?></small>
                <hr>
                <a  class="btn btn-success" href="<?= base_url('laporan'); ?>">Kembali</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card shadow">
              <div class="card-body">
                <h6 class="text-center">Tanggapan</h6>
                <hr>

                <?php if (empty($tanggapan)) : ?>
                  <div class="alert alert-info">Belum Ada Tanggapan</div>
                <?php endif; ?>

                <?php foreach ($tanggapan as $t) { ?>
                  <div class="card bg-light mb-3" style="padding : 7px;">
                    <i class="fa fa-user"> <?= $t->nama_petugas; ?></i><br>
                    <p style="margin-top: -17px;"><?= $t->tanggapan; ?></p>
                    <small class="text-muted"><?= date('D,d M Y H:i:s', $t->id_tanggapan); ?></small>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->