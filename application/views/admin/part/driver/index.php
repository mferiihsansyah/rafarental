<div class="page-content">
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">Data Supir</span>
                        <div class="widget-buttons">
                            <a id="editabledatatable_new" data-toggle="modal" data-target="#modal_add" class="btn btn-info">
                                Tambahkan Supir
                            </a>
                        </div>
                    </div>
                    <!--Start Modal-->
                    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambahkan Data Supir</h4>
                                </div>
                                <form id="addform" action="<?php echo base_url();?>admin/driver/add_data" enctype="multipart/form-data"  method="post"
                                    data-bv-message="Data tidak Valid"
                                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Nama Supir</label>
                                            <input type="text" class="form-control" name="supir" placeholder="Nama Supir" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
                                        </div>
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Nomor Handphone</label>
                                            <input type="number" class="form-control" name="handphone" placeholder="Nomor Handphone" data-bv-notempty="true" data-bv-notempty-message="Nomor Handphone Tidak Boleh Kosong">
                                        </div>
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Alamat</label>
                                            <textarea type="text" class="form-control" name="alamat" placeholder="Alamat" data-bv-notempty="true" data-bv-notempty-message="Alamat Tidak Boleh Kosong"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        <button type="submit" class="btn btn-blue">SIMPAN</button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                            <thead>
                                <tr role="row">
                                    <th>Nama Supir</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $tampil){
                                    ?>
                                    <tr>
                                        <td><?php echo $tampil->nm_driver;?></td>
                                        <td><?php echo $tampil->telp_driver;?></td>
                                        <td><?php echo $tampil->alamat_driver;?></td>
                                        <td><?php $status=$tampil->status_driver;
                                        if($status=0){
                                            $statuss = "Tidak di tempat";
                                        }else{
                                            $statuss = "Di tempat";
                                        }
                                        echo $statuss;
                                        ?></td>
                                        <td>
                                            <a href="<?php echo base_url();?>admin/driver/edit/<?php echo $tampil->id_driver;?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="<?php echo base_url();?>admin/driver/delete/<?php echo $tampil->id_driver;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
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
                  //  "print"
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
                { "bSortable": false }
                ]
            });

        }

    };
}();
InitiateEditableDataTable.init();
</script>