<?php
	class Ward extends AppModel {
		public $name = 'Ward';
		var $belongsTo = array(
			'District' => array(
				'className' => 'District',
				'foreignKey' => 'district_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
		public $hasMany = array(
			'Teacher' => array(
				'className' => 'Teacher',
				'foreignKey' => 'ward_id',
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