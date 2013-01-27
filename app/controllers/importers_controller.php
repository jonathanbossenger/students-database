<?php
class ImportersController extends AppController {

	var $name = 'Importers';
	var $uses = array();


	
	function index(){
		
	}
	
	function download(){
		
	}
	
	function excel() {

		if (!empty($this->data)) {
			$result = $this->uploadFile('uploads/imports', $this->data['Importer']['file']);
			if (!isset($result['errors'])){
				$this->data['Importer']['file'] = $result['url']; 
			}
			//die($this->data['Importer']['file']);
			$this->readExcel($this->data['Importer']['file']);
			$this->loadModel('Importers');
			$this->NewsletterAttachment->create();
			if ($this->NewsletterAttachment->save($this->data)) {
				$this->Session->setFlash(__('The newsletter attachment has been saved', true));
				$this->redirect(array('action' => 'index', $newsletterId));
			} else {
				$this->Session->setFlash(__('The newsletter attachment could not be saved. Please, try again.', true));
			}
		}	
	}	
}
