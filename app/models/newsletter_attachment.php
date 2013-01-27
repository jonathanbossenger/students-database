<?php
class NewsletterAttachment extends AppModel {
	var $name = 'NewsletterAttachment';
	var $displayField = 'file';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Newsletter' => array(
			'className' => 'Newsletter',
			'foreignKey' => 'newsletter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
