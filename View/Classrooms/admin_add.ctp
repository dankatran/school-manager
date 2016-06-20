<div>
	<legend>Thêm lớp học</legend>
	<?php 
		echo $this->Form->create('Classroom');
		echo $this->Form->input('name', $options = array('label' => false, 'placeholder' => 'Tên lớp học'));
		echo $this->Form->input('slug', $options = array('label' => false, 'placeholder' => 'Mã lớp học'));
		echo $this->Form->input('year_id', $options = array('label' => false, 'empty' => 'Chọn năm học'));
		echo $this->Form->input('user_id', $options = array(
			'empty' => 'Giáo viên chủ nhiệm',
			'label' => false
		));
		echo $this->Form->end($options = array('label' => 'Thêm', 'div' => false, 'class' => 'btn btn-primary'));
	?>
</div>