<?php
class Program extends AppModel {
	var $name = 'Program';
	var $displayField = 'title';

	var $hasAndBelongsToMany = array(
		'Student' => array(
			'className' => 'Student',
			'joinTable' => 'program_students',
			'foreignKey' => 'program_id',
			'associationForeignKey' => 'student_id',
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