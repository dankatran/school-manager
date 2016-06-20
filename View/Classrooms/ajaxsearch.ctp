<div class="table-responsive">
	<table class="table table-hover" id="mt">
		<thead>
			<tr class="header">
				<th>#</th>
				<th>Tên lớp</th>
				<th>Mã lớp</th>
				<th>Năm học</th>
				<th>Giáo viên chủ nhiệm</th>
				<th>Hoạt động</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($classrooms as $key => $c) { ?>
				<tr>
					<td><?php echo $key + 1; ?></td>
					<td><?php echo $c['Classroom']['name']; ?></td>
					<td><?php echo $c['Classroom']['slug'].'-'.$c['Year']['slug']; ?></td>
					<td><?php echo $c['Year']['name']; ?></td>
					<td><?php echo $c['User']['name']; ?></td>
					<td>
						<?php 
							echo $this->Html->link(__(''), array('controller'=>'classrooms', 'action'=>'schedule','slug'=> $c['Classroom']['slug'].'/'.$c['Year']['slug']), array('class'=>'glyphicon glyphicon-calendar','data-toggle'=>'tooltip','title'=>'Thời khóa biểu lớp '.$c['Classroom']['name'].'')).'  '; 
							echo $this->Html->link(__(''), array('controller'=>'classrooms', 'action'=>'students','slug'=> $c['Classroom']['slug'].'/'.$c['Year']['slug']), array('class'=>'glyphicon glyphicon-education','data-toggle'=>'tooltip','title'=>'Học sinh lớp '.$c['Classroom']['name'].'')).' ';
							echo $this->Html->link(__(''), array('controller'=>'classrooms', 'action'=>'points','slug'=> $c['Classroom']['slug'].'/'.$c['Year']['slug']), array('class'=>'glyphicon glyphicon-list-alt','data-toggle'=>'tooltip','title'=>'Xem điểm lớp '.$c['Classroom']['name'].''));
						?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php echo $this->element('pagi'); ?>
</div>