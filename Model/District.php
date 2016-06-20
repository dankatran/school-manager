<?php
	class District extends AppModel {
		public $name = 'District';
		public $hasMany = array(
			'Teacher' => array(
				'className' => 'Teacher',
				'foreignKey' => 'district_id',
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