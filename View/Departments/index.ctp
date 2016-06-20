<legend><i class="glyphicon glyphicon-th-large"></i> Tổ chuyên môn</legend>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Tên tổ</th>
				<th><i class="fa fa-code"></i> Mã tổ</th>
				<th><i class="glyphicon glyphicon-user"></i> Tổ trưởng</th>
				<th>Số giáo viên</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($departments as $key => $d) { ?>
				<tr>
					<td>
						<?php echo $key+1; ?>
					</td>
					<td>
						<?php echo $d['Department']['name']; ?>
					</td>
					<td>
						<?php echo $d['Department']['slug']; ?>
					</td>
					<td>
						<?php echo $this->Html->link($d['User']['name'], array('plugin' => 'users', 'controller' => 'users', 'action' => 'view', 'username' => $d['User']['username'])); ?>
					</td>
					<td>
						<?php 
							$i = 0;
							foreach ($teachers as $key => $t) {
								if($t['User']['department_id'] == $d['Department']['id']){
									$i += count($t['User']['id']);
								}
							}
							echo $this->Html->link('<i class="glyphicon glyphicon-fullscreen"></i> '.$i, array(
								'plugin' => '',
								'controller' => 'departments',
								'action' => 'view',
								'id' => $d['Department']['id'],
								'slug' => $d['Department']['slug']
							), array(
								'escape' => false
							));
						?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>