<div>
	<h2>Sửa tiết học</h2>
	<?php
		echo $this->Form->create('Time');
		echo $this->Form->input('id');
		echo '<div class="col-md-12">'.$this->Form->input('name', array(
			'class' => 'from-control col-md-12'
		)).'</div>';
		echo '<div class="col-md-12">'.$this->Form->input('start', array(
			'class' => 'form-control col-md-12',
			'required' => true
		)).'</div>';
		echo '<div class="col-md-12">'.$this->Form->input('end', array(
			'class' => 'form-control col-md-12',
			'required' => true
		)).'</div>';
		$options = array('label' => __('Submit'), 'class' => 'btn btn-primary', 'div' => false);
        echo '<div class="col-md-12">'.$this->Form->end($options).'</div>';
	?>
</div>