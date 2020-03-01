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
				<li>Checkout</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">Register
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<div>
			<div id="tab4" class="tab-grid" style="display: block;">
				<div class="row">
					<div class="col-md-12 number-paymk">
						<form class="cc-form" action="<?= base_url('register') ?>" method="post">
							<div class="form-group col-md-6">
								<label>Nama Toko</label>
								<input class="form-control" placeholder="Contoh: Amaya Bakery" name="nama" value="<?= set_value('nama') ?>" type="text">
								<?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group col-md-6 ">
								<label>Email</label>
								<input class="form-control" placeholder="Contoh: lidiya@gmail.com" name="email" value="<?= set_value('email') ?>" type="email">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group col-md-6 ">
								<label>Password</label>
								<input class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ?>" type="password">
								<?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group col-md-6 ">
								<label>Konfirmasi Password</label>
								<input class="form-control" placeholder="Konfirmasi Password" name="password2" value="<?= set_value('password2') ?>" type="password">
								<?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group col-md-6 ">
								<label>Alamat Lengkap</label>
								<input class="form-control" placeholder="Contoh : Jl. Angklung No.11, Kecamatan Lowokwaru, Kota Malang" name="alamat" value="<?= set_value('alamat') ?>" type="text">
								<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group col-md-6 ">
								<label>No. HP</label>
								<input class="form-control" placeholder="Contoh : 081338423751" name="nohp" value="<?= set_value('nohp') ?>" type="text">
								<?= form_error('nohp', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group col-md-6 ">
								<input type="submit" class="submit" value="Register">
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
</div>
<!-- //checkout page -->
<!-- //footer -->
<!-- copyright -->
<?php include 'template/footer.php'; ?>
