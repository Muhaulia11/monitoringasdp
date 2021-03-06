<div class="row">
	<div class="col card23">
		<div class="row" style="margin:2%">
			<a href="<?php echo site_url('data_pemberi/add'); ?>" class="badge badge-success">Tambah</a>
		</div>
		<table class="table table-striped table-bordered " style="margin-top:2%">
			<thead>
				<tr>
					<th>Code</th>
					<th>Nama Penerbit Sertifikat</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data_pemberi as $t) { ?>
					<tr>
						<td><?php echo $t['pemberiCode']; ?></td>
						<td><?php echo $t['pemberiNama']; ?></td>
						<td>
							<a href="<?php echo site_url('data_pemberi/edit/' . $t['pemberiCode']); ?>" class="badge badge-warning">Edit</a> |
							<a href="<?php echo site_url('data_pemberi/remove/' . $t['pemberiCode']); ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>