<?php include 'template/header.php'; ?>


	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Login</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Login
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="contact-form wthree ">
					<div class="row">
						<div class="col-md-12 number-paymk">
							<?= $this->session->flashdata('message')?>
							<form class="cc-form" action="<?= base_url('login')?>" method="post">
								<div class="form-group ">
									<!-- <label>Email</label> -->
									<input class="form-control" placeholder="Email" name="email" type="text">
									<?= form_error('email', '<small class="text-danger pl-3">', '</small>')?>
								</div>
								<div class="form-group ">
									<!-- <label>Password</label> -->
									<input class="form-control" placeholder="Password" name="password" type="password">
									<?= form_error('password', '<small class="text-danger pl-3">', '</small>')?>
								</div>
							
								<!-- <div class="form-group col-md-6 "> -->
								<input type="submit" style="margin:0px; width:100%;" class="submit" value="Login">
								<!-- </div> -->
								<p style="margin:5px;">Belum punya akun? <a href="<?= base_url('register')?>">Daftar</a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	</div>
	<!-- //checkout page -->
	<!-- //footer -->
	<!-- copyright -->
<?php include 'template/footer.php';?>