<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Lớp học</th>
			<th>Năm học</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($schedules as $key => $s) {
		?>
			<tr>
				<td><?php echo $key + 1; ?></td>
				<td>
					<?php
						echo $this->Html->link(__($s['Classroom']['name']), array('controller'=>'classrooms', 'action'=>'schedule', 'slug' => $s['Classroom']['slug'].'/'.$s['Year']['slug']));
					?>
				</td>
				<td><?php echo $s['Year']['name'];?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>