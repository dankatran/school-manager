<div>
	<h2>Thêm tiết học</h2>
	<?php
		echo $this->Form->create('Time');
		echo $this->Form->input('name', array(
			'class' => 'form-control',
			'required' => true
		));
		echo $this->Form->input('start', array(
			'class' => 'form-control',
			'required' => true
		));
		echo $this->Form->input('end', array(
			'class' => 'form-control',
			'required' => true
		));
		$options = array('label' => __('Submit'), 'class' => 'btn btn-primary', 'div' => false);
        echo $this->Form->end($options);
	?>
</div>