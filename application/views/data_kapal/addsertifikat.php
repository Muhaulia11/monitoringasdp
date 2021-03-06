<div class="card23" style="padding: 2%;">
	<?php echo form_open_multipart('data_kapal/addsertifikat/' . $kapalCode); ?>

	<div class="form-group">
		<label>Data Sertifikat</label>
		<select class="form-control" name="sertifikatCode">
			<option value="">pilih sertifikat</option>
			<?php
			foreach ($all_data_sertifikat as $data_sertifikat) {
				$selected = ($data_sertifikat['sertifikatCode'] == $this->input->post('sertifikatCode')) ? ' selected="selected"' : "";

				echo '<option value="' . $data_sertifikat['sertifikatCode'] . '" ' . $selected . '>' . $data_sertifikat['sertifikatNama'] . '</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('sertifikatCode'); ?></span>
	</div>
	<div class="form-group">
		<label>Data Pemberi</label>
		<select class="form-control" name="pemberiCode">
			<option value="">pilih pemberi</option>
			<?php
			foreach ($all_data_pemberi as $data_pemberi) {
				$selected = ($data_pemberi['pemberiCode'] == $this->input->post('pemberiCode')) ? ' selected="selected"' : "";

				echo '<option value="' . $data_pemberi['pemberiCode'] . '" ' . $selected . '>' . $data_pemberi['pemberiNama'] . '</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('pemberiCode'); ?></span>
	</div>

	<div class="form-group">
		<label>Tanggal Diberikan</label>
		<input type="date" name="berlakuTanggalAwal" placeholder="Masukan Tanggal" class="form-control" value="<?php echo $this->input->post('berlakuTanggalAwal'); ?>" />
		<span class="text-danger"><?php echo form_error('berlakuTanggalAwal'); ?></span>
	</div>
	<div class="form-group">
		<p><input type="radio" name="per" value="1" checked="checked" onclick="show1();">Permanen</p>
		<p><input type="radio" name="per" value="0" onclick="show2();">Tidak Permanen</p>
	</div>
	<div class="form-group" id="div1" style="display: none;">
		<label>Berlaku Sampai</label>
		<input type="date" name="berlakuTanggalAkhir" placeholder="Masukan Tanggal" class="form-control" value="<?php echo $this->input->post('berlakuTanggalAkhir'); ?>" />
		<span class="text-danger"><?php echo form_error('berlakuTanggalAkhir'); ?></span>
	</div>
	<div class="form-group">
		<label>Unggah Berkas</label>
		<input type="file" name="berkas" class="form-control-file" value="" />
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