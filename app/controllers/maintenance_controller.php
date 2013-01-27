<?php
class MaintenanceController extends AppController {

	var $name = 'Maintenance';
        var $uses = null;

        function index () {
            $items = array(
                'account_types' => array('Account Types'),
                'banks' => array('Banks'),
                'membership_types' => array('Membership Types'),
                'payment_methods' => array('Payment Methods'),
            	'categories' => array('Student Categories'),
                'levels' => array('Levels'),
            	'programs' => array('Programs'),
            	'statuses' => array('System Actions'),
                'users' => array('Users'),
            	'system_emails' => array('System Emails'),
				'imports' => array('Imports'),            
                'configs' => array('Configuration'),
                );
            $this->set('items', $items);
         }
}
