<?php
class Newsletter extends AppModel {
	var $name = 'Newsletter';
	var $displayField = 'subject';
	
	var $hasMany = array(
		'NewsletterAttachment' => array(
			'className' => 'NewsletterAttachment',
			'foreignKey' => 'newsletter_id',
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
	);	
	
}
