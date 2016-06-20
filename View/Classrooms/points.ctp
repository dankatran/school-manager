<legend><i class="fa fa-list-ol"></i> Điểm thi lớp <?php echo $classroom['Classroom']['name']; ?> - Năm học: <?php echo $classroom['Year']['name']; ?></legend>
<div role="tabpanel">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
			<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Học kỳ I</a>
		</li>
		<li role="presentation">
			<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Học kỳ II</a>
		</li>
		<li role="presentation">
			<a href="#year" aria-controls="year" role="tab" data-toggle="tab">Tổng kết năm học</a>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">
			<div class="table-responsive">
				<?php if(!empty($classroom['Point'])) {?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th><i class="glyphicon glyphicon-user"></i> Học sinh</th>
								<?php foreach ($subjects as $key => $sub) { ?>
									<th><?php echo $sub['Subject']['name']; ?></th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($students as $key => $s) { ?>
								<tr>
									<td><?php echo $key + 1; ?></td>
									<td>
										<?php 
											echo $this->Html->link($s['User']['name'], array('plugin' => 'users','controller' => 'users', 'action' => 'point', 'classid' => $classroom['Classroom']['id'].'-'.$classroom['Classroom']['slug'], 'slug' => $s['User']['username']));
										?>
									</td>
									<?php foreach ($subjects as $key => $sub) { ?>
										<td class="text-center">
											<?php 
												foreach ($classroom['Point'] as $key => $p) { 
													if($p['user_id']==$s['User']['id'] && $p['semester']==1 && $p['subject_id']==$sub['Subject']['id']){
														if($p['type']==1){
															echo '<span class="btn-primary">'.$p['point'].'</span>';
														}
														if($p['type']==2){
															echo '<span class="btn-success">'.$p['point'].'</span>';
														}
														if($p['type']==3){
															echo '<span class="btn-warning">'.$p['point'].'</span>';
														}
														if($p['type']==4){
															echo '<span class="btn-danger">'.$p['point'].'</span>';
														}
											 		} 
											 	}
											?>
										</td>
									<?php } ?>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } ?>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="tab">
			<div class="table-responsive">
				<?php if(!empty($classroom['Point'])) {?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Học sinh</th>
								<?php foreach ($subjects as $key => $sub) { ?>
									<th><?php echo $sub['Subject']['name']; ?></th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($students as $key => $s) { ?>
								<tr>
									<td><?php echo $key + 1; ?></td>
									<td><?php echo $s['User']['name']; ?></td>
									<?php foreach ($subjects as $key => $sub) { ?>
										<td class="text-center">
											<?php 
												foreach ($classroom['Point'] as $key => $p) { 
													if($p['user_id']==$s['User']['id'] && $p['semester']==2 && $p['subject_id']==$sub['Subject']['id']){
														if($p['type']==1){
															echo '<span class="btn-primary">'.$p['point'].'</span>';
														}
														if($p['type']==2){
															echo '<span class="btn-success">'.$p['point'].'</span>';
														}
														if($p['type']==3){
															echo '<span class="btn-warning">'.$p['point'].'</span>';
														}
														if($p['type']==4){
															echo '<span class="btn-danger">'.$p['point'].'</span>';
														}
											 		} 
											 	}
											?>
										</td>
									<?php } ?>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } ?>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="year">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>#</th>
						<th>Học sinh</th>
						<?php foreach ($subjects as $key => $sub) { ?>
							<th><?php echo $sub['Subject']['name']; ?></th>
						<?php } ?>
					</thead>
					<tbody>
						<?php foreach ($students as $key => $s) { ?>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $s['User']['name']; ?></td>
								
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>