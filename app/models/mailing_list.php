<?php
class MailingList extends AppModel {
	var $name = 'MailingList';
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Student' => array(
			'className' => 'Student',
			'joinTable' => 'mailing_list_students',
			'foreignKey' => 'mailing_list_id',
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
