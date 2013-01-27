<?php
class NewslettersController extends AppController {

	var $name = 'Newsletters';
        var $helpers = array('Html', 'Form', 'Ckeditor');

        function send($id){
            $this->loadModel('MailingList');
            if (!empty($this->data)){
                $newsletterId = $this->data['Newsletter']['id'];
                $newsletter = $this->Newsletter->read(null, $newsletterId);
                if (isset($this->data['Newsletter']['MailingList']) && $this->data['Newsletter']['MailingList'] != 0){
	                $mailingListId = $this->data['Newsletter']['MailingList'];
	                $mailingList = $this->MailingList->read(null, $mailingListId);
	                foreach ($mailingList['Student'] as $student){
	                    $this->createSystemEmail($student, $newsletter);
	                }
                } elseif (isset($this->data['Newsletter']['Program']) && !empty($this->data['Newsletter']['Program'])) {
                	// get students from programs;
                	$this->loadModel('Student');
                	$programs = $this->Student->Program->find('all', array('conditions' => array('Program.id' => $this->data['Newsletter']['Program'])));
                	// filter out student data
                	$students = array();
                	foreach ($programs as $program){
                		foreach ($program['Student'] as $student){
                			$studentId = $student['id'];
                			$keyExists = array_key_exists($student['id'], $students);
                			if (!$keyExists){
                				$students[$student['id']] = $student;
                			}
                		}
                	}
                	unset($programs);
                	foreach ($students as $student){
                      $this->createSystemEmail($student, $newsletter);
	                }
                } else {
                	$this->Session->setFlash(__('No recipients selected, newsletter not sent.', true), 'default', array('class' => 'failure'));
                    $this->redirect(array('action' => 'index')); 
                    return;               	
                }
                $this->Session->setFlash(__('Newsletter has been sent', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
                
            } else {
                if (!$id) {
                        $this->Session->setFlash(__('Invalid newsletter', true), 'default', array('class' => 'failure'));
                        $this->redirect(array('action' => 'index'));
                }
                $this->data = $this->Newsletter->read(null, $id);
                $this->data['MailingList'] = array();
                $mailingLists = $this->MailingList->find('list', array('recursive' => -1));
                $this->loadModel('Program');
                $programs = $this->Program->find('list');
                $this->set(compact('mailingLists', 'id', 'programs'));
            }
        }

        function createSystemEmail($student, $newsletter){
        	
        	$this->loadModel('Student');
        	$this->loadModel('Status');
        	$Student = $this->Status->Student->find('first', array('recursive' => 0, 'conditions' => array('Student.id' => $student['id'])));
        	if (!$Student['Status']['mail']){
	        	return false;
        	}
        	
            $this->LoadModel('Config');
            $this->LoadModel('Contact');
            $this->loadModel('SystemEmail');
            $config = $this->Config->find('first');
            $from = $config['Config']['title'] . '<' . $config['Config']['contact_email'] .'>';
            $contact = $this->Contact->find('first', array('recursive' => -1, 'conditions' => array('student_id' => $student['id'], 'primary' => 1)));
            if (!empty($contact) && !empty($contact['Contact']['email'])){
            	$attachments = array();
            	foreach ($newsletter['NewsletterAttachment'] as $attachment){
            		$attachments[] = $attachment['file'];
            	}
	            $emailData = array();
	            $emailData['to'] = $contact['Contact']['email'];
	            $emailData['bcc'] = '';
	            $emailData['subject'] = $newsletter['Newsletter']['subject'];
	            $emailData['body'] = $newsletter['Newsletter']['body'];
	            $emailData['attachments'] = serialize($attachments);
	            $emailData['replyTo'] = $from;
	            $emailData['from'] = $from;
	            $emailData['layout'] = 'default';
	            $emailData['template'] = 'email';
	            $emailData['sendAs'] = 'html';
	            $this->SystemEmail->create();
	            $this->SystemEmail->save($emailData);
            }
        }

	function index() {
		$this->Newsletter->recursive = 0;
		$this->paginate = array(
			'order' => array('Newsletter.id' => 'desc')
		);		
		$this->set('newsletters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid newsletter', true), 'default', array('class' => 'failure'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('newsletter', $this->Newsletter->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			//check for file uploads
			if (isset($this->data['file'])){
				$files = $this->data['file'];
				unset($this->data['file']);
			}
			$this->Newsletter->create();
			if ($this->Newsletter->save($this->data)) {
				foreach ($files as $file){
					if (!empty($file['name'])){
						$attachment = array();
						$this->loadModel('NewsletterAttachment');
						$newsletterId = $this->Newsletter->id;
						$attachment['NewsletterAttachment']['newsletter_id'] = $newsletterId;
						$result = $this->uploadFile('uploads/newsletters', $file, $newsletterId);
						if (!isset($result['errors'])){
							$attachment['NewsletterAttachment']['file'] = $result['url']; 
						}
						$this->NewsletterAttachment->create();
						if (!$this->NewsletterAttachment->save($attachment)) {
							$this->Session->setFlash(__('Your newsletter saved, but an error occured saving your attachments. Please, try again manually.', true), 'default', array('class' => 'failure'));
							$this->redirect(array('action' => 'index'));
						} 				
					}
				}
				$this->Session->setFlash(__('The newsletter has been saved', true), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newsletter could not be saved. Please, try again.', true), 'default', array('class' => 'failure'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid newsletter', true), 'default', array('class' => 'failure'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Newsletter->save($this->data)) {
				$this->Session->setFlash(__('The newsletter has been saved', true), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newsletter could not be saved. Please, try again.', true), 'default', array('class' => 'failure'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Newsletter->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for newsletter', true), 'default', array('class' => 'failure'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Newsletter->delete($id)) {
			$this->Session->setFlash(__('Newsletter deleted', true), 'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Newsletter was not deleted', true), 'default', array('class' => 'failure'));
		$this->redirect(array('action' => 'index'));
	}
}
