<div class="page-content">
<div class="page-body">
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="widget">
            <div class="widget-header ">
                <span class="widget-caption">Saran & Keluhan</span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Saran dan Keluhan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;foreach ($data as $tampil){
                      ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $tampil->name_id;?></td>
                        <td><?php echo $tampil->idea;?></td>
                        <td>
                          <a href="<?php echo base_url();?>admin/bus/edit/<?php echo $tampil->id_idea;?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="<?php echo base_url();?>admin/bus/delete/<?php echo $tampil->id_idea;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
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