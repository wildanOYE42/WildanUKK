     <?php date_default_timezone_set('Asia/Jakarta'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h3>Management Data Pengaduan</h3>

            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-warning">
                        <strong>Note : </strong> Jika anda menghapus data pengaduan maka data tanggapan dengan ID yang sama juga akan terhapus
                    </div>

                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="myTable">
                                <thead class="table-info">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Isi Pengaduan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($pengaduan as $p){ ?>
                                <strong>
                                    <tr>
                                        <td><?= date('d M Y H:i:s', $p->id_pengaduan); ?></td>
                                        <td><?= $p->isi_laporan; ?></td>
                                        <td><?php if($p->status == ('Proses')): ?>
                                                Proses
                                                <?php endif; ?>
                                                <?php if($p->status == ('Selesai')): ?>
                                                Selesai
                                                <?php endif; ?> 
                                                <?php if($p->status == ('Ditolak')): ?>
                                                Tolak
                                                <?php endif; ?>
                                                </td>
                                        <td>
                                            <a href="<?= base_url('pengaduan/del_pengaduan/') . $p->id_pengaduan; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></a>
                                            <a href="<?= base_url('pengaduan/detail/') . md5($p->id_pengaduan); ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i></a>
                                        </td>
                                    </tr>
                                    </strong>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>  
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->