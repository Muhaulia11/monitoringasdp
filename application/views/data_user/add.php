<div class="card23" style="padding: 2%;">
	<?php echo form_open('data_user/add'); ?>

	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" placeholder="Masukan Username" class="form-control" value="<?php echo $this->input->post('username'); ?>" />
		<span class="text-danger"><?php echo form_error('username'); ?></span>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" placeholder="Masukan Password" class="form-control" value="<?php echo $this->input->post('password'); ?>" />
		<span class="text-danger"><?php echo form_error('password'); ?></span>
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="userNama" placeholder="Masukan Nama" class="form-control" value="<?php echo $this->input->post('userNama'); ?>" />
		<span class="text-danger"><?php echo form_error('userNama'); ?></span>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="userEmail" placeholder="Masukan Email" class="form-control" value="<?php echo $this->input->post('userEmail'); ?>" />
		<span class="text-danger"><?php echo form_error('userEmail'); ?></span>
	</div>
	<div class="form-group">
		<label>No HP</label>
		<input type="text" name="userNoHP" placeholder="Masukan No HP" class="form-control" value="<?php echo $this->input->post('userNoHP'); ?>" />
		<span class="text-danger"><?php echo form_error('userNoHP'); ?></span>
	</div>
	<button type="submit" class="btn btn-success btn-sm">Save</button>
	<a href="javascript:history.back()" class="btn btn-info btn-sm float-right">Kembali</a>
	<?php echo form_close(); ?>
</div>