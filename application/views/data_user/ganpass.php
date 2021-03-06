<div class="card23" style="padding: 2%;">
	<?php echo form_open('data_user/ganpass' . $data_user['userCode']); ?>

	<div class="form-group">
		<label>Password Baru</label>
		<input type="text" name="password" placeholder="Masukan Password Baru" class="form-control" value="" />
		<span class="text-danger"><?php echo form_error('password'); ?></span>
	</div>

	<button type="submit" class="btn btn-success btn-sm">Save</button>
	<a href="javascript:history.back()" class="btn btn-info btn-sm float-right">Kembali</a>
	<?php echo form_close(); ?>
</div>