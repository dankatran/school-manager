<div>
	<legend>Sửa môn học</legend>
	<?php 
		echo $this->Form->create('Subject');
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Nhập tên môn học', 'label' => 'Tên môn học'));
		echo $this->Form->input('slug', array('class' => 'form-control', 'placeholder' => 'Nhập mã môn học', 'label' => 'Mã môn học'));
		echo $this->Form->end(array('label' => 'Sửa', 'class' => 'btn btn-primary', 'div' => false));
	?>
</div>