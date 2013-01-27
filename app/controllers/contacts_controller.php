<?php
class ContactsController extends AppController {

	var $name = 'Contacts';

	function index($studentId) {
		$this->Contact->recursive = 0;
		$this->paginate = array('conditions' => array('student_id' => $studentId));
		$contacts = $this->paginate();
		$this->set(compact('contacts', 'studentId'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid contact', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contact', $this->Contact->read(null, $id));
	}

	function add($studentId = '') {
		if (!empty($this->data)) {
			$studentId = $this->data['Contact']['student_id'];
			$this->Contact->create();
			if ($this->Contact->save($this->data)) {
				if ($this->data['Contact']['primary'] == '1'){
					$this->Contact->updateAll(
						array('Contact.primary' => '0'), //fields
						array('Contact.student_id' => $studentId, 'Contact.id <>' => $this->Contact->id) //conditions
					);					
				}
				$this->Session->setFlash(__('The contact has been saved', true));
				$this->redirect(array('action' => 'index', $studentId));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.', true));
			}
		}
		$this->set(compact('studentId'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid contact', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$studentId = $this->data['Contact']['student_id'];
			if ($this->Contact->save($this->data)) {
				if ($this->data['Contact']['primary'] == '1'){
					$this->Contact->updateAll(
						array('Contact.primary' => '0'), //fields
						array('Contact.student_id' => $studentId, 'Contact.id <>' => $this->Contact->id) //conditions
					);
				}
				$this->Session->setFlash(__('The contact has been saved', true));
				$this->redirect(array('action' => 'index', $studentId));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Contact->read(null, $id);
			$studentId = $this->data['Contact']['student_id'];
		}
		$this->set(compact('studentId'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for contact', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Contact->delete($id)) {
			$this->Session->setFlash(__('Contact deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Contact was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
