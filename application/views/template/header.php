<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Langsung Enak | .... </title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url('assets/css/button.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet">
	<!--pop-up-box-->
	<link href="<?php echo base_url('assets/css/popuo-box.css')?>" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui1.css')?>">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.html">
						<span>L</span>angsung
						<span>E</span>nak
						<img src="<?php echo base_url('assets/images/logo2.png')?>" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<br>
			<div class="col-md-8 header">
				<!-- header lists -->
				<?php if($this->session->userdata('email')==NULL) { ?>
					<ul>
					<li>
						<a class="nav-stylehead" href="index.html">Home</a>
					</li>
					<li class="">
						<a class="nav-stylehead" href="about.html">Katalog</a>
					</li>
					<li class="">
						<a class="nav-stylehead" href="faqs.html">Pesanan</a>
					</li>
					<!-- <li class="">
						<a class="nav-stylehead" href="faqs.html">Profil</a>
					</li> -->
					<li>
						<a href="<?= base_url('login')?>">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Log In </a>
					</li>
					<li>
						<a href="<?= base_url('register')?>">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Register </a>
					</li>
				</ul>
				<?php }else{ ?>
				
				<ul>
					<li>
						<a class="nav-stylehead" href="index.html">Home</a>
					</li>
					<li class="">
						<a class="nav-stylehead" href="about.html">Katalog</a>
					</li>
					<li class="">
						<a class="nav-stylehead" href="faqs.html">Pesanan</a>
					</li>
					<li class="">
						<a class="nav-stylehead" href="faqs.html">Profil</a>
					</li>
					<li>
						<a href="<?= base_url('logout')?>"><span class="fa fa-unlock-alt" aria-hidden="true"></span> Log Out </a>
					</li>
				
				</ul>
				<?php } ?>

				<!-- //header lists -->
				<!-- search -->

				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //shop locator (popup) -->
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Log In </h3>
						
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">	
								<input type="text" placeholder="User Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" required="">
							</div>
							<input type="submit" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						
						<form action="<?= base_url('authentication/do_register') ?>" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Nama" name="nama" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password1"
									required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirm Password" name="confirm"
									id="password2" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="Alamat" name="alamat"
									id="alamat" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="No. HP" name="nohp"
									id="nohp" required="">
							</div>
							<input type="submit" value="Sign Up">
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>