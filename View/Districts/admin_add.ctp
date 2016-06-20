<div>
	<legend>Thêm quận huyện</legend>
	<?php 
		echo $this->Form->create('District');
		echo $this->Form->input('name', array('class' => 'form-control col-md-6', 'label' => false, 'placeholder' => 'Tên quận huyện'));
		echo $this->Form->input('slug', $options = array('class' => 'form-control', 'label' => false, 'placeholder' => 'Mã quận huyện'));
		echo $this->Form->end(array('label' => 'Thêm', 'class' =>'btn btn-primary', 'div' => false));
	?>
</div>