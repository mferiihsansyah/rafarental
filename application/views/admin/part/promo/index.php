<div class="page-content">
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">Kode Promo</span>
                        <div class="widget-buttons">
                            <a id="editabledatatable_new" data-toggle="modal" data-target="#modal_add" class="btn btn-info">
                                Tambahkan Promo
                            </a>
                        </div>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                            <thead>
                                <tr role="row">
                                    <th>Nama Promo</th>
                                    <th>Potongan Promo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $tampil){
                                    ?>
                                    <tr>
                                        <td><?php echo $tampil->nm_promo;
                                        $teks=str_replace(' ','',$tampil->nm_promo);
                                        ?></td>
                                        <td><?php echo $tampil->ds_promo;?> %</td>
                                        <td>
                                            <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?php echo $teks;?>"><i class="fa fa-envelope"></i> Kirim</a>
                                            <a href="<?php echo base_url();?>admin/bus/edit/<?php echo $tampil->nm_promo;?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="<?php echo base_url();?>admin/bus/delete/<?php echo $tampil->nm_promo;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <!--START Modal (Send Email)-->
                                    <div id="myModal<?php echo $teks;?>" class="modal fade" role="dialog" tabindex="-1">
                                        <div class="modal-dialog">
                                            <!--Content Modal-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Kirim Kode Promo</h4>
                                                </div>
                                                <form class="form-horizontal" method="post" action="<?php echo base_url();?>send_promo">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-3">Nama Promo</label>
                                                            <div class="col-xs-8">
                                                                <input name="namapromo" value="<?php echo $tampil->nm_promo;?>" class="form-control" type="text" readonly><br>
                                                                <input name="dspromo" value="<?php echo $tampil->ds_promo;?>" type="hidden">
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-xs-3">Judul Email</label>
                                                            <div class="col-xs-8">
                                                                <textarea name="judulpesan" class="form-control" type="text"required></textarea><br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-3">Isi Email</label>
                                                            <div class="col-xs-8">
                                                                <textarea name="pesanpromo" class="form-control" type="text" required></textarea><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                       <button class="btn" data-dismiss="modal" aria-hidden="true">TUTUP</button>
                                                       <button class="btn btn-info">KIRIM</button>
                                                   </div>
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                                   <!--END Modal-->
                               <?php } ?>
                           </tbody>
                       </table>
                   </div>
                   <!--START Modal (AddPromo)-->
                   <div class="modal fade" id="modal_add" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambahkan Kode Promo</h4>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/promo/add_process">  
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" >Nama Promo</label>
                                        <div class="col-xs-8">
                                            <input name="addnama" class="form-control" type="text" placeholder="Nama Promo..." required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" >Potongan Promo</label>
                                        <div class="col-xs-8">
                                            <input name="addpotongan" class="form-control" type="number" placeholder="Potongan Promo..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--END Modal -->
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
                { "bSortable": false }
                ]
            });

        }

    };
}();
InitiateEditableDataTable.init();
InititateSimpleDataTable.init();
</script>