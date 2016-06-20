<?php
	class Point extends AppModel {
		public $name = 'Point';
		var $belongsTo = array(
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'user_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			),
			'Subject' => array(
				'className' => 'Subject',
				'foreignKey' => 'subject_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			),
			'Year' => array(
				'className' => 'Year',
				'foreignKey' => 'year_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			),
			'Classroom' => array(
				'className' => 'Classroom',
				'foreignKey' => 'classroom_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
	}
?>