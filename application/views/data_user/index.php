<div class="row">
	<div class="col card23">
		<div class="row" style="margin:2%">
			<a href="<?php echo site_url('data_user/add'); ?>" class="badge badge-success">Tambah</a>
		</div>
		<table class="table table-striped table-bordered " style="margin-top:2%">
			<thead>
				<tr>
					<th>Code</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Level</th>
					<th>No Hp</th>
					<th>Status Aktif</th>
					<th>Status Notif</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data_user as $t) { ?>
					<tr>
						<td><?php echo $t['userCode']; ?></td>
						<td><?php echo $t['username']; ?></td>
						<td><?php echo $t['userNama']; ?></td>
						<td><?php echo $t['userEmail']; ?></td>
						<td><?php if ($t['userLevel'] == 1) {
								echo "Administrator";
							} else {
								echo "Member";
							} ?>
						</td>

						<td><?php echo $t['userNoHP']; ?></td>
						<td><?php if ($t['userAktif'] == 1) { ?>
								<p class="badge badge-success">Aktif</p>
							<?php } else { ?>
								<p class="badge badge-danger">Tidak Aktif</p>

							<?php } ?>
						</td>
						<td><?php if ($t['userNotif'] == 1) { ?>
								<p class="badge badge-success">Aktif</p>
							<?php } else { ?>
								<p class="badge badge-danger">Tidak Aktif</p>

							<?php } ?>
						</td>
						<td>
							<a href="<?php echo site_url('data_user/edit/' . $t['userCode']); ?>" class="badge badge-warning">Edit</a> |
							<a href="<?php echo site_url('data_user/remove/' . $t['userCode']); ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a> |
							<a href="<?php echo site_url('data_user/ganpass/' . $t['userCode']); ?>" class="badge badge-primary">Ganti Pass</a> |
							<?php if ($t['userAktif'] == 1) {
							?>
								<a href="<?php echo site_url('data_user/nonaktif/' . $t['userCode']); ?>" class="badge badge-danger">Non Aktifkan Akun</a>
							<?php
							} else { ?>
								<a href="<?php echo site_url('data_user/aktif/' . $t['userCode']); ?>" class="badge badge-success">Aktifkan Akun</a>
							<?php } ?>
							<?php if ($t['userNotif'] == 1) {
							?>
								<a href="<?php echo site_url('data_user/nonaktifnotif/' . $t['userCode']); ?>" class="badge badge-danger">Non Aktifkan Notif</a>
							<?php
							} else { ?>
								<a href="<?php echo site_url('data_user/aktifnotif/' . $t['userCode']); ?>" class="badge badge-success">Aktifkan Notif</a>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>