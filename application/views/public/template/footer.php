	<!--footer -->
	<footer class="py-lg-5 py-3">
		<div class="container-fluid px-lg-5 px-3">
			<div class="row footer-top-w3layouts">
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>About Us</h3>
					</div>
					<div class="footer-text">
						<p>Rafa Rental Mobil Adalah ...</p>
						<ul class="footer-social text-left mt-lg-4 mt-3">

							<li class="mx-2">
								<a href="#">
									<span class="fab fa-facebook-f"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fab fa-twitter"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fab fa-google-plus-g"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fab fa-linkedin-in"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fas fa-rss"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fab fa-vk"></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Get in touch</h3>
					</div>
					<div class="contact-info">
						<h4>Location :</h4>
						<?php foreach ($site_data as $webdata) {
							?>
							<p><?php echo $webdata->address_ws?>.</p>
							<div class="phone">
								<h4>Contact :</h4>
								<p>Phone : <?php echo $webdata->telp_ws?></p>
								<p>Email :
									<a href="mailto:<?php echo $webdata->email_ws?>"><?php echo $webdata->email_ws?></a>
								</p>
							</div>
						<?php };?>
					</div>
				</div>
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Quick Links</h3>
					</div>
					<ul class="links">
						<li>
							<a href="<?php echo base_url();?>">Home</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>ordercheck">Cek Pemesanan</a>
						</li>
						<?php foreach($menu as $md):?>
							<?php if(count($menu)>0):?>
								<li>
									<a href="<?php echo base_url().'/page/'.url_title($md->name_page, '-', TRUE);?>">
										<?php echo $md->name_page;?>
									</a>
								</li>
								<?php else:?>
								<?php endif;?>
							<?php endforeach;?>
						</ul>
					</div>
					<div class="col-lg-3 footer-grid-w3ls">
						<div class="footer-title">
							<h3>Sign up for your offers</h3>
						</div>
						<div class="footer-text">
							<p>Daftarkan Diri Anda menjadi Bagian dari Rafa Rental dan Dapatkan Promo menarik.</p>
						<!--
						<form action="#" method="post">
							<input class="form-control" type="email" name="Email" placeholder="Enter your email..." required="">
							<button class="btn1">
								<i class="far fa-envelope" aria-hidden="true"></i>
							</button>
							<div class="clearfix"> </div>
						</form>
					-->
				</div>
			</div>
		</div>
		<div class="copyright-w3layouts mt-4">
			<p class="copy-right text-center ">&copy; 2018 Rafa Rental. All Rights Reserved | Design by
				<a href="http://w3layouts.com/"> W3layouts </a>
			</p>
		</div>
	</div>
</footer>
<!-- //footer -->

<!--jQuery-->
<script src="<?php echo base_url();?>assets/customer/js/jquery-2.2.3.min.js"></script>
<!-- newsletter modal -->
<!-- Modal -->
<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center p-5 mx-auto mw-100">
				<h6>Be a Part of Rental Rafa Palembang</h6>
				<h3>Dapatkan Promo Menarik dengan Bergabung dengan Kami</h3>
				<p>Untuk Informasi Promo Bisa <a href="<?php  echo base_url();?>promo_info">Klik Disini</a></p>
				<div class="login newsletter">
					<p class="text-center">
						<a href="<?php echo base_url();?>register">Klik Untuk Menjadi Bagian Rafa Rental</a>
					</p>
				</div>
			</div>

		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$("#myModal").modal();
	});
</script>
<script type="text/javascript">
	setTimeout(function(){
		location.reload();
	},100000);
</script>
<!-- // modal -->

<!--search jQuery-->
<script src="<?php echo base_url();?>assets/customer/js/modernizr-2.6.2.min.js"></script>
<script src="<?php echo base_url();?>assets/customer/js/classie-search.js"></script>
<script src="<?php echo base_url();?>assets/customer/js/demo1-search.js"></script>
<!--//search jQuery-->
<!-- cart-js -->
<script src="<?php echo base_url();?>assets/customer/js/minicart.js"></script>
<script>
	googles.render();

	googles.cart.on('googles_checkout', function (evt) {
		var items, len, i;

		if (this.subtotal() > 0) {
			items = this.items();

			for (i = 0, len = items.length; i < len; i++) {}
		}
});
</script>
<!-- //cart-js -->
<script>
	$(document).ready(function () {
		$(".button-log a").click(function () {
			$(this).toggleClass('btn-open').toggleClass('btn-close');
		});
	});
	$('.overlay-close1').on('click', function () {
		$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
		open = false;
	});
</script>
<!-- carousel -->
<!-- Count-down -->
<script src="<?php echo base_url();?>assets/customer/js/simplyCountdown.js"></script>
<link href="<?php echo base_url();?>assets/customer/css/simplyCountdown.css" rel='stylesheet' type='text/css' />
<script>
	var d = new Date();
	simplyCountdown('simply-countdown-custom', {
		year: d.getFullYear(),
		month: d.getMonth() + 2,
		day: 25
	});
</script>
<!--// Count-down -->
<script src="<?php echo base_url();?>assets/customer/js/owl.carousel.js"></script>
<script>
	$(document).ready(function () {
		$('.owl-carousel').owlCarousel({
			loop: true,
			margin: 10,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 2,
					nav: false
				},
				900: {
					items: 3,
					nav: false
				},
				1000: {
					items: 4,
					nav: true,
					loop: false,
					margin: 20
				}
			}
		})
	})
</script>

<!-- //end-smooth-scrolling -->


<!-- dropdown nav -->
<script>
	$(document).ready(function () {
		$(".dropdown").hover(
			function () {
				$('.dropdown-menu', this).stop(true, true).slideDown("fast");
				$(this).toggleClass('open');
			},
			function () {
				$('.dropdown-menu', this).stop(true, true).slideUp("fast");
				$(this).toggleClass('open');
			}
			);
	});
</script>
<!-- //dropdown nav -->
<script src="<?php echo base_url();?>assets/customer/js/move-top.js"></script>
<script src="<?php echo base_url();?>assets/customer/js/easing.js"></script>
<script>
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event) {
			event.preventDefault();
			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
			}, 9000);
		});
	});
</script>
<script>
	$(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						 */

            						 $().UItoTop({
            						 	easingType: 'easeOutQuart'
            						 });

            						});
            					</script>
            					<!--// end-smoth-scrolling -->

            					<script src="<?php echo base_url();?>assets/customer/js/bootstrap.js"></script>
            					<!-- js file -->
            				</body>

            				</html>