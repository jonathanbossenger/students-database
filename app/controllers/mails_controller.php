<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MailsController extends AppController {

    var $name = 'Mails';
    var $uses = array();

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*');
    }

    function sendMail(){

		set_time_limit(0);
        $this->LoadModel('Config');
        $config = $this->Config->find('first');

        $this->loadModel('SystemEmail');

        //$deleteConditions = array('to' => '');
        //$this->SystemEmail->deleteAll($deleteConditions);

        $systemEmails = $this->SystemEmail->find('all', array('conditions' => array('processed' => '0'), 'limit' => 25));

        if (empty($systemEmails)){
            die ('No emails to be sent');
        }

        foreach($systemEmails as $email){

            $mailId = $email['SystemEmail']['id'];

            $this->Email->from = $email['SystemEmail']['replyTo'];
            $this->Email->replyTo = $email['SystemEmail']['replyTo'];
            $this->Email->to = $email['SystemEmail']['to'];
            $this->Email->cc = $email['SystemEmail']['cc'];
            $this->Email->bcc = $email['SystemEmail']['bcc'];
            $this->Email->subject = $email['SystemEmail']['subject'];
            $this->Email->attachments = unserialize($email['SystemEmail']['attachments']);
            $this->Email->template = $email['SystemEmail']['template'];
            $this->Email->layout = $email['SystemEmail']['layout'];
            $this->Email->sendAs = $email['SystemEmail']['sendAs'];

		    $this->Email->delivery = 'smtp'; 
            $this->Email->smtpOptions = array(
				'port'=>'465',
				'timeout'=>'30',
				'host' => 'ssl://smtp.gmail.com',
				'username'=>'admin@graciejiujitsu.co.za',
				'password'=>'w4t3rm3l0n',
		    );
			           
            $this->set('body', $email['SystemEmail']['subject']);
            $this->set('body', $email['SystemEmail']['body']);

            $this->set('site_url', $config['Config']['site_url']);
            $this->set('mailId', $mailId);

            if ($this->Email->send()){
                $this->Email->reset();

                $email['SystemEmail']['processed'] = '1';
                $email['SystemEmail']['date'] = date('Y-m-d H:i:s', mktime());

                $this->SystemEmail->save($email);
		
            }else {
				die('Error sending email' . print_r($this->Email));
	    	}
        }
        die('Bulk mail batch completed');
    }
}
?>
