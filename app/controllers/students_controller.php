<?php
class StudentsController extends AppController {

	var $name = 'Students';

	function export($searchId = ''){
		$exportData = array();
		if (!empty($searchId)){

			$this->loadModel('Search');
			$search = $this->Search->read(null, $searchId);
			$conditions = unserialize($search['Search']['search']);

			if ($conditions[0] == 'attendance'){
				$attendanceType = $conditions[1]; 
				$conditions = array('StudentAttendance.date BETWEEN ? AND ?' => array($conditions[2], $conditions[3]));
				$studentAttendances = $this->Student->StudentAttendance->find('all', array('conditions' => $conditions));
				
				$studentsData = array();
				$_students = array();
				foreach ($studentAttendances as $studentAttendance){
					$found = in_array($studentAttendance['Student'], $_students);
					if (!$found){
						$_students[] = $studentAttendance['Student'];
						$studentsData[]['Student'] = $studentAttendance['Student'];
					}
				}
				
				if ($attendanceType == '0'){
					$attendedStudents = array();
					foreach ($studentsData as $studentAttendance){
						$found = in_array($studentAttendance['Student']['id'], $attendedStudents);
						if (!$found){
							$attendedStudents[$studentAttendance['Student']['student_number']] = $studentAttendance['Student']['id'];	
						}
					}    
					$allStudents = $this->Student->find('list', array('fields' => array('student_number', 'id')));
					$nonAttendanceStudents = array_diff($allStudents, $attendedStudents);
					$studentsData = $this->Student->find('all', array('conditions' => array('Student.id' => $nonAttendanceStudents)));
				}
			}else {
				if (isset($conditions['Program.id'])){
					$this->loadModel('ProgramStudent');
					$students = $this->ProgramStudent->find('list', array('conditions' => array('ProgramStudent.program_id' => $conditions['Program.id']), 'fields' => array('id', 'student_id')));
					$studentIds = array();
					foreach ($students as $studentId){
						if (!in_array($studentId, $studentIds)){
							$studentIds[] = $studentId;
						}
					}
					unset($conditions['Program.id']);
					$conditions['Student.id'] = $studentIds;
				}
				$studentsData = $this->Student->find('all', array('conditions' => $conditions));
			}			
		}else {
			$studentsData = $this->Student->find('all');
		}
	
		$count = 0;
		
		$fields = array(
			'STUDENT_NUMBER', 
			'FIRST_NAME',
			'LAST_NAME',
			'JOIN_DATE',
			'LEVEL',
			'PROGRAM',
			'GRADED_DATE',
			'MEMBERSHIP_TYPE',
			'PAYMENT_METHOD',
			'PAYMENT_AMOUNT',
			'PAYMENT_DATE',
			'ACCOUNT_NUMBER',
			'BRANCH_CODE',
			'ACCOUNT_TYPE',
			'BANK',
			'NOTES',
			'CANCELLATION_DATE',
			'CONTRACT_RENEWAL_DATE',
			'TELEPHONE',
			'MOBILE',
			'EMAIL',
			'TELEPHONE',
			'MOBILE',
			'EMAIL',
		);
		
		foreach ($studentsData as $studentData){
        	if (!$studentData['Status']['mail']){
	        	continue;
        	}
			
			$exportData[$count]['STUDENT_NUMBER'] = $studentData['Student']['student_number'];
			$exportData[$count]['FIRST_NAME'] = $studentData['Student']['first_name'];
			$exportData[$count]['LAST_NAME'] = $studentData['Student']['last_name'];
			$exportData[$count]['JOIN_DATE'] = $this->reformatMySQLDate($studentData['Student']['join_date']);
			$exportData[$count]['LEVEL'] = $studentData['Level']['title'];
			
			$exportData[$count]['PROGRAM'] = '';
			foreach ($studentData['Program'] as $program){
				if (!empty($exportData[$count]['PROGRAM'])){
					$exportData[$count]['PROGRAM'] .= ', ';
				}
				$exportData[$count]['PROGRAM'] .= $program['title'];
			}
			$exportData[$count]['GRADED_DATE'] = $this->reformatMySQLDate($studentData['Student']['graded_date']);
			$exportData[$count]['MEMBERSHIP_TYPE'] = $studentData['MembershipType']['title'];
						
			$exportData[$count]['PAYMENT_METHOD'] = $studentData['PaymentMethod']['title'];
			$exportData[$count]['PAYMENT_AMOUNT'] = $studentData['Student']['payment_amount'];
			$exportData[$count]['PAYMENT_DATE'] = $studentData['Student']['payment_date'];
			$exportData[$count]['ACCOUNT_NUMBER'] = $studentData['Student']['account_number'];
			$exportData[$count]['BRANCH_CODE'] = $studentData['Student']['branch_code'];
			$exportData[$count]['ACCOUNT_TYPE'] = $studentData['AccountType']['title'];
			$exportData[$count]['BANK'] = $studentData['Bank']['title'];
			$exportData[$count]['NOTES'] = $studentData['Student']['notes'];
			
			$exportData[$count]['CANCELLATION_DATE'] = $this->reformatMySQLDate($studentData['Student']['cancellation_date']);
			$exportData[$count]['CONTRACT_RENEWAL_DATE'] = $this->reformatMySQLDate($studentData['Student']['contract_renewal_date']);

			$limit = 2;
			$contactCount = 0;
			foreach ($studentData['Contact'] as $contact){
				$contactCount++;
				$exportData[$count]['TELEPHONE'.$contactCount] = $contact['telephone'];
				$exportData[$count]['MOBILE'.$contactCount] = $contact['mobile'];
				$exportData[$count]['EMAIL'.$contactCount] = $contact['email'];
				if ($contactCount == $limit){
					break;
				}
			}			
			$count++;
		}
		$this->exportToExcel($fields, $exportData);
	}
	
	function present($id = null, $redirect='index') {
		if (!$id) {
			$this->Session->setFlash(__('Invalid student', true), 'default', array('class' => 'failure'));
			$this->redirect(array('action' => $redirect));
		}
		$studentAttendance = $this->Student->StudentAttendance->find('first', array('conditions' => array('StudentAttendance.student_id' => $id, 'StudentAttendance.date' => date('Y-m-d'))));
		if (empty($studentAttendance)){
			$data['date'] = date('Y-m-d');
			$data['student_id'] = $id;
			$this->Student->StudentAttendance->create();
			if ($this->Student->StudentAttendance->save($data)){
				$this->Session->setFlash(__('The student has been marked as present', true), 'default', array('class' => 'success'));
			}else {
				$this->Session->setFlash(__('An error has occurred marking the student present', true), 'default', array('class' => 'failure'));
			}
		}else {
			$this->Session->setFlash(__('The student has already been marked as present for today', true), 'default', array('class' => 'failure'));
		}
		$this->redirect(array('action' => $redirect));
	}

    function attendance($alpha = '') {
    	$validStatuses = $this->Student->Status->find('list', array('conditions' => array('attendance' => '1')));
    	$statuses = array();
    	foreach ($validStatuses as $id => $value){
    		$statuses[] = $id;
    	}
		$this->Student->recursive = 0;
		$conditions = array();
		if (!empty($statuses)){
			$conditions['Student.status_id'] = $statuses;
		}
    	if (!empty($alpha)){
    		$conditions['first_name LIKE'] = $alpha . '%';
    	}
    	$this->paginate = array(
           	'conditions' => $conditions
        );
		$this->set('students', $this->paginate());
        $this->set('alphas', range('A', 'Z'));
	}

	function attendance_report(){
		if (!empty($this->data)) {
			$attendanceType = $this->data['Student']['attendance_type'];
			$startDateArray = $this->data['Student']['start_date'];
			$endDateArray = $this->data['Student']['end_date'];
			$startDate = $startDateArray['year'] . '-' . $startDateArray['month'] . '-' . $startDateArray['day'];
			$endDate = $endDateArray['year'] . '-' . $endDateArray['month'] . '-' . $endDateArray['day'];

		   	$validStatuses = $this->Student->Status->find('list', array('conditions' => array('attendance' => '1')));
	    	$statuses = array();
	    	foreach ($validStatuses as $id => $value){
	    		$statuses[] = $id;
	    	}			
			
			$search = array('attendance', $attendanceType, $startDate, $endDate);
			$this->loadModel('Search');
			$data['Search']['search'] = serialize($search);
			$this->Search->create();
			$this->Search->save($data);
			$searchId = $this->Search->id;
			
			$conditions = array('StudentAttendance.date BETWEEN ? AND ?' => array($startDate, $endDate));
			if (!empty($statuses)){
				$conditions['Student.status_id'] = $statuses;
			}
			$studentAttendances = $this->Student->StudentAttendance->find('all', array('conditions' => $conditions));
			
			$students = array();
			$_students = array();
			foreach ($studentAttendances as $studentAttendance){
				$found = in_array($studentAttendance['Student'], $_students);
				if (!$found){
					$_students[] = $studentAttendance['Student'];
					$students[]['Student'] = $studentAttendance['Student'];
				}
			}
			
			if ($attendanceType == '0'){
				$attendedStudents = array();
				foreach ($students as $studentAttendance){
					$found = in_array($studentAttendance['Student']['id'], $attendedStudents);
					if (!$found){
						$attendedStudents[$studentAttendance['Student']['student_number']] = $studentAttendance['Student']['id'];	
					}
				}    
				$allStudents = $this->Student->find('list', array('fields' => array('student_number', 'id')));
				$nonAttendanceStudents = array_diff($allStudents, $attendedStudents);
				$students = $this->Student->find('all', array('conditions' => array('Student.id' => $nonAttendanceStudents)));
			}
			if (!empty($students)){
				$this->set(compact('students'));
			}else {
				$this->Session->setFlash(__('No students for the date(s) specified', true), 'default', array('class' => 'failure'));
			}
		}
		$attendanceTypes = array('Not Attended', 'Attended');
		$this->set(compact('attendanceTypes', 'searchId'));
	}

	function payments(){
		if (!empty($this->data)){
			
			if (isset($this->data['Student'])){
				$conditions = array();
				foreach ($this->data['Student'] as $field => $value){
					if (!empty($value)){
						$conditions['Student.'.$field.' LIKE '] = '%'.$value.'%'; 
					}
				}
				$students = $this->Student->find('all', array('conditions' => $conditions));
			}else {
				
			}
			if (!empty($students)){
				$months = $this->getMonths();
				$years = $this->getYears();
				$this->set(compact('students', 'months', 'years'));
			}else {
				$this->Session->setFlash(__('No students for the payment method(s) specified', true), 'default', array('class' => 'failure'));
			}        		
		}
		
		$paymentMethods = $this->Student->PaymentMethod->find('list');
		$this->set(compact('paymentMethods'));
	}
	
	function process_payments(){
		if (!empty($this->data)){
			$this->loadModel('StudentPayment');
			$data = array();
			foreach ($this->data['StudentPayment'] as $StudentPayment){
				if ($StudentPayment['paid'] == '1'){
					$data['StudentPayment'] = $StudentPayment;
					$this->StudentPayment->create();
					$this->StudentPayment->save($data);
				}
			}
			$this->Session->setFlash(__('The student payments have been processed', true), 'default', array('class' => 'success'));
		}
		else {
			$this->Session->setFlash(__('No student payments to be processed', true), 'default', array('class' => 'failure'));
		}	
		$this->redirect(array('action' => 'payments'));
	}
	
	function search(){
			$validStatuses = $this->Student->Status->find('list', array('conditions' => array('search' => '1')));
			$statuses = array();
			foreach ($validStatuses as $id => $value){
				$statuses[] = $id;
			}			
			$this->loadModel('Search');
			
			if(!empty($this->data)){
				$conditions = array();
				if (!empty($statuses)){
					$conditions['Student.status_id'] = $statuses;
				}				
				foreach($this->data['Student'] as $field => $value){
					if ($field == 'active_student' && $value == '1' ){
						$conditions["OR"] = array (
												array("Student.cancellation_date" => "0000-00-00"),
												array("Student.cancellation_date" => null), 
											);
    					continue;					
					}
					if (!empty($value)){
						$conditions['Student.'.$field . ' LIKE'] = '%' . $value . '%';
					}
				}
				foreach($this->data['Program'] as $field => $value){
					if (!empty($value)){
						$conditions['Program.id'] = $value;
					}                    	
				}
				
				$data['Search']['search'] = serialize($conditions);
				$this->Search->create();
				$this->Search->save($data);
				$searchId = $this->Search->id;
				if (isset($conditions['Program.id'])){
					$this->loadModel('ProgramStudent');
					$students = $this->ProgramStudent->find('list', array('conditions' => array('ProgramStudent.program_id' => $conditions['Program.id']), 'fields' => array('id', 'student_id')));
					$studentIds = array();
					foreach ($students as $studentId){
						if (!in_array($studentId, $studentIds)){
							$studentIds[] = $studentId;
						}
					}
					unset($conditions['Program.id']);
					$conditions['Student.id'] = $studentIds;
				}
				$this->paginate = array('conditions' => $conditions);
				$students = $this->paginate();
				$this->set(compact('students', 'searchId'));
				$this->render('search_results');
				return;
			}else if (!empty($this->params['pass'])) {
				$passedParams = $this->params['pass'];
				$searchId = $passedParams[0]; 
				$data = $this->Search->findById($searchId);
				$conditions = unserialize($data['Search']['search']);
				if (isset($conditions['Program.id'])){
					$this->loadModel('ProgramStudent');
					$students = $this->ProgramStudent->find('list', array('conditions' => array('ProgramStudent.program_id' => $conditions['Program.id']), 'fields' => array('id', 'student_id')));
					$studentIds = array();
					foreach ($students as $studentId){
						if (!in_array($studentId, $studentIds)){
							$studentIds[] = $studentId;
						}
					}
					unset($conditions['Program.id']);
					$conditions['Student.id'] = $studentIds;
				}				
				$this->paginate = array('conditions' => $conditions);
				$students = $this->paginate();
				$this->set(compact('students', 'searchId'));
				$this->render('search_results');
				return;
			}

			$levels = $this->Student->Level->find('list');
			$programs = $this->Student->Program->find('list');
			$membershipTypes = $this->Student->MembershipType->find('list');
			$this->set(compact('levels', 'programs', 'membershipTypes'));
	}

	function index() {
        if (isset($this->params['named']['sort'])){
       	    $this->Session->write('Student.sort', $this->params['named']['sort']);
        	
        }    		
        if (isset($this->params['named']['direction'])){
        	$this->Session->write('Student.direction', $this->params['named']['direction']);
        }    		
        
		$sort = $this->Session->read('Student.sort');
		$direction = $this->Session->read('Student.direction');
		if (empty($sort)){
			$sort = 'last_name';
		}
		if (empty($direction)){
			$direction = 'asc';
		}
		$this->paginate = array(
			'order'=>array('Student.'.$sort => $direction)
		);
		$this->Student->recursive = 0;
		$this->set('students', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid student', true), 'default', array('class' => 'failure'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('student', $this->Student->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Student->create();
			if ($this->Student->save($this->data)) {
				$id = $this->Student->id;

				$studentNumber = str_pad($id, 11, '0', STR_PAD_LEFT);
				$this->Student->set('student_number', $studentNumber);
				$this->Student->save();
				
				$this->Session->setFlash(__('The student has been saved', true), 'default', array('class' => 'success'));
				//$this->redirect(array('action' => 'index'));
				$insertID = $this->Student->getLastInsertID();
				$page = $this->Student->getPageNumber($insertID, $this->paginate['limit']);
				$this->redirect(array('action' => 'index', 'page' => $page));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.', true), 'default', array('class' => 'failure'));
			}
		}
		$levels = $this->Student->Level->find('list');
		$programs = $this->Student->Program->find('list');
		$membershipTypes = $this->Student->MembershipType->find('list');
		$paymentMethods = $this->Student->PaymentMethod->find('list');
		$accountTypes = $this->Student->AccountType->find('list');
		$banks = $this->Student->Bank->find('list');
		$statuses = $this->Student->Status->find('list');
		$this->set(compact('levels', 'programs', 'membershipTypes', 'paymentMethods', 'accountTypes', 'banks', 'statuses'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid student', true), 'default', array('class' => 'failure'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Student->save($this->data)) {
				$this->Session->setFlash(__('The student has been saved', true), 'default', array('class' => 'success'));
				//$this->redirect(array('action' => 'index'));
				$page = $this->Student->getPageNumber($this->data['Student']['id'], $this->paginate['limit']);
				$this->redirect(array('action' => 'index', 'page' => $page));
				
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.', true), 'default', array('class' => 'failure'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Student->read(null, $id);
		}
		
		$page = $this->Student->getPageNumber($id, $this->paginate['limit']);
		$levels = $this->Student->Level->find('list');
		$programs = $this->Student->Program->find('list');
		$membershipTypes = $this->Student->MembershipType->find('list');
		$paymentMethods = $this->Student->PaymentMethod->find('list');
		$accountTypes = $this->Student->AccountType->find('list');
		$banks = $this->Student->Bank->find('list');
		$statuses = $this->Student->Status->find('list');
		$this->set(compact('levels', 'programs', 'membershipTypes', 'paymentMethods', 'accountTypes', 'banks', 'page', 'statuses'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for student', true), 'default', array('class' => 'failure'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Student->delete($id)) {
			$this->Session->setFlash(__('Student deleted', true), 'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Student was not deleted', true), 'default', array('class' => 'failure'));
		$this->redirect(array('action' => 'index'));
	}
}