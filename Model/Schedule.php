<?php
	class Schedule extends AppModel {
		public $name = 'Schedule';
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
			'Subject' => array(
				'className' => 'Subject',
				'foreignKey' => 'subject_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			),
			'Time' => array(
				'className' => 'Time',
				'foreignKey' => 'time_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
	}