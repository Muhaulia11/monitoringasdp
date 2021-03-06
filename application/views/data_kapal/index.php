<div class="row">
	<div class="col card23">
		<div class="row" style="margin:2%">
			<a href="<?php echo site_url('data_kapal/add'); ?>" class="badge badge-success">Tambah</a>
		</div>
		<table class="table table-striped table-bordered " style="margin-top:2%">
			<thead>
				<tr>
					<th>Code</th>
					<th>Nama Kapal</th>
					<th>Bendera</th>
					<th>Isi Kotor</th>
					<th>HP-ME</th>
					<th>Tahun Pembuatan</th>
					<th>Nahkoda</th>
					<th>Jumlah Crew</th>
					<th>Lintasan</th>
					<th>Pemilik</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data_kapal as $t) { ?>
					<tr>
						<td><?php echo $t['kapalCode']; ?></td>
						<td><?php echo $t['kapalNama']; ?></td>
						<td><?php echo $t['kapalBendera']; ?></td>
						<td><?php echo $t['kapalIsiKotor']; ?></td>
						<td><?php echo $t['kapalHP-ME']; ?></td>
						<td><?php echo $t['kapalTahunPembuatan']; ?></td>
						<td><?php echo $t['kapalNahkoda']; ?></td>
						<td><?php echo $t['kapalJumlahCrew']; ?> Orang</td>
						<td><?php echo $t['kapalLintasan']; ?></td>
						<td><?php echo $t['kapalPemilik']; ?></td>
						<td>
							<a href="<?php echo site_url('data_kapal/edit/' . $t['kapalCode']); ?>" class="badge badge-warning">Edit</a> |
							<a href="<?php echo site_url('data_kapal/remove/' . $t['kapalCode']); ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a> |
							<a href="<?php echo site_url('data_kapal/sertifikat/' . $t['kapalCode']); ?>" class="badge badge-primary">Sertifikat</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>