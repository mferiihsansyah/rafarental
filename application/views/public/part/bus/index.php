<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 my-4">Armada Terbaru </h3>
            <div class="row">
                <!--mobil-->
            <?php foreach($mobil as $tampil){?>
                <div class="col-md-3 product-men women_two">
                    <div class="product-googles-info googles">
                        <div class="men-pro-item">
                            <div class="men-thumb-item">
                               <img src="<?php echo base_url().'upload/mobil/'.$tampil->image_vh;?>" class="img-fluid" alt="" style="height:200px;" >
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
                                                <a href="<?php echo base_url().'kendaraan/'.$tampil->name_vh;?>"><?php echo $tampil->name_vh; ?></a>
                                            </h4>
                                            <div class="grid-price mt-2">
                                                <span class="money "><?php echo 'Rp. '.rpCurrency($tampil->price_vh);?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
                <!--End Mobil-->
            </div>
        </div>
        <div class="container-fluid">
        <div class="testimonials py-lg-4 py-3 mt-4">
                    <div class="testimonials-inner py-lg-4 py-3">
                        <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Penjelasan Tipe Mobil</h3>
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <div class="testimonials_grid text-center">
                                        <h3>RAFA RENTAL MOBIL
                                        </h3>
                                        <label>Palembang</label>
                                        <p>Menyediakan Jasa Penyewaan Mobil Berbagai Jenis</p>
                                    </div>
                                </div>
                                 <?php foreach($type_car as $tp){?>
                                <div class="carousel-item">
                                    <div class="testimonials_grid text-center">
                                        <h3>Mobil 
                                            <span><?php echo $tp->name_cat;?></span>
                                        </h3>
                                        <label>Adalah</label>
                                        <p><?php echo $tp->desc_cat;?></p>
                                    </div>
                                </div>
                            <?php }?>
                                <a class="carousel-control-prev test" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="fas fa-long-arrow-alt-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next test" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="fas fa-long-arrow-alt-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 my-4">Mobil Terlaris </h3>
            <div class="row">
                <!--mobil-->
            <?php foreach($mobil_banyak as $tampil){?>
                <div class="col-md-3 product-men women_two">
                    <div class="product-googles-info googles">
                        <div class="men-pro-item">
                            <div class="men-thumb-item">
                               <img src="<?php echo base_url().'upload/mobil/'.$tampil->image_vh;?>" class="img-fluid" alt="" >
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
                                                <a href="<?php echo base_url().'kendaraan/'.$tampil->name_vh;?>"><?php echo $tampil->name_vh; ?></a>
                                            </h4>
                                            <div class="grid-price mt-2">
                                                <span class="money "><?php echo 'Rp. '.rpCurrency($tampil->price_vh);?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
                <!--End Mobil-->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 my-4">Mobil Terlaris Bulan Ini</h3>
            <div class="row">
                <!--mobil-->
            <?php foreach($mobil_banyak as $tampil){?>
                <div class="col-md-3 product-men women_two">
                    <div class="product-googles-info googles">
                        <div class="men-pro-item">
                            <div class="men-thumb-item">
                               <img src="<?php echo base_url().'upload/mobil/'.$tampil->image_vh;?>" class="img-fluid" alt="" >
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
                                                <a href="<?php echo base_url().'kendaraan/'.$tampil->name_vh;?>"><?php echo $tampil->name_vh; ?></a>
                                            </h4>
                                            <div class="grid-price mt-2">
                                                <span class="money "><?php echo 'Rp. '.rpCurrency($tampil->price_vh);?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
                <!--End Mobil-->
            </div>
        </div>
        <div class="container-fluid">
        <div class="testimonials p-lg-5 p-3 mt-4">
                    <div class="row last-section">
                        <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                            <div class="mail-grid-icon text-center">
                                <i class="fas fa-gift"></i>
                            </div>
                            <div class="mail-grid-text-info">
                                <h3>Genuine Product</h3>
                                <p>Lorem ipsusm dolor sit amet, consectetur</p>
                            </div>
                        </div>
                        <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                            <div class="mail-grid-icon text-center">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="mail-grid-text-info">
                                <h3>Secure Products</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                        </div>
                        <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                            <div class="mail-grid-icon text-center">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="mail-grid-text-info">
                                <h3>Cash on Delivery</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                        </div>
                        <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                            <div class="mail-grid-icon text-center">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="mail-grid-text-info">
                                <h3>Easy Delivery</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                        </div>
                    </div>
                </div>
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
<!--
<div class="hcontent-wrapper" style="text-align: center;">



	<?php foreach($bus_data as $rhotel):?>
		<div class="hotel-content">


			<img src="<?php echo base_url().'assets/hpublic/img_hotel/'.$rhotel->image_vh;?>" style="    width: 100%;
    border-radius: 3px;
    margin-top: 10px;
    margin-bottom: 10px;">

                <div class="price" style="        display: inline-block;
    vertical-align: top;
    margin-top: -240px;">
                    <div class="hbtn-price" style="      background: #383838;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    padding: 4px;
    padding-right: 18px;
    padding-bottom: 10px;
    padding-left: 18px;">   
    <span style="font-size: 12px;">Mulai Dari</span>
    <br>
                        <?php echo 'Rp. '.rpCurrency($rhotel->price_vh);?>
                        <br>
                        <span style="font-size: 12px;">/hari</span>
                    </div>
                </div>

    		<div class="info" style="     display: inline-block;
    vertical-align: top;
    padding: 10px;
    width: 100%;
    margin-top: -50px;
    background: #4e4b4b;">

            <a href="<?php echo base_url().'kendaraan/'.$rhotel->slug_vh;?>">
                    <div class="title" style="color: #fff;
    
    font-size: 16px;">
                        <?php echo $rhotel->name_vh;?>
                    </div>
                </a>

   			<a href="<?php echo base_url().'kendaraan/'.$rhotel->slug_vh;?>">
		    		<div class="title" style="color: #fff;
    
    font-size: 19px;">
		    			<?php echo $rhotel->name_cat;?>
		    		</div>
	    		</a>
 


    		</div>

		</div>
	<?php endforeach;?>



</div>
-->