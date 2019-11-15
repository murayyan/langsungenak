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
			<h3 class="tittle-w3l">Checkout
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
			<form action="<?= base_url('home/tambah_pesanan')?>" method="post">
				
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th width="50">No.</th>
								<th width="450" colspan="2">Jenis Roti</th>
								<th width="200">Jumlah</th>
								<th width="300">Harga</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
							if (!$this->cart->contents()) { ?>
							<tr>
								<td colspan="6"><h3>Keranjang Kosong</h3></td>
							</tr>
							<?php }else{
							$i = 1;
							foreach($this->cart->contents() as $items){ ?>
							<tr class="rem1">
								<td class="invert"><?= $i ?></td>
								<td class="invert-image">
									<a href="single2.html">
										<img src="images/a7.jpg" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert"><?= $items['name'] ?></td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<input type="number" style="margin:0;" class="number" name="jumlah[]" value="<?= $items['qty'] ?>" min="0" />
											<input type="hidden"  style="margin:0;" class="price" value="<?= $items['price'] ?>" />
											<input type="hidden"  style="margin:0;" class="total_price" name="total_harga[]" value="<?= $items['qty']*$items['price'] ?>" />
											<div class="entry value-plus active">&nbsp;</div>
											<?= form_hidden('id[]', $items['id']);?>
											<?= form_hidden('nama[]', $items['name']);?>
											<?= form_hidden('harga[]', $items['price']);?>
										</div>
									</div>
								</td>
								<td class="invert tot_harga" id="tot_harga_item">Rp <?= number_format($items['qty']*$items['price'],0,",",".") ?></td>
								<td class="invert">
									<div class="rem">
										<div class="close1"> </div>
									</div>
								</td>
							</tr>
							<?php $i++; }} ?>
							<tr class="rem1" height="60">
								<td class="invert" colspan="3">Total</td>
								<td class="invert sum_item"><?= $this->cart->total_items()?></td>
								<td class="invert sum_price">Rp <?= number_format($this->cart->total(),0,",",".") ?></td>
								<td class="invert">
								<input type="hidden" style="margin:0;" class="total_prices" value="<?= $this->cart->total() ?>" />
								<?= form_hidden('id_customer', $this->session->userdata('id'));?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<br>
			<div class="row">
						<div class="form-group col-md-6">
							<label>Alamat Pengantaran</label>
							<input class="form-control" placeholder="Contoh: Jl. Jendral Sudirman No 90, Sumbawa" name="alamat"  type="text">
						</div>	
						<div class="form-group col-md-6">
							<label>Tanggal Pengantaran</label>
							<input type='text' class='form-control' id="tgl" name="tanggal" data-language='en' placeholder="Pengantaran hanya setiap Rabu & Sabtu"/>
						</div>					
						<div class="form-group col-md-6">
							<label>No Telp</label>
							<input class="form-control" placeholder="Contoh: 081289129990" name="telp" type="text">
						</div>			
			</div>
			<!-- </div> -->
				<div class="container">
			<div class="checkout-right-basket pull-right">
				<button type="submit" class="submit check_out">CHECKOUT PESANAN</button>
			</div>
			</form>
		</div>
		</div>
	
		
	</div>
	</form>
	
	<!-- //checkout page -->
	<?php include 'template/footer.php';?>
<script>
var disabledDays = [0,1,2,4,5,];
var start = new Date();
$('#tgl').datepicker({
	minDate: start,
    language: 'en',
    onRenderCell: function (date, cellType) {
        if (cellType == 'day') {
            var day = date.getDay(),
                isDisabled = disabledDays.indexOf(day) != -1;

            return {
                disabled: isDisabled
            }
        }
    }
})
$.fn.datepicker.language['id'] = {
    days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
    daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
    daysMin: ['Mi', 'Se', 'Se', 'Ra', 'Ka', 'Ju', 'Sa'],
    months: ['Januari','Februari','Maret','April','Mei','Juni', 'Juli','Agustus','September','Oktober','November','Desember'],
    monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
    dateFormat: 'yyyy-mm-dd'
};
$('#tgl').datepicker({
    language: 'id'
})
</script>	