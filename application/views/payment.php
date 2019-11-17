<?php include 'template/header.php';?>
<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Pembayaran
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<!--Horizontal Tab-->
				<div id="parentHorizontalTab">
					<ul class="resp-tabs-list hor_1">
						<li>Upload Bukti Pembayaran</li>
					</ul>
					<div class="resp-tabs-container hor_1">
						
						<div>
							<div id="tab1" class="tab-grid" style="display: block;">
								<div class="row">
									<div class="col-md-6">
                                    <div class="vertical_post"><?php foreach ($pesanan as $pesanan) {}?>
									<h5>Total transfer Rp <?= number_format($pesanan['total_harga'],0,',','.') ?></h5>
									<div class="swit-radio">
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<i></i>BCA - 12345678 a/n Maulidiya Qurrota</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													
													<i></i>BRI - 12345678 a/n Maulidiya Qurrota</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													
													<i></i>Mandiri - 12345678 a/n Maulidiya Qurrota</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													
													<i></i>BNI - 12345678 a/n Maulidiya Qurrota</label>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
							</div>
									</div>
									<div class="col-md-6 number-paymk">
										<form class="cc-form" action="<?= base_url('home/make_payment')?>" method="post" enctype="multipart/form-data">
											<div class="clearfix">
												<div class="form-group form-group-cc-number">
													<label>No Rekening Pengirim</label>
													<input class="form-control" name="no_rek" placeholder="Contoh: 901200901" type="text" required>
													<span class="cc-card-icon"></span>
												</div>
												<div class="form-group form-group-cc-cvc">
													<label>Nama Rekening Pengirim</label>
													<input class="form-control" name="nama_rek" placeholder="Contoh: Maulidiya Qurrota" type="text" required>
												</div>
											</div>
											<div class="clearfix">
												<div class="form-group form-group-cc-name">
													<label>Bank Rekening Pengirim</label>
													<input class="form-control" name="bank_rek" placeholder="Contoh: Mandiri" type="text" required>
												</div>
												<div class="form-group form-group-cc-date">
													<label>Bank Tujuan</label>
													<select class="form-control" name="bank_tujuan" id="bank_tujuan" required>
                                                        <option value="BCA">BCA - 12345678 a/n Maulidiya Qurrota</option>
                                                        <option value="BRI">BRI - 12345678 a/n Maulidiya Qurrota</option>
                                                        <option value="Mandiri">Mandiri - 12345678 a/n Maulidiya Qurrota</option>
                                                        <option value="BNI">BNI - 12345678 a/n Maulidiya Qurrota</option>
                                                    </select>
												</div>
												<div class="form-group form-group-cc-name">
													<label>Bukti Pembayaran</label>
													<input class="form-control" name="bukti" placeholder="Contoh: Mandiri" type="file">
												</div>
											</div>
											<?= form_hidden('id_order', $pesanan['id']);?>
											<input type="submit" class="submit" value="Kirim Bukti Pembayaran">
										</form>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
				<!--Plug-in Initialisation-->
			</div>
		</div>
    </div>
    <?php include 'template/footer.php';?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/easy-responsive-tabs.css')?>" />
	<script src="<?= base_url('assets/js/easyResponsiveTabs.js')?>"></script>

	<script>
		$(document).ready(function () {
			//Horizontal Tab
			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
		});
	</script>