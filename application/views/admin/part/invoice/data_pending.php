<div class="page-content">
<div class="page-body">
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="widget">
            <div class="widget-header ">
                <span class="widget-caption">Tagihan Pending</span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-hover table-bordered" id="simpledatatable">
                    <thead>
                        <tr role="row">
                            <th>Nama Pemesan</th>
                            <th>Kode Transaksi</th>
                            <th>Total Tagihan</th>
                            <th>Tanggal</th>
                            <!--<th>Aksi</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $tampil){
                        ?>
                        <tr>
                            <input type="hidden" name="idvh" value="<?php echo $tampil->id_vh;?>">
                            <input type="hidden" name="idinv" value="<?php echo $tampil->id_inv;?>">
                            <input type="hidden" name="email" value="<?php echo $tampil->email_inv;?>">
                            <td><?php echo $tampil->name_inv;?></td>
                            <td><?php echo $tampil->code_inv;?></td>
                            <td>Rp. <?php echo rpCurrency($tampil->total_inv);?></td>
                            <td><?php echo exDate($tampil->date_inv);?></td>
                            <!--<td>
                                <a href="<?php echo base_url();?>admin/invoice/process_cancel/<?php echo $tampil->id_inv;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Batalkan</a>
                            </td>-->
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
 
<script>    
    var InitiateSimpleDataTable = function() {
    return {
        init: function() {
            //Datatable Initiating
            var oTable = $('#simpledatatable').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, 100, -1],
                    [5, 15, 20, 100, "All"]
                ],
                "iDisplayLength": 5,
                "sPaginationType": "bootstrap",
                "sDom": "Tflt<'row DTTTFooter'<'col-sm-10'i><'col-sm-2'p>>",
                "oTableTools": {
                    "aButtons": [
                    ],
                    "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
                },
                "language": {
                    "search": "",
                    "sLengthMenu": "_MENU_",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumns": [
                    null,
                    null,
                    null,
                    { "bSortable": false }
                ]
            });

        }

    };
}();
InitiateSimpleDataTable.init();
</script>
<!--
<h4>Tagihan Pending</h4>
<br>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>

<div class="alert alert-warning"><strong>Perhatian !</strong> Kotak pencarian digunakan untuk mencari nama pemesan dan kode tagihan</div>

<table data-toggle="table"
       data-url="<?php echo base_url();?>admin/invoice/invoice_pending_data"
       data-pagination="true"
       data-side-pagination="server"
       data-page-list="[5, 10, 20, 50, 100, 200]"
       data-search="true"

       data-toolbar="#toolbar"
       data-show-refresh="true"
       data-show-toggle="true"
       data-show-columns="true"
       >

    <thead>
        <tr>
            <th data-field="title">Nama Pemesan</th>
            <th data-field="code">Kode Tagihan</th>
            <th data-field="price">Total Tagihan</th>
            <th data-field="date">Tanggal</th>
            <th data-field="action">Aksi</th>
        </tr>
    </thead>
</table>
-->