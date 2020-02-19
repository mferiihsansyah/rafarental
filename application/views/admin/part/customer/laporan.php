<div class="page-content">
<div class="page-body">
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="widget">
            <div class="widget-header ">
                <span class="widget-caption">Laporan Data Pelanggan</span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                    <thead>
                        <tr role="row">
                            <th>Nama Pelanggan</th>
                            <th>Total Transaksi</th>
                            <th>Transaksi Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $tampil){
                        ?>
                        <tr>
                            <td><?php echo $tampil->name_inv;?></td>
                            <td><?php echo $tampil->total_transaksi;?></td>
                            <td><?php echo $tampil->transaksi_terakhir;?> Hari yang lalu</td>
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