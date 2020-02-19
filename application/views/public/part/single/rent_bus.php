<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
	<div class="container-fluid">
		<div class="inner-sec-shop px-lg-4 px-3">
			<h3 class="tittle-w3layouts my-lg-4 mt-3">List Mobil </h3>
			<div class="row">
				<!-- product left -->
				<div class="side-bar col-lg-3">
					<!--preference -->
					<div class="left-side">
						<h3 class="agileits-sear-head">Tipe Mobil</h3>
						<ul><?php foreach($type_car as $tipe){?>
							<li>
								<a href="<?php echo base_url().'daftar_kendaraan/'.$tipe->name_cat;?>">
								<span class="span"><?php echo $tipe->name_cat?></span></a>
							</li>
						<?php }?>
						</ul>
					</div>
					<!-- // preference -->
					<!-- deals -->
					<div class="deal-leftmk left-side">
						<?php if($cek_rec>0):?>
						<h3 class="agileits-sear-head">Rekomendasi Hanya Untukmu</h3>
						<?php else:?>

						<?php endif;?>
						<?php foreach($recomend as $rec){?>
						<div class="special-sec1">
							<div class="img-deals">
								<img src="<?php echo base_url().'upload/mobil/'.$rec->image_vh;?>" alt="">
							</div>
							<div class="img-deal1">
								<h3><?php echo $rec->name_vh?></h3>
								<a href="single.html">Rp. <?php echo rpCurrency($rec->price_vh);?></a>
							</div>
							<div class="clearfix"></div>
						</div>
					<?php }?>
					</div>
					<!-- //deals -->
				</div>
				<!-- //product left -->
				<!--/product right-->
				<div class="left-ads-display col-lg-9">
					<div class="wrapper_top_shop">
						<div class="row">
							<!-- /womens -->
							<?php foreach ($data as $tampil) {
								# code...
								?>
								<div class="col-md-3 product-men women_two shop-gd">
									<div class="product-googles-info googles">
										<div class="men-pro-item">
											<div class="men-thumb-item">
												<img style="height:140px;" src="<?php echo base_url().'upload/mobil/'.$tampil->image_vh;?>" class="img-fluid" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="<?php echo base_url().'kendaraan/'.$tampil->id_vh;?>" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
												<span class="product-new-top">New</span>
											</div>
											<div class="item-info-product">
												<div class="info-product-price">
													<div class="grid_meta">
														<div class="product_price">
															<h4>
																<a href="<?php echo base_url().'kendaraan/'.$tampil->name_vh;?>"><?php echo $tampil->name_vh;?></a>
															</h4>
															<div class="grid-price mt-2">
																<span class="money ">Rp. <?php echo rpCurrency($tampil->price_vh);?></span>
															</div>
														</div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
							<?php	}?>
						</div>
					</div>
				</div>
			</div>
			<!--//product right-->
		</div>
		<!--/slide-->
		<!--
		<div class="slider-img mid-sec mt-lg-5 mt-2">
			--><!--//banner-sec-->
			<!--
			<h3 class="tittle-w3layouts text-left my-lg-4 my-3">Featured Products</h3>
			<div class="mid-slider">
				<div class="owl-carousel owl-theme row">
					<?php foreach ($data_mobil as $muncul) {
							# code...
						?>
						<div class="item">
							<div class="gd-box-info text-center">
								<div class="product-men women_two bot-gd">
									<div class="product-googles-info slide-img googles">
										<div class="men-pro-item">
											<div class="men-thumb-item">
												<img style="height:140px;" src="<?php echo base_url().'upload/mobil/'.$muncul->image_vh;?>" class="img-fluid" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="<?php echo base_url().'kendaraan/'.$tampil->id_vh;?>" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
												<span class="product-new-top">New</span>
											</div>
											<div class="item-info-product">

												<div class="info-product-price">
													<div class="grid_meta">
														<div class="product_price">
															<h4>
																<a href="<?php echo base_url().'kendaraan/'.$tampil->slug_vh;?>"><?php echo $tampil->name_vh;?></a>
															</h4>
															<div class="grid-price mt-2">
																<span class="money ">Rp. <?php echo rpCurrency($tampil->price_vh);?></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
			</div>
		</div>-->
		<!--//slider-->
		<!--
	</div>
-->
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