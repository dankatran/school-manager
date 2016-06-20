<legend><i class="fa fa-list-ol"></i> Điểm thi của <?php echo $students['Student']['name']; ?></legend>
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
				<?php if(!empty($student['Point'])) {?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Môn học</th>
								<th>Kiểm tra miệng</th>
								<th>Kiểm tra 15 phút</th>
								<th>Kiểm tra 1 tiết</th>
								<th>Kiểm tra học kỳ</th>
								<th>Tổng kết HK I</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($subjects as $key => $sub) { ?>
								<tr>
									<td><?php echo $sub['Subject']['name']; ?></td>
									<td>
										<?php 
											$number_mouth = 0;
											$total_mouth = 0;
											foreach ($student['Point'] as $key => $p) { 
										?>
											<?php
												if($p['subject_id'] == $sub['Subject']['id'] && $p['type'] == 1 && $p['semester'] == 1){
													$number_mouth += count($p['id']);
													$total_mouth += $p['point'];
													echo '<span class="btn-primary">'.$p['point'].'</span>';
												}
											?>
										<?php } ?>
										<?php 
											if($number_mouth != 0){
												$mouth = $total_mouth/$number_mouth;
												//echo '<br>TB: '.$mouth; 
											}
										?>
									</td>
									<td>
										<?php 
											$number_minute = 0;
											$total_minute = 0;
											foreach ($student['Point'] as $key => $p) { 
										?>
											<?php
												if($p['subject_id'] == $sub['Subject']['id'] && $p['type'] == 2 && $p['semester'] == 1){
													$number_minute += count($p['id']);
													$total_minute += $p['point'];
													echo '<span class="btn-success">'.$p['point'].'</span>';
												}
											?>
										<?php } ?>
										<?php 
											if($number_minute != 0){
												$minute = $total_minute/$number_minute;
												//echo '<br>TB: '.$minute; 
											}
										?>
									</td>
									<td>
										<?php 
											$number_hour = 0;
											$total_hour = 0;
											foreach ($student['Point'] as $key => $p) { 
										?>
											<?php
												if($p['subject_id'] == $sub['Subject']['id'] && $p['type'] == 3 && $p['semester'] == 1){
													$number_hour += count($p['id']);
													$total_hour += $p['point'];
													echo '<span class="btn-warning">'.$p['point'].'</span>';
												}
											?>
										<?php } ?>
										<?php 
											if($number_hour != 0){
												$hour = $total_hour/$number_hour;
												//echo '<br>TB: '.$hour; 
											}
										?>
									</td>
									<td>
										<?php 
											$number_semester = 0;
											$total_semester = 0;
											foreach ($student['Point'] as $key => $p) { 
										?>
											<?php
												if($p['subject_id'] == $sub['Subject']['id'] && $p['type'] == 4 && $p['semester'] == 1){
													$number_semester += count($p['id']);
													$total_semester += $p['point'];
													echo '<span class="btn-danger">'.$p['point'].'</span>';
												}
											?>
										<?php } ?>
										<?php 
											if($number_semester != 0){
												$semester = $total_semester/$number_semester;
												//echo '<br>TB: '.$semester; 
											}
										?>
									</td>
									<td>
										<?php 
											$total = $total_mouth + $total_minute + $total_hour*2 + $semester*3;
											$number = $number_mouth + $number_minute + $number_hour*2 + $number_semester*3;
											if($number != 0){
												$hk = $total/$number;
												echo round($hk,2);
											}
										?>
									</td>
								</tr>
							<?php } ?>
								<tr>
									<td colspan="5">
										Tổng kết học kỳ I
									</td>
									<td colspan="1">

									</td>
								</tr>
								<tr>
									<td colspan="5">
										Xếp loại
									</td>
									<td colspan="1">

									</td>
								</tr>
						</tbody>
					</table>
				<?php } else {
					echo 'Chưa có điểm';}
				?>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="tab">
			<div class="table-responsive">
				<?php if(!empty($student['Point'])) {?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Môn học</th>
								<th>Kiểm tra miệng</th>
								<th>Kiểm tra 15 phút</th>
								<th>Kiểm tra 1 tiết</th>
								<th>Kiểm tra học kỳ</th>
								<th>Tổng kết HK II</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($subjects as $key => $sub) { ?>
								<tr>
									<td><?php echo $sub['Subject']['name']; ?></td>
									<td>
										<?php foreach ($student['Point'] as $key => $p) { ?>
											<?php
												if($p['subject_id'] == $sub['Subject']['id'] && $p['type'] == 1 && $p['semester'] == 2){
													echo $p['point'];
												}
											?>
										<?php } ?>
									</td>
									<td>
										<?php foreach ($student['Point'] as $key => $p) { ?>
											<?php
												if($p['subject_id'] == $sub['Subject']['id'] && $p['type'] == 2 && $p['semester'] == 2){
													echo $p['point'];
												}
											?>
										<?php } ?>
									</td>
									<td>
										<?php foreach ($student['Point'] as $key => $p) { ?>
											<?php
												if($p['subject_id'] == $sub['Subject']['id'] && $p['type'] == 3 && $p['semester'] == 2){
													echo $p['point'];
												}
											?>
										<?php } ?>
									</td>
									<td>
										<?php foreach ($student['Point'] as $key => $p) { ?>
											<?php
												if($p['subject_id'] == $sub['Subject']['id'] && $p['type'] == 4 && $p['semester'] == 2){
													echo $p['point'];
												}
											?>
										<?php } ?>
									</td>
									<td></td>
								</tr>
							<?php } ?>
								<tr>
									<td colspan="5">
										Tổng kết học kỳ II
									</td>
									<td colspan="1">

									</td>
								</tr>
						</tbody>
					</table>
				<?php } else {
					echo 'Chưa có điểm';}
				?>
			</div>
		</div>
	</div>
</div>