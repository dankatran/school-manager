<h4>Liên hệ</h4>
<?php 
	echo $this->Form->create('Message', array(
		'url' => array(
			'plugin' => 'contacts',
			'controller' => 'contacts',
			'action' => 'view',
			//$contact['Contact']['alias'],
		),
	));
	echo $this->Form->input('Message.name', array(
		'label' => false,
		'class' => 'form-control',
		'placeholder' => 'Tên của bạn',
	));
	echo $this->Form->input('Message.email', array(
		'label' => false,
		'class' => 'form-control',
		'placeholder' => 'Địa chỉ email',
	));
	echo $this->Form->input('Message.title', array(
		'label' => false,
		'class' => 'form-control',
		'placeholder' => 'Tiêu đề',
	));
	echo $this->Form->input('Message.body', array(
		'label' => false,
		'class' => 'form-control',
		'placeholder' => 'Nội dung',
	));
	echo $this->Form->end(array(
		'class' => 'btn btn-default',
		'div' => false,
		'label' => 'Gửi'
	));
?>