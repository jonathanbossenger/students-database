<?php
class ImportsController extends AppController {

	var $name = 'Imports';
	var $uses = array();

	function index(){
		
	}
	
	function download(){
		
	}
	
	function excel() {
		set_time_limit(0);
		$errors = array();
		$this->loadModel('Student');
		$this->loadModel('Contact');
		$this->loadModel('Level');
		$this->loadModel('Program');
		$this->loadModel('ProgramStudent');
		$this->loadModel('MembershipType');
		$this->loadModel('PaymentMethod');
		$this->loadModel('AccountType');
		$this->loadModel('Bank');
		
		$extras = array(
						'LEVEL' => 'Level',
						'MEMBERSHIP_TYPE' => 'MembershipType',
						'PAYMENT_METHOD' => 'PaymentMethod',
						'ACCOUNT_TYPE' => 'AccountType',
						'BANK' => 'Bank'
						);
		
		if (!empty($this->data)) {
			$upload = $this->uploadFile('uploads/imports', $this->data['Import']['file']);
			if (!isset($upload['errors'])){
				$this->data['Import']['file'] = $upload['url']; 
			}else {
				$this->Session->setFlash(__('The excel file could not be uploaded. '.$upload['errors'].'. Please, try again.', true));
				return;
			}
			$studentData = $this->readExcel($this->data['Import']['file']);
			if (isset($studentData['errors'])){
				$this->Session->setFlash(__('The excel file could not be read. '.$studentData['error'].'. Please, try again.', true));
				return;				
			}
			
			$studentFields = Set::extract('/COLUMNS/Field',$this->Student->query("DESCRIBE {$this->Student->useTable}"));
			$contactFields = Set::extract('/COLUMNS/Field',$this->Contact->query("DESCRIBE {$this->Contact->useTable}"));
			
			//save data
			foreach ($studentData['records'] as $record){
				$fields = $studentData['fields'];

				// save student record
				$student = array();
				foreach ($studentFields as $studentField){
					$key = array_search(strtoupper($studentField), $fields);
					if ($key){
						if (!empty($record[$key])){
							$value = $record[$key];
							if (($studentField == 'join_date') || ($studentField == 'contract_renewal_date')){
								$value = $this->reformatDate($value);
							}
							$student['Student'][$studentField] = $value;	
						}
						unset($record[$key]);
						unset($fields[$key]);
					}
				}
				$this->Student->create();
				if ($this->Student->save($student)){
					$studentId = $this->Student->id;
					if (empty($this->Student->student_number)){
						// pad the id and add it as a student number
					}
				}else {
					$errors['Failed to add student : ' . $student['first_name'] .' '. $student['last_name']];
					die('Failed to add student : ' . $student['first_name'] .' '. $student['last_name']);
				}
				
				// add level, membership_type, payment_method, account_type, bank
			    foreach ($extras as $extraField => $model){
			    	$insert = array();
			    	$key = array_search($extraField, $fields);
					if ($key){
						if (!empty($record[$key])){
							$value = $record[$key];
							$result = $this->$model->find('first', array('conditions' => array('title' => $value)));
							if (empty($result)){
								$insert[$model]['title'] = $value;
								$this->$model->create();
								$this->$model->save($insert);
								$insertId = $this->$model->id;
							} else {
								$insertId = $result[$model]['id'];
							}
						}
						unset($record[$key]);
						unset($fields[$key]);
					}			    	
			    	$student['Student'][strtolower($extraField) . '_id'] = $insertId;
			    }
			    //die(debug($student));
			    $this->Student->save($student);
			    
			    // update student programs
			    $insert = array();
			    $key = array_search('PROGRAM', $fields);
				if ($key){
					if (!empty($record[$key])){
						$value = $record[$key];
						$values = explode(',', $value);
						$programStudents = array();
						foreach ($values as $count => $value){
							$result = $this->Program->find('first', array('conditions' => array('title' => $value)));
							$programStudents['ProgramStudent'][$count]['student_id'] = $studentId;
							if (empty($result)){
								$insert['Program']['title'] = $value;
								$this->Program->create();
								$this->Program->save($insert);
								$programStudents['ProgramStudent'][$count]['program_id'] = $this->Program->id;
							} else {
								$programStudents['ProgramStudent'][$count]['program_id'] = $result['Program']['id'];
							}
						}
						$this->ProgramStudent->saveAll($programStudents['ProgramStudent']);
						/*
						foreach ($programStudents as $programStudent){
							$this->ProgramStudent->create();
							$this->ProgramStudent->save($programStudent);	
						}
						*/
					}
					unset($record[$key]);
					unset($fields[$key]);
				}			
				
				// update contact details
				$contacts = array();
				$counter = 0;
				$primarySet = false;
				do {
					$counter++;
					foreach ($contactFields as $contactField){
						$key = array_search(strtoupper($contactField), $fields);
						if ($key){
							if (!empty($record[$key])){
								$value = $record[$key];
								$contacts['Contact'][$counter]['student_id'] = $studentId;
								$contacts['Contact'][$counter][$contactField] = $value;
								if (!$primarySet){
									$contacts['Contact'][$counter]['primary'] = 1;
									$primarySet = true;									
								}
							}
							unset($record[$key]);
							unset($fields[$key]);
						}
					}
					if (empty($record)){
						break;
					}
				} while (!empty($record));
				if (!empty($contacts)){
					$this->Contact->saveAll($contacts['Contact']);	
				}
				
				/*
				foreach ($contacts as $contact){
					$this->Contact->create();
					$this->Contact->save($contact);	
				}				
				*/
			}
			if (empty($errors)){
				$this->Session->setFlash(__('The import data has been completed', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The import data was saved but some errors occured.', true));
				foreach ($errors as $error){
					$this->Session->setFlash(__($error, true));
				}
			}
		}	
	}	
}
