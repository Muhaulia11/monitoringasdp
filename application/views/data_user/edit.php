<div class="card23" style="padding: 2%;">
	<?php echo form_open('data_user/edit/' . $data_user['userCode']); ?>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="userNama" placeholder="Masukan Nama" class="form-control" value="<?php echo ($this->input->post('userNama') ? $this->input->post('userNama') : $data_user['userNama']); ?>" />
		<span class="text-danger"><?php echo form_error('userNama'); ?></span>
	</div>
	<button type="submit" class="btn btn-success btn-sm">Save</button>
	<a href="javascript:history.back()" class="btn btn-info btn-sm float-right">Kembali</a>
	<?php echo form_close(); ?>
</div>