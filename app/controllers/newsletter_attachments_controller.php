<?php
class NewsletterAttachmentsController extends AppController {

	var $name = 'NewsletterAttachments';

	function index($newsletterId) {
		$this->NewsletterAttachment->recursive = 0;
		$this->paginate = array('conditions' => array('newsletter_id' => $newsletterId));
		$newsletterAttachments = $this->paginate();
		$this->set(compact('newsletterAttachments', 'newsletterId'));		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid newsletter attachment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('newsletterAttachment', $this->NewsletterAttachment->read(null, $id));
	}

	function add($newsletterId = '') {
		if (!empty($this->data)) {
			$newsletterId = $this->data['NewsletterAttachment']['newsletter_id'];
			$result = $this->uploadFile('uploads/newsletters', $this->data['NewsletterAttachment']['file'], $newsletterId);
			if (!isset($result['errors'])){
				$this->data['NewsletterAttachment']['file'] = $result['url']; 
			}
			$this->NewsletterAttachment->create();
			if ($this->NewsletterAttachment->save($this->data)) {
				$this->Session->setFlash(__('The newsletter attachment has been saved', true));
				$this->redirect(array('action' => 'index', $newsletterId));
			} else {
				$this->Session->setFlash(__('The newsletter attachment could not be saved. Please, try again.', true));
			}
		}
		$this->set(compact('newsletterId'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid newsletter attachment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$newsletterId = $this->data['NewsletterAttachment']['newsletter_id'];
			if ($this->NewsletterAttachment->save($this->data)) {
				$this->Session->setFlash(__('The newsletter attachment has been saved', true));
				$this->redirect(array('action' => 'index', $newsletterId));
			} else {
				$this->Session->setFlash(__('The newsletter attachment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->NewsletterAttachment->read(null, $id);
		}
		$this->set(compact('newsletterId'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for newsletter attachment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->NewsletterAttachment->delete($id)) {
			$this->Session->setFlash(__('Newsletter attachment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Newsletter attachment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_index() {
		$this->NewsletterAttachment->recursive = 0;
		$this->set('newsletterAttachments', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid newsletter attachment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('newsletterAttachment', $this->NewsletterAttachment->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->NewsletterAttachment->create();
			if ($this->NewsletterAttachment->save($this->data)) {
				$this->Session->setFlash(__('The newsletter attachment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newsletter attachment could not be saved. Please, try again.', true));
			}
		}
		$newsletters = $this->NewsletterAttachment->Newsletter->find('list');
		$this->set(compact('newsletters'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid newsletter attachment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->NewsletterAttachment->save($this->data)) {
				$this->Session->setFlash(__('The newsletter attachment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newsletter attachment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->NewsletterAttachment->read(null, $id);
		}
		$newsletters = $this->NewsletterAttachment->Newsletter->find('list');
		$this->set(compact('newsletters'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for newsletter attachment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->NewsletterAttachment->delete($id)) {
			$this->Session->setFlash(__('Newsletter attachment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Newsletter attachment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
