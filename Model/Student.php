<?php
	class Student extends AppModel {
		public $name = 'Student';
		var $belongsTo = array(
			'Classroom' => array(
				'className' => 'Classroom',
				'foreignKey' => 'classroom_id',
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
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'user_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
		public $hasMany = array(
			'Point' => array(
				'className' => 'Point',
				'foreignKey' => 'student_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
			)
		);
	}
?>