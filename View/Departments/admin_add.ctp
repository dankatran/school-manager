<legend>Thêm phòng ban</legend>
<?php
	echo $this->Form->create('Department');
	echo $this->Form->input('name', $options = array('label' => false, 'placeholder' => 'Tên phòng ban'));
	echo $this->Form->input('slug', $options = array('label' => false, 'placeholder' => 'Mã phòng ban'));
	echo $this->Form->input('user_id', $options = array('label' => false, 'empty' => 'Trưởng phòng'));
	echo $this->Form->end(array('label' => 'Thêm', 'class' => 'btn btn-primary', 'div' => false));
?>