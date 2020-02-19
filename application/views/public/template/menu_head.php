<body>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<header>
			<div class="row">
				<div class="col-md-3 top-info text-left mt-lg-4">
					
				</div>
				<div class="col-md-6 logo-w3layouts text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="<?php echo base_url();?>kendaraan">
							<?php echo $title_web ;?> </a>
						</h1>
					</div>

					<div class="col-md-3 top-info-cart text-right mt-lg-4">
						<ul class="cart-inner-info">
							<li class="button-log">
								<a class="btn-open" href="#">
									<span class="fa fa-user" aria-hidden="true">AKUN</span>
								</a>
							</li>
						</ul>
						<!---->
						<div class="overlay-login text-left">
							<button type="button" class="overlay-close1">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>
							<div class="wrap">
								<h5 class="text-center mb-4">Silakan Login Terlebih Dahulu</h5>
								<div class="login p-5 bg-dark mx-auto mw-100">

									<label class="mb2"><a href="<?php echo base_url();?>login_user">LOGIN</a></label>
								</div>
								<!---->
							</div>
						</div>
						<!---->
					</div>
				</div>
				<label class="top-log mx-auto"></label>
				<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

					<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<li class="nav-item <?php echo $this->uri->segment(1) == 'kendaraan' ? 'active': '' ?>">
							<a class="nav-link ml-lg-0" href="<?php echo base_url();?>kendaraan">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item <?php echo $this->uri->segment(2) == 'tentang-kami' ? 'active': '' ?>">
							<a class="nav-link ml-lg-0" href="<?php echo base_url();?>/page/tentang-kami">Tentang Kami
							</a>
						</li>
						
			</ul>

		</div>
	</nav>
</header>
<!-- //header -->
<!-- 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url();?>">Rafa Rental Mobil</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
     <li>
					<a href="<?php echo base_url();?>kendaraan">
						<i class="fa fa-car"></i>&nbspKendaraan
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>ordercheck">
						<i class="fa fa-book"></i>&nbspCek Pemesanan
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>saran">
						<i class="fa fa-book"></i>&nbspSaran dan Keluhan
					</a>
				</li>
				<?php foreach($menu as $md):?>
				<?php if(count($menu)>0):?>
				<li>
					<a href="<?php echo base_url().'/page/'.url_title($md->name_page, '-', TRUE);?>">
					<i class="fa fa-user"></i>&nbsp	<?php echo $md->name_page;?>
					</a>
				</li>
				<?php else:?>
				<?php endif;?>
				<?php endforeach;?>
    </ul>
  </div>
</nav>
!-->