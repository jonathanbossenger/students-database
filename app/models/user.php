<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Module' => array(
			'className' => 'Module',
			'joinTable' => 'modules_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'module_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
