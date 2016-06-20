<div>
	<legend>Danh sách lớp học</legend>
	<div>
		<table class="table table-stripped">
			<tr>
				<th>
					ID
				</th>
				<th>
					Tên lớp
				</th>
				<th>
					Mã lớp
				</th>
				<th>
					Niên khóa
				</th>
				<th>
					Hoạt động
				</th>
			</tr>
			<?php
				foreach ($classrooms as $key => $c) {
					echo '<tr>';
						echo '<td>';
							echo $c['Classroom']['id'];
						echo '</td>';
						echo '<td>';
							echo $c['Classroom']['name'];
						echo '</td>';
						echo '<td>';
							echo $c['Classroom']['slug'];
						echo '</td>';
						echo '<td>';
							echo $c['Year']['name'];
						echo '</td>';
						echo '<td>';
							echo $this->Html->link(__('', true), array('controller' => 'Classrooms', 'action' => 'edit', $c['Classroom']['id']), array('class' => 'icon-pencil icon-large', 'data-title' => 'Sửa '.$c['Classroom']['name'].''));
						echo '</td>';
					echo '</tr>';
				}
			?>
		</table>
		<?php echo $this->Html->link(__('Thêm lớp học', true), array('controller' => 'Classrooms', 'action' => 'add'), array('class' =>'btn btn-success')); ?>
	</div>
</div>