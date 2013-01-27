<?php
class SystemEmailsController extends AppController {

	var $name = 'SystemEmails';

	function delete_email_queue() {
		$conditions = array('processed' => 0);
		$this->SystemEmail->deleteAll($conditions);
		$this->Session->setFlash(__('Unsent emails deleted', true));
		$this->redirect(array('controller' => 'maintenance', 'action' => 'index'));
	}
	
	function index() {
		$this->SystemEmail->recursive = 0;
		$this->paginate = array('order' => array('modified' => 'DESC'));
		$this->set('systemEmails', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid system email', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('systemEmail', $this->SystemEmail->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SystemEmail->create();
			if ($this->SystemEmail->save($this->data)) {
				$this->Session->setFlash(__('The system email has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system email could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid system email', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SystemEmail->save($this->data)) {
				$this->Session->setFlash(__('The system email has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system email could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SystemEmail->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for system email', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SystemEmail->delete($id)) {
			$this->Session->setFlash(__('System email deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('System email was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	
}
