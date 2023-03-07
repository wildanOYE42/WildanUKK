<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Edit Laporan</h1>
  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>') ?>
  <?= $this->session->flashdata('msg'); ?>

  <div class="row">
    <div class="col-lg-6">
      <?= form_open_multipart('laporan/'.$id_pengaduan['id_pengaduan']); ?>
      <div class="form-group">
        <label for="isi_laporan">Isi Laporan</label>
        <input type="text" class="form-control" name="isi_laporan" id="isi_laporan" value="<?= $pengaduan['isi_laporan'] ?>">
      </div>

      <div class="form-group">
        <label for="foto">Upload Foto</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="foto" name="foto">
          <label class="custom-file-label" for="foto">Choose file</label>
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-primary" href="<?= base_url('laporan'); ?>">Kembali</button>
      </div>
      <?php form_close(); ?>
      
    </div>
  </div>

  </div>
  <!-- /.container-fluid -->
