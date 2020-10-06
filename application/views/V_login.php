<!DOCTYPE html>
<html>
<head>
	<title>Student Shop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body class="bg-dark text-white">
	<div class="container-fluid">
		<div class="row" style="margin-top: 50px;">
			<div class="offset-md-5 col-md-5">
				<img width="170px" height="170px" src="<?php echo base_url("assets/image/ss.png") ?>">
				<br><br>
			</div>
			<div class="offset-md-4 col-md-4">
				<h3>Login</h3>
				<br>
				<form action="<?php echo site_url('C_utama/aksi_login') ?>" method="post">
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" type="text" name="username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" type="password" name="password">
					</div>
					<input class="mt-3 btn btn-warning px-5 font-weight-bold" type="submit" value="Login">
					<?php 
					if (!empty($this->session->flashdata('error'))): ?>
					<script>alert("Username atau Password Salah!!!");</script>
					<?php endif  ?>
				</form>

			</div>
		</div>
	</div>
</body>
</html>