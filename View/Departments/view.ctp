<legend>Danh sách giáo viên <?php echo $departments['Department']['name']; ?></legend>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Họ tên</th>
				<th>Trường tốt nghiệp</th>
				<th>Chuyên ngành</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($department['User'])){
					foreach ($teachers as $key => $t) {
			?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td>
								<?php 
									echo $this->Html->link($t['User']['name'], array(
										'plugin' => 'users',
										'controller' => 'users',
										'action' => 'view',
										'username' => $t['User']['username']
									)); 
								?>
							</td>
							<td><?php echo $t['User']['university']; ?></td>
							<td><?php echo $t['Subject']['name']; ?></td>
						</tr>
			<?php 
					}
				}else{
					echo 'Không có dữ liệu';
				}
			?>
		</tbody>
	</table>
</div>