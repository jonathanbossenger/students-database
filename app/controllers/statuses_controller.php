<?php
class StatusesController extends AppController {

	var $name = 'Statuses';

	function index() {
		$this->Status->recursive = 0;
		$this->set('statuses', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid system action', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('status', $this->Status->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$title = '';
			$title .= ($this->data['Status']['mail'] == 1 ? 'allow ' : 'no ') . 'mail, ';
			$title .= ($this->data['Status']['search'] == 1 ? 'allow ' : 'no ') . 'search, ';
			$title .= ($this->data['Status']['attendance'] == 1 ? 'allow ' : 'no ') . 'attendance';
			$this->data['Status']['title'] = $title;
			
			$this->Status->create();
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash(__('The system action has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system action could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid status', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$title = '';
			$title .= ($this->data['Status']['mail'] == 1 ? 'allow ' : 'no ') . 'mail, ';
			$title .= ($this->data['Status']['search'] == 1 ? 'allow ' : 'no ') . 'search, ';
			$title .= ($this->data['Status']['attendance'] == 1 ? 'allow ' : 'no ') . 'attendance';
			$this->data['Status']['title'] = $title;
				
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash(__('The system action has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system action could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Status->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for system action', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Status->delete($id)) {
			$this->Session->setFlash(__('System action deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('System action was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}