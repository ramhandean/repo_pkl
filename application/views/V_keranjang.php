<!DOCTYPE html>
<html>
<head>
	<title>Keranjang-Student Shop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
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

	<div class="container mt-2">	
		<?php if(!empty($this->session->flashdata('status'))): ?>
		<div class="alert alert-warning">
			<?php echo $this->session->flashdata('status') ?>
		</div>
		<?php endif ?>

		<table class="table">
			<thead>
				<tr align="center">
					<th>No</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 1;
				foreach ($data as $d): ?>
					<tr align="center">
						<td><?php echo $i ?></td>
						<td><?php echo $d['nama_barang'] ?></td>
						<td><?php echo $d['jumlah'] ?></td>
						<td><?php echo $d['total_harga'] ?></td>
						<td>
							<a href="<?php echo site_url('C_user/checkoutKeranjang/'.$d['kd_barang']) ?>" class="btn btn-success">Checkout</a> || 
							<a href="<?php echo site_url('C_user/hapusKeranjang/'.$d['id_transaksi']) ?>" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
				<?php
				$i = $i+1;
				endforeach ?>
			</tbody>
		</table>
		<a href="<?php echo site_url('C_user/checkoutAll/') ?>" class="btn btn-primary">Checkout All</a>
	</div>
</div>
</body>
</html>