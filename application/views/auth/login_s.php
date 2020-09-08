<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" href="<?= base_url('assets/img/logo_yayasan.png') ?>">
  		<title>Login Admin Yayasan Ponpes Nurul Madinah</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="<?= base_url('assets/') ?>fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
	</head>

	<body>
		<div class="wrapper" style="background-color: #0099cc;">
			<!-- <?= $this->session->flashdata('message') ?> -->
			<div class="inner">
				<div class="image-holder">
					<img style="height: 400px" src="<?= base_url('assets/img/'.$info[0]['profil'].'') ?>" alt="">
				</div>
				<form action="" method="post">
					
					<h1>
					<img align="center" style="width: 50px" src="<?= base_url('assets/img/logo_yayasan.png') ?>" >
					Login Siswa</h1>

					<h4 align="center">Yayasan Ponpes Nurul Madinah</h4><br><br>
					<div class="form-wrapper">
						<input type="text" placeholder="NIS" class="form-control" name="nis">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="password">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button type="submit">Login
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<br>
					<div class="alert alert-danger">
					  <center><strong><h4 style="color: red">Perhatian !!</h4></strong></center>
                	<p><?= $info[0]["alert"] ?></p>
					</div>
				</form>

			</div>
		</div>

		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>