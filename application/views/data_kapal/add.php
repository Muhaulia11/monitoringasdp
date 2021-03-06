<div class="card23" style="padding: 2%;">
	<?php echo form_open('data_kapal/add'); ?>

	<div class="form-group">
		<label>Nama Kapal</label>
		<input type="text" name="kapalNama" placeholder="Masukan Nama Kapal" class="form-control" value="<?php echo $this->input->post('kapalNama'); ?>" />
		<span class="text-danger"><?php echo form_error('kapalNama'); ?></span>
	</div>
	<div class="form-group">
		<label>Bendera Kapal</label>
		<input type="text" name="kapalBendera" placeholder="Masukan Bendera Kapal" class="form-control" value="<?php echo $this->input->post('kapalBendera'); ?>" />
		<span class="text-danger"><?php echo form_error('kapalBendera'); ?></span>
	</div>
	<div class="form-group">
		<label>Isi Kotor Kapal</label>
		<input type="text" name="kapalIsiKotor" placeholder="Masukan Isi Kotor Kapal" class="form-control" value="<?php echo $this->input->post('kapalIsiKotor'); ?>" />
		<span class="text-danger"><?php echo form_error('kapalIsiKotor'); ?></span>
	</div>
	<div class="form-group">
		<label>HP - ME</label>
		<input type="text" name="kapalHP-ME" placeholder="Masukan HP - ME Kapal" class="form-control" value="<?php echo $this->input->post('kapalHP-ME'); ?>" />
		<span class="text-danger"><?php echo form_error('kapalHP-ME'); ?></span>
	</div>
	<div class="form-group">
		<label>Tahun Pembuatan Kapal</label>
		<input type="text" name="kapalTahunPembuatan" placeholder="Masukan Tahun Pembuatan Kapal" class="form-control" value="<?php echo $this->input->post('kapalTahunPembuatan'); ?>" />
		<span class="text-danger"><?php echo form_error('kapalTahunPembuatan'); ?></span>
	</div>
	<div class="form-group">
		<label>Nahkoda Kapal</label>
		<input type="text" name="kapalNahkoda" placeholder="Masukan Nahkoda Kapal" class="form-control" value="<?php echo $this->input->post('kapalNahkoda'); ?>" />
		<span class="text-danger"><?php echo form_error('kapalNahkoda'); ?></span>
	</div>
	<div class="form-group">
		<label>Jumlah Crew Kapal</label>
		<input type="text" name="kapalJumlahCrew" placeholder="Masukan Jumlah Crew Kapal" class="form-control" value="<?php echo $this->input->post('kapalJumlahCrew'); ?>" />
		<span class="text-danger"><?php echo form_error('kapalJumlahCrew'); ?></span>
	</div>
	<div class="form-group">
		<label>Lintasan Kapal</label>
		<input type="text" name="kapalLintasan" placeholder="Masukan Lintasan Kapal" class="form-control" value="<?php echo $this->input->post('kapalLintasan'); ?>" />
		<span class="text-danger"><?php echo form_error('kapalLintasan'); ?></span>
	</div>
	<div class="form-group">
		<label>Pemilik Kapal</label>
		<input type="text" name="kapalPemilik" placeholder="Masukan Pemilik Kapal" class="form-control" value="<?php echo $this->input->post('kapalPemilik'); ?>" />
		<span class="text-danger"><?php echo form_error('kapalPemilik'); ?></span>
	</div>
	<button type="submit" class="btn btn-success btn-sm">Save</button>
	<a href="javascript:history.back()" class="btn btn-info btn-sm float-right">Kembali</a>
	<?php echo form_close(); ?>
</div>


