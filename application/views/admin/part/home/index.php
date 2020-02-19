<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


<div class="page-content">
<div class="page-body">
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="databox bg-white radius-bordered">
        <div class="databox-right">
            <span class="databox-number themethirdcolor"><?php echo $pend;?></span>
            <div class="databox-text darkgray">PEMESANAN PENDING</div>
            <div class="databox-stat themethirdcolor radius-bordered">
                <i class="stat-icon  icon-lg fa fa-envelope-o"></i>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="databox bg-white radius-bordered">
        <div class="databox-right">
            <span class="databox-number themeprimary"><?php echo $conf;?></span>
            <div class="databox-text darkgray">KONFIRMASI PEMESANAN</div>
            <div class="databox-state bg-themeprimary">
                <i class="fa fa-check"></i>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="databox bg-white radius-bordered">
        <div class="databox-right">
            <span class="databox-number themeprimary"><?php echo $cancel;?></span>
            <div class="databox-text darkgray">PESANAN DIBATALKAN</div>
            <div class="databox-stat themesecondary radius-bordered">
                <i class="stat-icon icon-lg fa fa-tasks"></i>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="databox bg-white radius-bordered">
        <div class="databox-right padding-top-20">
        <div class="databox-stat palegreen">
            <i class="stat-icon icon-xlg fa fa-phone"></i>
        </div>
        <?php foreach ($cs_data as $tampilcs){ ?>
        <div class="databox-text darkgray"><?php echo $tampilcs->name_inv;?></div>
        <div class="databox-text darkgray">TOP CUSTOMER</div>
        </div>
        </div>
        <?php } ?>
    </div>
    <div class="container">
        <div id="element-title">
            Grafik Tagihan Selesai Selama Ini
        </div>
        <div id="carts">
        </div>
</div>

</div>
</div>
</div>

<script type="text/javascript">

Morris.Area({
  element: 'carts',
  data: [<?php  foreach($graphic_data as $row)
		{
			$chart_data = '{date:"'.$row->date_time_inv.'", total:"'.$row->total_inv.'"},';
			$cart = $chart_data;
			echo $cart;
		}
		?>
],
  xkey: 'date',
  ykeys: ['total'],
  labels: ['Total Invoice']
});

</script>