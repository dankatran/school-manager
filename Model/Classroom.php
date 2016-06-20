<?php
	class Classroom extends AppModel {
		public $name = 'Classroom';
		var $belongsTo = array(
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
			'Schedule' => array(
				'className' => 'Schedule',
				'foreignKey' => 'classroom_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
			),
			'Point' => array(
				'className' => 'Point',
				'foreignKey' => 'classroom_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => 'type',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
			),
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'classroom_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => 'name',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
			)
		);

		public $validate = array(
			'slug' => array(
				'isUnique' => array(
					'rule' => 'isUnique',
					'message' => 'Mã lớp học là duy nhất.',
					'last' => true,
				),
				'notEmpty' => array(
					'rule' => 'notBlank',
					'message' => 'Mã lớp học không được để trống.',
					'last' => true,
				)
			),		
		);
	}
?>