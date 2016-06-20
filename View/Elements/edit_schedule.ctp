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