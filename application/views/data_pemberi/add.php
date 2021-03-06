<div class="card23" style="padding: 2%;">
	<?php echo form_open('data_pemberi/add'); ?>

	<div class="form-group">
		<label>Nama Penerbit Sertifikat</label>
		<input type="text" name="pemberiNama" placeholder="Masukan Nama Penerbit Sertifikat" class="form-control" value="<?php echo $this->input->post('pemberiNama'); ?>" />
		<span class="text-danger"><?php echo form_error('pemberiNama'); ?></span>
	</div>
	<button type="submit" class="btn btn-success btn-sm">Save</button>
	<a href="javascript:history.back()" class="btn btn-info btn-sm float-right">Kembali</a>
	<?php echo form_close(); ?>
</div>