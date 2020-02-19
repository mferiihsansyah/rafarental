<?php foreach($page_data as $pd){}?>
<?php foreach($set_data as $sd){}?>
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<h3 class="tittle-w3layouts text-center my-lg-4 my-4"><?php echo $pd->name_page;?></h3>
			<div class="inner_sec">
				<p class="sub text-center mb-lg-5 mb-3"><?php echo $pd->desc_page?></p>
				<br>
				<div class="address row" style="flex-wrap: wrap;">
					<div class="col-lg-4 address-grid" style="padding:3em 0em;background: #f7f7f7;border: 1px solid #ebeeef;padding-left: 15px;padding-right: 15px;">
						<div class="row address-info" >
							<div class="col-md-3 address-left text-center">
								<i class="far fa-map" style="font-size: 1.7em;color: #ff4e00"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Alamat</h6>
								<p> <?php echo $sd->address_ws;?>

								</p>
							</div>
						</div>

					</div>
					<div class="col-lg-4 address-grid" style="padding:3em 0em;background: #f7f7f7;border: 1px solid #ebeeef;padding-left: 15px;padding-right: 15px;">
						<div class="row address-info" style="flex-wrap: wrap;">
							<div class="col-md-3 address-left text-center">
								<i class="far fa-envelope" style="font-size: 1.7em;color: #ff4e00"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Email</h6>
								<p>Email :
									<a href="mailto:<?php echo $sd->email_ws;?>"> <?php echo $sd->email_ws;?></a>

								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 address-grid" style="padding:3em 0em;background: #f7f7f7;border: 1px solid #ebeeef;min-height: 1px;padding-left: 15px;padding-right: 15px;">
						<div class="row address-info" style="flex-wrap: wrap;" >
							<div class="col-md-3 address-left text-center">
								<i class="fas fa-mobile-alt" style="font-size: 1.7em;color: #ff4e00"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Phone</h6>
								<p><?php echo $sd->telp_ws;?></p>

							</div>

						</div>
					</div>
				</div>
				<hr>
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>