<!DOCTYPE html>
<html>
<head>
	<title>Penjual-Student Shop</title>
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
				<a class="nav-link btn btn-primary font-weight-bold text-dark" href="<?php echo site_url('C_user/tambah_barang') ?>">Tambah Barang</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-2">
			<li class="nav-item">
				<a class="nav-link btn btn-success font-weight-bold text-dark" href="<?php echo site_url('C_user/pesananBarang') ?>">Pesanan</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-2">
			<li class="nav-item">
				<a class="nav-link btn btn-warning font-weight-bold text-dark" href="<?php echo site_url('C_utama/beliBarang') ?>">Beli Barang</a>
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
	<?php foreach ($data as $d) { ?>	
			<div class="card" style="width: 17rem;padding: 25px; display: inline-block;">
				<img src="<?= base_url('assets/image/' .$d['image']) ?>" class="card-img-top" alt="...">
				<div class="card-body">
				    <h2><?php echo $d['nama_barang'] ?></h2><br>
				    <p>Rp.<?php echo number_format($d['harga'], 2, ',','.') ?>
				    <p>Stok	:	<?php echo $d['stok'] ?></p>
				 </div>
				 <div align="center">
				  <a class="btn btn-primary" href="<?php echo site_url('C_user/edit_barang/'.$d['kd_barang']) ?>">Edit</a>
				  <a class="btn btn-danger" href="<?php echo site_url('C_user/hapus_barang/'.$d['kd_barang']) ?>">Hapus</a>
				  </div>
			</div>
		<?php } ?>
</body>
</html>