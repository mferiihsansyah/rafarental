<div class="page-content">
<div class="page-body">
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="widget">
            <div class="widget-header ">
                <span class="widget-caption">Data Pelanggan</span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                    <thead>
                        <tr role="row">
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $tampil){
                        ?>
                        <tr>
                            <td><?php echo $tampil->name_inv;?></td>
                            <td><?php echo $tampil->email_cs;?></td>
                            <td><?php echo $tampil->pass_cs;?></td>
                            <td>
                                <a href="<?php echo base_url();?>admin/customer/edit/<?php echo $tampil->id_cs;?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url();?>admin/customer/delete/<?php echo $tampil->id_cs;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
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
                     //   "print"
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
    InitiateEditableDataTable.init();
    InititateSimpleDataTable.init();
</script>