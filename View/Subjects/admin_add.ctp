<div>
	<legend>Thêm môn học</legend>
	<?php 
		echo $this->Form->create('Subject');
		echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Nhập tên môn học', 'label' => false));
		echo $this->Form->input('slug', array('class' => 'form-control', 'placeholder' => 'Nhập mã môn học', 'label' => false));
		echo $this->Form->end(array('label' => 'Thêm', 'class' => 'btn btn-primary', 'div' => false));
	?>
</div>