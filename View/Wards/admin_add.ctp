<legend>Thêm xã phường</legend>
<?php
	echo $this->Form->create('Ward');
	echo $this->Form->input('name');
	echo $this->Form->input('slug');
	echo $this->Form->input('district_id', array(
		'empty' => 'Chọn quận huyện',
		'label' => false
	));
	echo $this->Form->end(array(
		'class' => 'btn btn-primary',
		'div' => false,
		'label' => 'Thêm'
	))
?>