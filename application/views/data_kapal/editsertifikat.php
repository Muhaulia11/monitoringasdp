<div class="card23" style="padding: 2%;">
	<?php echo form_open_multipart('data_kapal/editsertifikat/' . $data_berlaku['berlakuCode'] . '/' . $kapalCode); ?>

	

	<div class="form-group">
		<label>Tanggal Diberikan</label>
		<input type="date" name="berlakuTanggalAwal" placeholder="Masukan Tanggal" class="form-control" value="<?php echo ($this->input->post('berlakuTanggalAwal') ? $this->input->post('berlakuTanggalAwal') : $data_berlaku['berlakuTanggalAwal']); ?>" />
		<span class="text-danger"><?php echo form_error('berlakuTanggalAwal'); ?></span>
	</div>
	<div class="form-group">

		<p><input type="radio" name="per" value="0" onclick="show2();" <?php
																		echo set_value('per', $data_berlaku['berlakuTanggalAkhir']) != 'PERMANEN' ? "checked" : "";
																		?> />Tidak Permanen</p>
		<p><input type="radio" name="per" value="1" onclick="show1();" <?php
																		echo set_value('per', $data_berlaku['berlakuTanggalAkhir']) == 'PERMANEN' ? "checked" : "";
																		?> />Permanen</p>

	</div>
	<div class="form-group <?php if ($data_berlaku['berlakuTanggalAkhir'] == 'PERMANEN') {
								echo "hide";
							} ?>" id="div1">
		<label>Berlaku Sampai</label>
		<input type="date" name="berlakuTanggalAkhir" placeholder="Masukan Tanggal" class="form-control" value="<?php echo ($this->input->post('berlakuTanggalAkhir') ? $this->input->post('berlakuTanggalAkhir') : $data_berlaku['berlakuTanggalAkhir']); ?>" />
		<span class="text-danger"><?php echo form_error('berlakuTanggalAkhir'); ?></span>
	</div>
	<div class="form-group">
		<label>Unggah Berkas</label>
		<input type="file" name="berkas2" class="form-control-file" value="" />
		<span class="text-danger"><?php echo form_error('berkas'); ?></span>
	</div>
	<button type="submit" class="btn btn-success btn-sm">Save</button>
	<a href="javascript:history.back()" class="btn btn-info btn-sm float-right">Kembali</a>
	<?php echo form_close(); ?>
</div>
<script>
	function show1() {
		document.getElementById('div1').style.display = 'none';
	}

	function show2() {
		document.getElementById('div1').style.display = 'block';
	}
</script>