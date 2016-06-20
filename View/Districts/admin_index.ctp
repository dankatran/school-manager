<div>
	<legend>Danh sách quận huyện</legend>
	<div>
	<table class="table table-stripped">
		<tr>
			<th>
				ID
			</th>
			<th>
				Tên quận huyện
			</th>
			<th>
				Mã quận huyện
			</th>
			<th>
				Hoạt động
			</th>
		</tr>
		<?php
			foreach ($districts as $key => $d) {
				echo '<tr>';
					echo '<td>';
						echo $d['District']['id'];
					echo '</td>';
					echo '<td>';
						echo $d['District']['name'];
					echo '</td>';
					echo '<td>';
						echo $d['District']['slug'];
					echo '</td>';
					echo '<td>';
						echo $this->Html->link(__('', true), array('controller' => 'districts', 'action' => 'edit', $d['District']['id']), array('class' => 'icon-pencil icon-large', 'data-title' => 'Sửa '.$d['District']['name'].''));
					echo '</td>';
				echo '</tr>';
			}
		?>
	</table>
	<?php echo $this->Html->link(__('Thêm quận huyện', true), array('controller' => 'districts', 'action' => 'add'), array('class' =>'btn btn-success')); ?>
</div>
</div>