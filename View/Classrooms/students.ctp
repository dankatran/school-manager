<legend>Danh sách học sinh lớp <?php echo $classroom['Classroom']['name']; ?></legend>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th><i class="glyphicon glyphicon-user"></i></th>
				<th>Chức vụ</th>
				<th>Thông tin liên lạc</th>
				<th><i class="glyphicon glyphicon-calendar"></i> Sinh nhật</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($students as $key => $s) {
			?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td>
						<?php 
							echo $this->Html->link($s['User']['name'], array(
								'plugin' => 'users',
								'controller' => 'users',
								'action' => 'view',
								'username' => $s['User']['username']
							)); 
						?>
						</td>
						<td>
							<?php
								if($s['User']['position'] == 1){
									echo 'Bí thư chi đoàn';
								}
								if($s['User']['position'] == 2){
									echo 'Phó Bí thư';
								}
								if($s['User']['position'] == 3){
									echo 'Ủy viên';
								}
								if($s['User']['position'] == 4){
									echo 'Lớp trưởng';
								}
								if($s['User']['position'] == 5){
									echo 'Lớp phó học tập';
								}
								if($s['User']['position'] == 6){
									echo 'Lớp phó văn thể mỹ';
								}
								if($s['User']['position'] == 7){
									echo 'Lớp phó lao động';
								}
								if($s['User']['position'] == 8){
									echo 'Thủ quỹ';
								}
							?>
						</td>
						<td>
							<?php 
								echo '<i class="glyphicon glyphicon-map-marker"></i> '.$s['User']['address'].'<br>'; 
								echo '<i class="glyphicon glyphicon-phone"></i> '.$s['User']['phone'].'<br>';
								echo '<i class="fa fa-envelope"></i> '.$s['User']['email']
							?>
						</td>
						<td><?php echo $s['User']['birthday']; ?></td>
					</tr>
			<?php } ?>
		</tbody>
	</table>
</div>