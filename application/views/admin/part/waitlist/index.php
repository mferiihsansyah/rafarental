<div class="page-content">
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">Data Supir</span>
                        <div class="widget-buttons">
                        </div>
                    </div>
                    <!--Start Modal-->
                    <div class="widget-body">
                        <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                            <thead>
                                <tr role="row">
                                    <th>Nomor</th>
                                    <th>Nama Pemesan</th>
                                    <th>Nomor Telepon</th>
                                    <th>Email</th>
                                    <th>Tanggal Daftar Tunggu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $tampil){
                                    $i=1;
                                    ?>
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $tampil->name_wl;?></td>
                                        <td><?php echo $tampil->hp_wl;?></td>
                                        <td><?php echo $tampil->email_wl;?></td>
                                        <td><?php echo exDate($tampil->start_date_wl);?></td>
                                        <td>
                                            <a href="<?php echo base_url();?>admin/waitlist/delete/<?php echo $tampil->id_wl;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                        </td>
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
    var InitiateEditableDataTable = function() {
        return {
            init: function() {
            //Datatable Initiating
            var oTable = $('#editabledatatable').dataTable({
                "aLengthMenu": [
                [5, 15, 20, 100, -1],
                [5, 15, 20, 100, "All"]
                ],
                "iDisplayLength": 5,
                "sPaginationType": "bootstrap",
                "sDom": "Tflt<'row DTTTFooter'<'col-sm-10'i><'col-sm-2'p>>",
                "oTableTools": {
                    "aButtons": [
                    "copy",
                   // "print"
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
                null,
                null,
                { "bSortable": false }
                ]
            });

        }

    };
}();
InitiateEditableDataTable.init();
</script>