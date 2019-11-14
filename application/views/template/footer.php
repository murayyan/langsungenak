<div class="copy-right">
		<div class="container">
			<p>© 2017 Grocery Shoppy. All rights reserved | Design by
				<a href="http://w3layouts.com"> W3layouts.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js')?>"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="<?php echo base_url('assets/js/jquery.magnific-popup.js')?>"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});

		$(document).ready(function() {
			$('.popup-foto').magnificPopup({
				// delegate: 'a',
				type:'image',
				// type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				// closeOnBgClick: true,
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300
				// mainClass: 'my-mfp-zoom-in'
			});
		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="<?php echo base_url('assets/js/minicart.js')?>"></script>
	<script>
		paypalm.minicartk
			.render(); //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!--quantity-->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.number'),
				newVal = parseInt(divUpd.val(), 10) + 1;
			divUpd.val(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.number'),
				newVal = parseInt(divUpd.val(), 10) - 1;
			if (newVal >= 0) divUpd.val(newVal);
		});
	</script>
	<!--quantity-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>
	<!--//quantity-->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="<?php echo base_url('assets/js/move-top.js')?>"></script>
	<script src="<?php echo base_url('assets/js/easing.js')?>"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->
	<script>
		function deleteData(id, nama) {
			document.getElementById('idHapus').value = id
			document.getElementById("kalimatHapus").innerHTML = "Yakin mau hapus personel \"" + nama + "\" secara permanen ?"
		}
	</script>

</body>

</html>