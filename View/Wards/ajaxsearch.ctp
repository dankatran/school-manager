<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Xã phường</th>
			<th>Mã xã phường</th>
			<th>Quận huyện</th>
			<th>Mã quận huyện</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($wards as $key => $w) { ?>
			<tr>
				<td><?php echo $w['Ward']['id']; ?></td>
				<td><?php echo $w['Ward']['name']; ?></td>
				<td><?php echo $w['Ward']['slug']; ?></td>
				<td><?php echo $w['District']['name']; ?></td>
				<td><?php echo $w['District']['slug']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>