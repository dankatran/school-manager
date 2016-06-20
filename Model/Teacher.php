<?php 
	class Teacher extends AppModel{
		public $name = 'Teacher';	
		var $belongsTo = array(
			'District' => array(
				'className' => 'District',
				'foreignKey' => 'district_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			),
			'Ward' => array(
				'className' => 'Ward',
				'foreignKey' => 'ward_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			),
			'Department' => array(
				'className' => 'Department',
				'foreignKey' => 'department_id',
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
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'user_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
	}