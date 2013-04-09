<?php
class CategoriesController extends AppController {

	var $name = 'Categories';

	function get() {
		$categoryId = $this->params['pass'][0];
		$categories = $this->Category->find('all', array('fields' => array('id', 'name'), 'conditions' => array('Category.parent_id'=>$categoryId)));
		$this->layout = false; 
		$this->render(false);
		echo json_encode($categories);
	}
	
	function index() {
		
		/*$this->paginate = array(
				'conditions' => array('Category.parent_id'=>null),
		);*/
		$Categories = $this->Category->find('list');
		$this->set(compact('Categories'));
		$this->set('categories', $this->paginate());		
		
		/*
		$this->paginate['Category'] = array(
				'fields'=> array('Category.parent_id'=>null),
				'order'=>array('Category.lft asc')
				
		);
		//$this->data = $this->paginate();		
		
		//$this->Category->recursive = 0;
		//$this->set('categories', $this->paginate());
                //$data = $this->Category->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;');
                $this->set('categories', $this->paginate());
		*/
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$parentCategories = array_reverse($this->data['Category']['parent_category']);
			foreach ($parentCategories as $parentCategory){
				if ($parentCategory > 0){
					$this->data['Category']['parent_id'] = $parentCategory;
				}
			}
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
		$parentCategories = $this->Category->find('list', array('conditions' => array('Category.parent_id' => null)));
		$parentCategories = array('0' => 'None') + $parentCategories;
		$this->set(compact('parentCategories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
		}
		$parentCategories = $this->Category->find('list');
		$parentCategories = array('0' => 'None') + $parentCategories;
		$this->set(compact('parentCategories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Category->delete($id)) {
			$this->Session->setFlash(__('Category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
		$parentCategories = $this->Category->ParentCategory->find('list');
		$this->set(compact('parentCategories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
		}
		$parentCategories = $this->Category->ParentCategory->find('list');
		$this->set(compact('parentCategories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Category->delete($id)) {
			$this->Session->setFlash(__('Category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
