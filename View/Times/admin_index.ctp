<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên tiết học</th>
				<th>Thời gian bắt đầu</th>
				<th>Thời gian kết thúc</th>
				<th>Hoạt động</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($times as $key => $t) {
			?>
				<tr>
					<td><?php echo $t['Time']['id']; ?></td>
					<td><?php echo $t['Time']['name']; ?></td>
					<td><?php echo $t['Time']['start']; ?></td>
					<td><?php echo $t['Time']['end']; ?></td>
					<td>
						<?php
							echo $this->Html->link(__('', true), array('controller' => 'times', 'action' => 'edit', $t['Time']['id']), array('class' => 'icon-pencil icon-large', 'data-title' => 'Sửa '.$t['Time']['name'].''));
						?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>