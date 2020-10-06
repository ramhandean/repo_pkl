<!DOCTYPE html>
<html>
<head>
	<title>Barang-Student Shop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
</head>
<body>
	<nav class="navbar-nav navbar-expand navbar-dark bg-dark p-2">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link btn btn-secondary font-weight-bold text-dark" href="<?php echo site_url('C_user/back/') ?>">Kembali</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<h3 class="font-weight-bold text-light">Student Shop</h3>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link btn btn-danger font-weight-bold text-dark" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
			</li>
		</ul>
	</nav>
	<div class="container">
		<div class="row justify-content-center" align="center">
			<div class="col-8" align="center">
				<img src="<?= base_url('assets/image/' .$data['image']) ?>">
				<div>
					<span><?= $data['nama_barang'] ?></span><br>
					<span>Rp. <?= number_format($data['harga'], 2, ',','.')?></span><br>
					<span>Penjual : <?= $data['nama_penjual'] ?></span>
					<?php echo form_open('C_user/masukKeranjang/'.$data['kd_barang']) ?>
					Qty :
						<input type="number" name="qty" value="1"><br><br>
					<div>
						<input type="submit" class="btn btn-warning" value="Masuk Keranjang">
					<?php form_close() ?>
						<a href="<?php echo site_url('C_user/checkout/'.$data['kd_barang']) ?>" class="btn btn-success">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>