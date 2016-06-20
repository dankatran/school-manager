<div>
	<legend>Danh sách năm học</legend>
	<table class="table table-stripped">
		<tr>
			<th>
				ID
			</th>
			<th>
				Tên năm học
			</th>
			<th>
				Mã năm học
			</th>
			<th>
				Hoạt động
			</th>
		</tr>
		<?php
			foreach ($years as $key => $y) {
				echo '<tr>';
					echo '<td>';
						echo $y['Year']['id'];
					echo '</td>';
					echo '<td>';
						echo $y['Year']['name'];
					echo '</td>';
					echo '<td>';
						echo $y['Year']['slug'];
					echo '</td>';
					echo '<td>';
						echo $this->Html->link(__('', true), array('controller' => 'years', 'action' => 'edit', $y['Year']['id']), array('class' => 'icon-pencil icon-large', 'data-title' => 'Sửa năm học '.$y['Year']['name'].''));
					echo '</td>';
				echo '</tr>';
			}
		?>
	</table>
	<?php echo $this->Html->link(__('Thêm năm học', true), array('controller' => 'years', 'action' => 'add'), array('class' =>'btn btn-success')); ?>
</div>