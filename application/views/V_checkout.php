<!DOCTYPE html>
<html>
<head>
	<title>Checkout-Student Shop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
</head>
<body>
	<nav class="navbar-nav navbar-expand navbar-dark bg-dark p-2">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link btn btn-secondary font-weight-bold text-dark" href="<?php echo site_url('C_user/back2/'.$data['kd_barang']) ?>">Kembali</a>
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
	<div class="container" align="left">
		<?php echo form_open('C_user/proses_checkout/'.$data['kd_barang']) ?>
			<table class="table">
				<tr>
					<td>Nama : </td>
					<td><?php echo $data['nama_barang'] ?></td>
				</tr>
				<tr>
					<td>Harga : </td>
					<td>Rp. <?= number_format($data['harga'], 2, ',','.')?></td>
				</tr>
				<tr>
					<td>Qty : </td>
					<td>
						<input type="number" name="qty" value="1">
					</td>
				</tr>
				<tr>
					<td>Alamat : </td>
					<td>
						<textarea name="alamat"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" class="btn btn-success" value="Pesan">
					</td>
				</tr>
			</table>
		<?php form_close() ?>
	</div>

</body>
</html>