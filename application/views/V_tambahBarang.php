<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang-Student Shop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
	<nav class="navbar-nav navbar-expand navbar-dark bg-dark p-2">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link btn btn-secondary font-weight-bold text-dark" href="<?php echo site_url('C_utama/masukPenjual/') ?>">Kembali</a>
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
		<?php echo form_open_multipart('C_user/proses_tambahBarang/')?>
			<table class="table">
				<tr>
					<td>Nama Barang : </td>
					<td>
						<input class="form-control" type="text" name="nama_barang">
					</td>
				</tr>
				<tr>
					<td>Harga : </td>
					<td>
						<input class="form-control" type="number" name="harga">
					</td>
				</tr>
				<tr>
					<td>Stok : </td>
					<td>
						<input class="form-control" type="number" name="stok">
					</td>
				</tr>
				<tr>
					<td>Gambar : </td>
					<td>
 						<input type="file" name="image" />
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" class="btn btn-success" value="Tambah">
					</td>
				</tr>
			</table>
		<?php form_close() ?>
	</div>
</body>
</html>