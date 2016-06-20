<legend>Sửa thông tin lớp học</legend>
<?php 
	echo $this->Form->create('Classroom');
	echo $this->Form->input('id');
	echo $this->Form->input('name', $options = array(
		'label' => 'Tên lớp học'
	));
	echo $this->Form->input('slug', $options = array(
		'label' => 'Mã lớp học'
	));
	echo $this->Form->input('year_id', $options = array(
		'label' => 'Năm học'
	));
	echo $this->Form->input('user_id', $options = array(
		'empty' => 'Giáo viên chủ nhiệm',
		'label' => 'Giáo viên chủ nhiệm'
	));
	echo $this->Form->end($options = array(
		'label' => 'Xác nhận',
		'div' => false,
		'class' => 'btn btn-success'
	));
?>