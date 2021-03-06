<div class="card23" style="padding: 2%;">
	<?php echo form_open('data_sertifikat/edit/' . $data_sertifikat['sertifikatCode']); ?>

	<div class="form-group">
		<label>Nama Sertifikat</label>
		<input type="text" name="sertifikatNama" placeholder="Masukan Nama Sertifikat" class="form-control" value="<?php echo ($this->input->post('sertifikatNama') ? $this->input->post('sertifikatNama') : $data_sertifikat['sertifikatNama']); ?>" />
		<span class="text-danger"><?php echo form_error('sertifikatNama'); ?></span>
	</div>
	<button type="submit" class="btn btn-success btn-sm">Save</button>
	<a href="javascript:history.back()" class="btn btn-info btn-sm float-right">Kembali</a>
	<?php echo form_close(); ?>
</div>