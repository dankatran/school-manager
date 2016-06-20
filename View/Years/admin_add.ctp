<div>
	<legend>Thêm năm học</legend>
	<?php 
		echo $this->Form->create('Year');
		echo $this->Form->input('name', array('class' => 'form-control col-md-6', 'label' => false, 'placeholder' => 'Tên năm học'));
		echo $this->Form->input('slug', $options = array('class' => 'form-control', 'label' => false, 'placeholder' => 'Mã năm học'));
		echo $this->Form->end(array('label' => 'Thêm', 'class' =>'btn btn-primary', 'div' => false));
	?>
</div>