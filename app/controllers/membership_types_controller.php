<?php
class MembershipTypesController extends AppController {

	var $name = 'MembershipTypes';

	function index() {
		$this->MembershipType->recursive = 0;
		$this->set('membershipTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid membership type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('membershipType', $this->MembershipType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MembershipType->create();
			if ($this->MembershipType->save($this->data)) {
				$this->Session->setFlash(__('The membership type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership type could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid membership type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MembershipType->save($this->data)) {
				$this->Session->setFlash(__('The membership type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MembershipType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for membership type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MembershipType->delete($id)) {
			$this->Session->setFlash(__('Membership type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Membership type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->MembershipType->recursive = 0;
		$this->set('membershipTypes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid membership type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('membershipType', $this->MembershipType->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->MembershipType->create();
			if ($this->MembershipType->save($this->data)) {
				$this->Session->setFlash(__('The membership type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership type could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid membership type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MembershipType->save($this->data)) {
				$this->Session->setFlash(__('The membership type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MembershipType->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for membership type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MembershipType->delete($id)) {
			$this->Session->setFlash(__('Membership type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Membership type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
