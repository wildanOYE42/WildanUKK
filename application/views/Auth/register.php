<!doctype html>
<html lang="en">
  <head>
  	<title>REGISTER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?= base_url('asset/register/') ?>css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(<?= base_url('asset/register/') ?>images/ba.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Aplikasi Pengaduan Masyarakat</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">REGISTER</h3>

				  <?php if ($this->session->flashdata('false')) : ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= $this->session->flashdata('false'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php endif; ?>




		      	<form action="<?= base_url('auth/register'); ?>" method="post">
				  <div class="form-group">
						<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
						<input type="text" name="nik" class="form-control" placeholder="NIK" id="form" autocomplete="off" value="<?= set_value('nik'); ?>">
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
							<input type="text" name="nama" class="form-control" placeholder="Nama" id="form" autocomplete="off" value="<?= set_value('nama'); ?>">
						</div>

						<div class="form-group col-sm-6">
							<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
							<input type="text" name="username" class="form-control" placeholder="Username" id="form" autocomplete="off" value="<?= set_value('username'); ?>">
						</div>
					</div>

					<div class="form-group">
								<?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
								<input type="text" name="telp" class="form-control" placeholder="No Telp" id="form" autocomplete="off" value="<?= set_value('telp'); ?>">
							</div>

					<div class="row">
						<div class="form-group col-sm-6">
							<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							<input type="password" name="password" class="form-control" placeholder="Password" id="form" autocomplete="off">
						</div>

						<div class="form-group col-sm-6">
							<?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
							<input type="password" name="repassword" class="form-control" placeholder="Ulangi Password" id="form" autocomplete="off">
						</div>
					</div>

	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
					<a href="<?= base_url('auth') ?>"><center>login</center></a>
	            </div>
	           
	           
	          </form>

	         
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?= base_url('asset/register/') ?>js/jquery.min.js"></script>
  <script src="<?= base_url('asset/register/') ?>js/popper.js"></script>
  <script src="<?= base_url('asset/register/') ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('asset/register/') ?>js/main.js"></script>

	</body>
</html>

