<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Lớp học</th>
			<th>Năm học</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($points as $key => $p) { ?>
			<tr>
				<td><?php echo $key + 1; ?></td>
				<td>	
					<?php 
						echo $this->Html->link($p['Classroom']['name'], array('controller' => 'classrooms', 'action' => 'points', 'slug' => $p['Classroom']['slug'].'/'.$p['Year']['slug']));
					?>
				</td>
				<td><?php echo $p['Year']['name']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>