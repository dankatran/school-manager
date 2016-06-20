<legend>Thời khóa biểu lớp <?php echo $classroom['Classroom']['name']; ?></legend>
<div role="tabpanel">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
			<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Học kỳ I</a>
		</li>
		<li role="presentation">
			<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Học kỳ II</a>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">
			<div class="table-responsive">
				<?php if(!empty($classroom['Schedule'])) {?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th><i class="glyphicon glyphicon-time"></i>Thời gian</th>
								<th>Thứ 2</th>
								<th>Thứ 3</th>
								<th>Thứ 4</th>
								<th>Thứ 5</th>
								<th>Thứ 6</th>
								<th>Thứ 7</th>
								<th>Chủ Nhật</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($times as $key => $t){ ?>
								<tr class="tr">
									<td>
										<?php 
											$start = explode(':', $t['Time']['start']);
											$end = explode(':', $t['Time']['end']);
											echo $start[0].':'.$start[1].' - '.$end[0].':'.$end[1];
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==1 && $s['Schedule']['semester'] == 1){
													echo $s['Subject']['name'].' ';
													echo '<i class="glyphicon glyphicon-edit" data-toggle="collapse" data-target="#'.$s['Schedule']['id'].'"></i>';
													echo '<div id="'.$s['Schedule']['id'].'" class="collapse">';
														echo $this->Form->create('Schedule', $options = array(
															'class' => 'schedule',
															'url' => array(
																'controller' => 'schedules',
																'action' => 'edit',
																$s['Schedule']['id']
															)
														));
														echo $this->Form->input('id', $options = array(
															'value' => $s['Schedule']['id']
														));
														echo $this->Form->input('subject_id', $options = array(
															'label' => false,
															'class' => 'form-control',
															'empty' => 'Chọn môn học',
															'onchange' => 'this.form.submit()'
														));
														echo $this->Form->end($options = array(
															'label' => 'Sửa',
															'div' => false,
															'class' => 'btn btn-info',
															'type' => 'hidden'
														));
													echo '</div>';
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==2 && $s['Schedule']['semester'] == 1){
													echo $s['Subject']['name'].' ';
													echo '<i class="glyphicon glyphicon-edit" data-toggle="collapse" data-target="#'.$s['Schedule']['id'].'"></i>';
													echo '<div id="'.$s['Schedule']['id'].'" class="collapse">';
														echo $this->Form->create('Schedule', $options = array(
															'class' => 'schedule',
															'url' => array(
																'controller' => 'schedules',
																'action' => 'edit',
																$s['Schedule']['id']
															)
														));
														echo $this->Form->input('id', $options = array(
															'value' => $s['Schedule']['id']
														));
														echo $this->Form->input('subject_id', $options = array(
															'label' => false,
															'class' => 'form-control',
															'empty' => 'Chọn môn học',
															'onchange' => 'this.form.submit()'
														));
														echo $this->Form->end($options = array(
															'label' => 'Sửa',
															'div' => false,
															'class' => 'btn btn-info',
															'type' => 'hidden'
														));
													echo '</div>';
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==3 && $s['Schedule']['semester'] == 1){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==4 && $s['Schedule']['semester'] == 1){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==5 && $s['Schedule']['semester'] == 1){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==6 && $s['Schedule']['semester'] == 1){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==7 && $s['Schedule']['semester'] == 1){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } ?>
			</div>
		</div>
		<!--Học kỳ 2-->
		<div role="tabpanel" class="tab-pane" id="tab">
			<div class="table-responsive">
				<?php if(!empty($classroom['Schedule'])) {?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th><i class="glyphicon glyphicon-time"></i>Thời gian</th>
								<th>Thứ 2</th>
								<th>Thứ 3</th>
								<th>Thứ 4</th>
								<th>Thứ 5</th>
								<th>Thứ 6</th>
								<th>Thứ 7</th>
								<th>Chủ Nhật</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($times as $key => $t){ ?>
								<tr>
									<td>
										<?php 
											$start = explode(':', $t['Time']['start']);
											$end = explode(':', $t['Time']['end']);
											echo $start[0].':'.$start[1].' - '.$end[0].':'.$end[1];
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==1 && $s['Schedule']['semester'] == 2){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==2 && $s['Schedule']['semester'] == 2){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==3 && $s['Schedule']['semester'] == 2){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==4 && $s['Schedule']['semester'] == 2){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==5 && $s['Schedule']['semester'] == 2){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==6 && $s['Schedule']['semester'] == 2){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
									<td>
										<?php 
											foreach ($schedules as $key => $s) { 
												if($s['Schedule']['time_id']==$t['Time']['id'] && $s['Schedule']['date']==7 && $s['Schedule']['semester'] == 2){
													echo $s['Subject']['name'];
												}
											} 
										?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- <script>
	var frm = $('#ScheduleEditForm');
	$(document).ready(function(e) {
	  	$(".form-control").on('change', function() {
		    //var url = "/schedules/edit/<?php echo $s['Schedule']['id']; ?>";
		    $.ajax({
		      type: frm.attr('method'),
		      url: frm.attr('action'),
		      data: frm.serialize(),
		      success: function(data) {
		          // $(".table").load("/classrooms/schedules/<?php echo $classroom['Classroom']['slug'].'/'.$classroom['Year']['slug']; ?> .tr")
		       
		      	$("body").html(data);
		      	}
		    });
	  	});
	});
</script> -->