<?php
class MailingListsController extends AppController {

	var $name = 'MailingLists';

        function create_from_search($searchId = ''){
			if (!empty($this->data)) {
	            $searchId = $this->data['MailingList']['searchId'];
	            unset($this->data['MailingList']['searchId']);
				$this->MailingList->create();
				if ($this->MailingList->save($this->data)) {
					$this->Session->setFlash(__('The mailing list has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The mailing list could not be saved. Please, try again.', true));
	                                
				}
			}
			$this->loadModel('Search');
			$search = $this->Search->read(null, $searchId);
			$conditions = unserialize($search['Search']['search']);
			
			if ($conditions[0] == 'attendance'){
				$this->loadModel('Student');
				$attendanceType = $conditions[1]; 
				$conditions = array('StudentAttendance.date BETWEEN ? AND ?' => array($conditions[2], $conditions[3]));
				$studentAttendances = $this->Student->StudentAttendance->find('all', array('conditions' => $conditions));
				
				$Students = array();
				$_students = array();
				foreach ($studentAttendances as $studentAttendance){
					$found = in_array($studentAttendance['Student'], $_students);
					if (!$found){
						$_students[] = $studentAttendance['Student'];
						$Students[]['Student'] = $studentAttendance['Student'];
					}
				}
				
				if ($attendanceType == '0'){
					$attendedStudents = array();
					foreach ($Students as $studentAttendance){
						$found = in_array($studentAttendance['Student']['id'], $attendedStudents);
						if (!$found){
							$attendedStudents[$studentAttendance['Student']['student_number']] = $studentAttendance['Student']['id'];	
						}
					}    
					$allStudents = $this->Student->find('list', array('fields' => array('student_number', 'id')));
					$nonAttendanceStudents = array_diff($allStudents, $attendedStudents);
					$Students = $this->Student->find('all', array('conditions' => array('Student.id' => $nonAttendanceStudents)));
				}
				$students = array();
				foreach ($Students as $student){
					$students[$student['Student']['id']] = $student['Student']['first_name'] . ' ' . $student['Student']['last_name'];
				}
			}else {
				if (isset($conditions['Program.id'])){
					$this->loadModel('ProgramStudent');
					$students = $this->ProgramStudent->find('list', array('conditions' => array('ProgramStudent.id' => $conditions['Program.id']), 'fields' => array('id', 'student_id')));
					$studentIds = array();
					foreach ($students as $studentId){
						if (!in_array($studentId, $studentIds)){
							$studentIds[] = $studentId;
						}
					}
					unset($conditions['Program.id']);
					$conditions['Student.id'] = $studentIds;
				}
				$students = $this->MailingList->Student->find('superlist', array('conditions' => $conditions, 'fields'=>array('Student.id', 'Student.first_name', 'Student.last_name'), 'separator'=>' '));
			}

			$this->set(compact('students', 'searchId'));
        }

	function index() {
		$this->MailingList->recursive = 0;
		$this->set('mailingLists', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mailing list', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mailingList', $this->MailingList->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MailingList->create();
			if ($this->MailingList->save($this->data)) {
				$this->Session->setFlash(__('The mailing list has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailing list could not be saved. Please, try again.', true));
			}
		}
        $students = $this->MailingList->Student->find('superlist', array('fields'=>array('Student.id', 'Student.first_name', 'Student.last_name'), 'separator'=>' '));
		$this->set(compact('students'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mailing list', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MailingList->save($this->data)) {
				$this->Session->setFlash(__('The mailing list has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailing list could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MailingList->read(null, $id);
		}
		$students = $this->MailingList->Student->find('superlist', array('fields'=>array('Student.id', 'Student.first_name', 'Student.last_name'), 'separator'=>' '));
		$this->set(compact('students'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mailing list', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MailingList->delete($id)) {
			$this->Session->setFlash(__('Mailing list deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mailing list was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
