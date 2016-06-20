<div>
	<legend>Danh sách môn học</legend>
	<table class="table table-stripped">
		<tr>
			<th>
				ID
			</th>
			<th>
				Tên môn học
			</th>
			<th>
				Mã môn học
			</th>
			<th>
				Hoạt động
			</th>
		</tr>	
		<?php 
			foreach ($subjects as $key => $sub) {
				echo '<tr>';
					echo '<td>';
						echo $sub['Subject']['id'];
					echo '</td>';
					echo '<td>';
						echo $sub['Subject']['name'];
					echo '</td>';
					echo '<td>';
						echo $sub['Subject']['slug'];
					echo '</td>';
					echo '<td>';
						echo $this->Html->link(__('', true), array('controller' => 'subjects', 'action' => 'edit', $sub['Subject']['id']), array('class' => 'icon-pencil icon-large', 'data-title' => 'Sửa môn '.$sub['Subject']['name'].''));
					echo '</td>';
				echo '<tr>';
			}
		?>
	</table>
	<?php 
		echo $this->Html->link(__('Thêm môn học', true), array('controller' => 'subjects', 'action' => 'add'), array('class' => 'btn btn-success'));
	?>
</div>