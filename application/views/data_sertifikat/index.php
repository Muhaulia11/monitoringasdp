<div class="row">
	<div class="col card23">
		<div class="row" style="margin:2%">
			<a href="<?php echo site_url('data_sertifikat/add'); ?>" class="badge badge-success">Tambah</a>
		</div>
		<table class="table table-striped table-bordered " style="margin-top:2%">
			<thead>
				<tr>
					<th>Code</th>
					<th>Nama Sertifikat</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data_sertifikat as $t) { ?>
					<tr>
						<td><?php echo $t['sertifikatCode']; ?></td>
						<td><?php echo $t['sertifikatNama']; ?></td>
						<td>
							<a href="<?php echo site_url('data_sertifikat/edit/' . $t['sertifikatCode']); ?>" class="badge badge-warning">Edit</a> |
							<a href="<?php echo site_url('data_sertifikat/remove/' . $t['sertifikatCode']); ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>