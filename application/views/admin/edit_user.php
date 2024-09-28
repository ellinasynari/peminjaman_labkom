<?php $cat = $user->result(); ?>
<div class="" role="tabpanel" data-example-id="togglable-tabs">
 	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#data_peminjaman" id="data_peminjaman-tab" role="tab" data-toggle="tab" aria-expanded="true">Edit User</a>
	    </li>
	</ul>
	<div id="myTabContent" class="tab-content">
	    <div role="tabpanel" class="tab-pane fade in fa-hover active" id="data_peminjaman" aria-labelledby="data_peminjaman-tab">
			<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url('admin/user') ?>">
				<div class="form-group">
					<label class="control-label col-md-2 col-sm-2 col-xs-12">NIS/NIP User</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="nim_nip" class="form-control col-md-7 col-xs-12" value="<?php echo $cat[0]->NIM_NIP ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2 col-sm-2 col-xs-12">Nama User</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="nama_user" class="form-control col-md-7 col-xs-12" value="<?php echo $cat[0]->nama_user ?>">
					</div>
				</div>
				
				<div class="form-group">
					<div class="">
						<input type="hidden" name="id_user" value="<?php echo $cat[0]->id_user ?>">
						<center><input type="submit" name="editUser" class="btn btn-success" value="Update"></center>
					</div>
				</div>
			</form>
	    </div>
	</div>
</div>
			