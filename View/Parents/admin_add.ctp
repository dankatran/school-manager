<legend>Thêm phụ huynh</legend>
<?php
	echo $this->Form->create('Parent');
	echo $this->Form->input('name');
	echo $this->Form->input('username');
	echo $this->Form->input('password', $options = array(
		'type' => 'password'
	));
	echo $this->Form->input('re_pass',array(
		"type"=>"password"
	));
	echo $this->Form->input('email', $options = array());
	echo $this->Form->end($options = array(
		'label' => "Thêm",
		'div' => false,
		'class' => 'btn-success'
	));