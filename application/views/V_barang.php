<!DOCTYPE html>
<html>
<head>
	<title>Barang-Student Shop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
	<nav class="navbar-nav navbar-expand navbar-dark bg-dark p-2">
		<ul class="navbar-nav">
			<li class="nav-item">
				<img width="40px" height="40px" class="align-top" src="<?php echo base_url('assets/image/ss.png') ?>">
				<h3 class="font-weight-bold text-light d-inline-block">Student Shop</h3>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a href="<?php echo site_url('C_utama/masukPenjual') ?>" class="nav-link btn btn-primary font-weight-bold text-dark">Masuk Penjual</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-2">
			<li class="nav-item">
				<a href="<?php echo site_url('C_user/tampilKeranjang/') ?>" class="nav-link btn btn-success font-weight-bold text-dark">Keranjang</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-2">
			<li class="nav-item">
				<a href="<?php echo site_url('C_user/tampilPesanan/') ?>" class="nav-link btn btn-warning font-weight-bold text-dark">Pesanan</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-2">
			<li class="nav-item">
				<a class="nav-link btn btn-danger font-weight-bold text-dark" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
			</li>
		</ul>
	</nav>
	<div class="container mt-2">
	<?php if(!empty($this->session->flashdata('status'))): ?>
	<div class="alert alert-warning">
		<?php echo $this->session->flashdata('status') ?>
	</div>
	<?php endif ?>
		<div>
			<?php echo form_open('C_user/cari/', ['class' => 'input-group']) ?>
				<input type="text" class="form-control" name="keyword" placeholder="Cari Barang">

				<div class="input-group-append ml-1">
					<input type="submit" class="btn btn-dark" value="Cari"><br><br>
				</div>
			<?php form_close() ?>
		</div>

		<?php foreach ($data as $d) { ?>	
			<div class="card" style="width: 17rem;padding: 25px; display: inline-block;">
				<img src="<?= base_url('assets/image/' .$d['image']) ?>" class="card-img-top" alt="...">
				<div class="card-body">
				    <h2><?php echo $d['nama_barang'] ?></h2><br>
				    <p>Rp.<?php echo number_format($d['harga'], 2, ',','.') ?>
				    <p>Stok	:	<?php echo $d['stok'] ?></p>
				 </div>
				  <a class="btn btn-primary" href="<?php echo site_url('C_user/detail_barang/'.$d['kd_barang']) ?>">Detail</a>
			</div>
		<?php } ?>
	</div>
</div>
</body>
</html>