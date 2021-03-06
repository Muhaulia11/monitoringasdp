<div class="row">
	<div class="col card23">
		<div class="row" style="margin:2%">
			<a href="<?php echo site_url('data_kapal/addsertifikat/' . $kapalCode); ?>" class="btn btn-success btn-sm">Tambah</a>
			<a href="javascript:history.back()" class="btn btn-info btn-sm float-right ml-2">Kembali</a>
		</div>
		<table class="table table-striped table-bordered " style="margin-top:2%">
			<thead>
				<tr>
					<th>Code</th>
					<th>User</th>
					<th>Sertifikat</th>
					<th>Kapal</th>
					<th>Pemberi</th>
					<th>Tanggal Pemberian</th>
					<th>Tanggal Berlaku</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data_berlaku as $t) { ?>
					<tr>
						<td><?php echo $t['berlakuCode']; ?></td>
						<td><?php echo $t['userNama']; ?></td>
						<td><?php echo $t['sertifikatNama']; ?></td>
						<td><?php echo $t['kapalNama']; ?></td>
						<td><?php echo $t['pemberiNama']; ?></td>
						<td><?php echo $t['berlakuTanggalAwal']; ?></td>
						<td><?php echo $t['berlakuTanggalAkhir']; ?></td>
						<td>
							<a href="<?php echo site_url('data_kapal/editsertifikat/' . $t['berlakuCode'] . '/' . $kapalCode); ?>" class="badge badge-warning">Edit</a> |
							<a href="<?php echo site_url('data_kapal/removesertifikat/' . $t['berlakuCode'] . '/' . $kapalCode); ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>