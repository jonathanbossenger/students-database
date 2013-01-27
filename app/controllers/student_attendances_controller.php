<?php
class StudentAttendancesController extends AppController {

	var $name = 'StudentAttendances';

	function index() {
		$this->StudentAttendance->recursive = 0;
		$this->set('studentAttendances', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid student attendance', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('studentAttendance', $this->StudentAttendance->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->StudentAttendance->create();
			if ($this->StudentAttendance->save($this->data)) {
				$this->Session->setFlash(__('The student attendance has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student attendance could not be saved. Please, try again.', true));
			}
		}
		$students = $this->StudentAttendance->Student->find('list');
		$this->set(compact('students'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid student attendance', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StudentAttendance->save($this->data)) {
				$this->Session->setFlash(__('The student attendance has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student attendance could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StudentAttendance->read(null, $id);
		}
		$students = $this->StudentAttendance->Student->find('list');
		$this->set(compact('students'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for student attendance', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StudentAttendance->delete($id)) {
			$this->Session->setFlash(__('Student attendance deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Student attendance was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->StudentAttendance->recursive = 0;
		$this->set('studentAttendances', $this->paginate());
	}
}
