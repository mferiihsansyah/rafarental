
<h4>Admin Setting</h4>
<br>
<style>
	.table{
		padding: 8px;
		font-family: work sans;
	}
	.table,tr,td{
		border:1px #999;
	}
</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

<!-- Latest compiled and minified JavaScript -->


<table data-toggle="table"
       data-url="<?php echo base_url();?>admin/setting/user_setting_data"
       data-pagination="true"
       data-side-pagination="server"
       data-page-list="[5, 10, 20, 50, 100, 200]"
       data-search="true"
       data-toolbar="#toolbar"
       data-show-refresh="true"
       data-show-toggle="true"
       data-show-columns="true"
       class="table"
       >
    <thead>
<div id="toolbar">
<button class="btn btn-default acc"><span class="glyphicon glyphicon-plus"></span> Tambah User</button>
</div>
        <tr>
            <th >Id Admin</th>
            <th >Username</th>
            <th >Password</th>
            <th >Jabatan</th>
            <th >Aksi</th>
        </tr>
        <?php
        	foreach ($bb_admin as $set) {
        		# code...
        	
        ?>
        <tr>
        	<td><?php echo $set->id_admin ?></td>
        	<td><?php echo $set->username_admin ?></td>
        	<td><?php echo $set->password_admin ?></td>
        	<td><?php echo $set->jabatan ?></td>
        	<td>
        		<button id="edit" class="btn btn-primary edit" idcontent="'.$row->id_admin.'">
        			<span class="glyphicon glyphicon-pencil"></span>
        		</button> 
        		<div id="delete" class="btn btn-danger" idcontent="'.$row->id_admin.'">
            		<span class="glyphicon glyphicon-trash"></span>
            	</div>
            </td>
        </tr>
        <?php } ?>
    </thead>
</table>

<script>

      $(document).ready(function(){

            $('#mydata').DataTable();

      });

</script>
<script type="text/javascript">

$(document).on('click', '#edit', function(){

  var id = $(this).attr('idcontent');

  $('#jqContent').load(bu+'admin/setting/user_edit/'+id);
  $('#jqContent').slideDown('400');


});

$(document).on('click', '#delete', function(){

  var id = $(this).attr('idcontent');
  var c = confirm('Apa anda yakin ingin menghapus data ini ?');

  if(c == true)
  {
    $.get(bu+'admin/setting/bank_delete/'+id, function(data){
        alert(data);
        window.location.href=window.location.href;
    });
  }

});

</script>