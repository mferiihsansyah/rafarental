<?php echo validation_errors(); ?>
<div class="page-content">
  <div class="page-body">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <div class="widget">
          <div class="widget-header ">
            <span class="widget-caption">Data Halaman</span>
            <div class="widget-buttons">
              <a id="editabledatatable_new" data-toggle="modal" data-target="#modal_add" class="btn btn-info">
                Tambahkan Halaman Baru
              </a>
            </div>
          </div>
          <!--Start Modal-->
          <div class="modal fade" id="modal_add" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tambahkan Halaman</h4>
                </div>
                <form id="addform" action="<?php echo base_url();?>admin/page/add_data" enctype="multipart/form-data"  method="post"
                  data-bv-message="Data tidak Valid"
                  data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                  data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                  data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="namamobil">Nama Halaman</label>
                      <input type="text" class="form-control" name="nama" placeholder="Nama Halaman"data-bv-notempty="true" data-bv-notempty-message="Tipe Mobil Tidak Boleh Kosong">
                    </div>
                    <div class="form-group">
                      <label for="desc">Isi Halaman</label>
                      <textarea class="form-control" name="isi" placeholder="Isi Halaman" style="height: 300px" ></textarea>
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
                  <th>No</th>
                  <th>Nama Halaman</th>
                  <th>Isi</th>
                  <th>Terakhir Kali di Edit</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;foreach ($data as $tampil){
                  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $tampil->name_page;?></td>
                    <td><?php echo $tampil->desc_page;?></td>
                    <td><?php echo exDate($tampil->date_page);?></td>
                    <td>
                      <a  data-toggle="modal" data-target="#edit<?php echo $tampil->id_page?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                      <a href="<?php echo base_url();?>admin/page/delete/<?php echo $tampil->id_page;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                    </td>
                  </tr>
                  <div class="modal fade" id="edit<?php echo $tampil->id_page;?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Tambahkan Halaman</h4>
                        </div>
                        <form id="addform" action="<?php echo base_url();?>admin/page/edit_data" enctype="multipart/form-data"  method="post"
                          data-bv-message="Data tidak Valid"
                          data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                          data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                          data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="namamobil">Nama Halaman</label>
                              <input type="hidden" class="form-control" name="idpage" value="<?php echo $tampil->id_page ;?>">
                              <input type="text" class="form-control" name="nama" value="<?php echo $tampil->name_page ;?>" data-bv-notempty="true" data-bv-notempty-message="Tipe Mobil Tidak Boleh Kosong">
                            </div>
                            <div class="form-group">
                              <label for="desc">Isi Halaman</label>
                              <textarea class="form-control" name="isi" style="height: 300px" >
                                <?php echo $tampil->desc_page ;?>
                              </textarea>
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
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>