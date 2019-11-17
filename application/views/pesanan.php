<?php include 'template/header.php';?>
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Pesanan</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Pesanan
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th width="50">No.</th>
								<th width="150">Invoice</th>
								<th width="150">Tgl Pemesanan</th>
								<th width="150">Tgl Pengiriman</th>
								<th width="150">Jumlah</th>
								<th width="150">Total Harga</th>
								<th width="150">Status</th>
								<th width="150"></th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$i = 1;
						foreach ($pesanan as $pesanan) {?>
							<tr>
								<td><?= $i ?></td>
								<td><?= sprintf("INV%05s", $pesanan['id'])?></td>
								<td><?= tanggal($pesanan['waktu_pesan'])?></td>
								<td><?= tanggal($pesanan['waktu_kirim'])?></td>
								<td><?= $pesanan['jumlah'].' pcs'?></td>
								<td><?= 'Rp '.number_format($pesanan['total_harga'],'0',',','.')?></td>
								<td><?= $pesanan['status']?></td>
								<td><a href="<?= base_url('payment/').$pesanan['id'] ?>" type="button"> <i class="fa fa-credit-card"> Bayar</i></a>
								<a href="" type="button"> <i class="fa fa-file-text-o"> Invoice</i></a>
								</td>
								
							</tr>
						<?php $i++; } ?>
						</tbody>
					</table>
				</div>
			</div>
			
			<!-- </div> -->
		</div>
		</div>
	
		
	</div>
	</form>
	
	<!-- //checkout page -->
	<?php include 'template/footer.php';?>