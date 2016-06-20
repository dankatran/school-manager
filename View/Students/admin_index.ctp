<div>
	<legend>Danh sách học sinh</legend>
	<table class="table table-stripped">
		<tr>
			<th>
				ID
			</th>
			<th>
				Họ tên
			</th>
			<th>
				Trường học
			</th>
			<th>
				Lớp học
			</th>
			<th>
				Địa chỉ
			</th>
			<th>
				Hoạt động
			</th>
		</tr>
		<?php
			foreach ($students as $key => $s) {
				echo '<tr>';
					echo '<td>';
						echo $s['Student']['id'];
					echo '</td>';
					echo '<td>';
						echo $s['Student']['name'];
					echo '</td>';
					echo '<td>';
						echo $s['Student']['code'];
					echo '</td>';
					echo '<td>';
						if($s['Student']['type'] == 1){
							echo 'THPT';
						}else if($s['Student']['type'] == 2) {
							echo 'THCS';
						}else{
							echo 'Tiểu học';
						}
					echo '</td>';
					echo '<td>';
						echo $s['Student']['address'].' - '.$s['District']['name'].' - '.$s['City']['name'];
					echo '</td>';
					echo '<td>';
						echo $this->Html->link(__('', true), array('controller' => 'Students', 'action' => 'edit', $s['Student']['id']), array('class' => 'icon-pencil icon-large', 'data-title' => 'Sửa '.$s['Student']['name'].''));	
					echo '</td>';
				echo '</tr>';
			}
		?>
	</table>
	<?php echo $this->Html->link(__('Thêm học sinh', true), array('controller' => 'Students', 'action' => 'add'), array('class' =>'btn btn-success')); ?>
</div>