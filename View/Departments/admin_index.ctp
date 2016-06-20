<legend>Danh sách phòng ban</legend>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên phòng ban</th>
				<th>Mã phòng ban</th>
				<th>Trưởng phòng</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($departments as $key => $d) { ?>
				<tr>
					<td>
						<?php echo $d['Department']['id']; ?>
					</td>
					<td>
						<?php echo $d['Department']['name']; ?>
					</td>
					<td>
						<?php echo $d['Department']['slug']; ?>
					</td>
					<td>
					<?php echo $d['User']['name']; ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>