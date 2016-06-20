<legend><i class="glyphicon glyphicon-th-list"></i> Danh sách giáo viên</legend>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th><i class="glyphicon glyphicon-user"></i> Họ tên</th>
				<th>Tổ chuyên môn</th>
				<th>Trường tốt nghiệp</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($teachers as $key => $t) { ?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $t['Teacher']['name']; ?></td>
					<td><?php echo $t['Department']['name']; ?></td>
					<td><?php echo $t['Teacher']['university'].' - '.$t['Subject']['name']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>