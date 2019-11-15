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
			<h3 class="tittle-w3l">Katalog Roti
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4>Jumlah pesanan anda: <span><?= $this->cart->total_items() ?> Buah</span>
				</h4>
				<?php foreach ($produk as $produk) {?>
				<div class="col-md-2 product-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="<?= base_url('assets/images/gambar_produk/').$produk['gambar']?>" alt="">
						</div>
						<div class="item-info-product ">
							<h4>
								<a href="single.html"><?= $produk['nama_produk']?></a>
							</h4>
							<div class="info-product-price">
								<span class="item_price">Rp <?= number_format($produk['harga'],0,",",".");?></span>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<fieldset>
								<div class="quantity-select">
									<form action="<?= base_url('home/add_cart')?>" method="post">
									<div class="value-button value-minus" id="decrease" value="Decrease Value">-</div>
									<input type="number" name="jumlah" class="number" value="0" min="0" />
									<?= form_hidden('id', $produk['id']);?>
									<div class="value-button value-plus" id="increase" value="Increase Value">+</div>
									<input type="submit" name="submit" value="Add to cart" class="button">
									</form>
								</div>
							<fieldset>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- <div class="checkout-right-basket pull-right">
					<a href="payment.html">CEHECKOUT PESANAN
					</a>
				</div> -->
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
	<!-- //checkout page -->
	<!-- //footer -->
	<!-- copyright -->
<?php include 'template/footer.php';?>