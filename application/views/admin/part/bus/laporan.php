<div class="page-content">
<div class="page-body">
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="widget">
            <div class="widget-header ">
                <span class="widget-caption">Laporan Data Mobil</span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                    <thead>
                        <tr role="row">
                            <th>Nama Mobil</th>
                            <th>Total Disewakan</th>
                            <th>Jumlah Armada Tersedia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $tampil){
                            
                        ?>
                        <tr>
                            <td><?php echo $tampil->name_vh;?></td>
                            <td><?php echo $tampil->total;?></td>
                            <td><?php echo $tampil->qty_vh?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>