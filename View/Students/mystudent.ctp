<div class="col-md-12">
	<legend><i class="glyphicon glyphicon-education"></i> Thông tin học sinh</legend>	
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th><i class="glyphicon glyphicon-user"></i></th>
					<td>Lớp học</td>
					<td>Năm học</td>
					<td><i class="glyphicon glyphicon-info-sign"></i> Thông tin</td>
					<td><i class="glyphicon glyphicon-pushpin"></i> Hành động</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($students as $key => $s) {
				?>
					<tr>
						<td><?php echo $s['Student']['name']; ?></td>
						<td><?php echo $s['Classroom']['name']; ?></td>
						<td><?php echo $s['Year']['name']; ?></td>
						<td>
							<?php 
								echo '<i class="glyphicon glyphicon-home"></i> '.$s['Student']['address']; 
								echo '<br><i class="glyphicon glyphicon-envelope"></i> '.$s['User']['email'];
								echo '<br><i class="glyphicon glyphicon-phone"></i> '.$s['Student']['phone'];
								echo '<br><i class="glyphicon glyphicon-calendar"></i> '.$s['Student']['birthday'];
							?>
						</td>
						<td>
							<?php 
								echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i>', array('plugin' => '', 'controller' => 'students', 'action' => 'edit', $s['Student']['id']), array('escape' => false, 'title' => 'Sửa thông tin', 'data-toggle' => 'tooltip')).' | ';
								echo $this->Html->link('<i class="fa fa-table"></i>', array('plugin' => '', 'controller' => 'classrooms', 'action' => 'schedule', 'slug' => $s['Classroom']['slug'].'/'.$s['Year']['slug']), array('escape' => false, 'title' => 'Xem thời khóa biểu', 'data-toggle' => 'tooltip')).' | ';
								echo $this->Html->link('<i class="fa fa-list-ol"></i>', array('plugin' => '', 'controller' => 'students', 'action' => 'point', 'slug' => $s['Student']['id'].'-'.$s['Student']['code'].'/'.$s['Year']['slug']), array('escape' => false, 'title' => 'Xem điểm', 'data-toggle' => 'tooltip'));
							?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();   
	});
</script>