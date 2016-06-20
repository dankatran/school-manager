<?php
	class TimesController extends AppController {
		public $components = array('Paginator');
		public function admin_index(){
			$this->Time->recursive = 0;
			$this->set('times', $this->Paginator->paginate());
			$this->set('title_for_layout', __d('croogo', 'Quản lý tiết học'));
		}
		//Admin_add
		public function admin_add(){
			if ($this->request->is('post')) {
				$this->Time->create();
				if ($this->Time->save($this->request->data)) {
					$this->Session->setFlash(__('The time has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The time could not be saved. Please, try again.'));
				}
			}
		}
		//Admin edit
		public function admin_edit($id = null) {
			if (!$this->Time->exists($id)) {
				throw new NotFoundException(__('Invalid Time'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Time->save($this->request->data)) {
					$this->Session->setFlash(__('The Time has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Time could not be saved. Please, try again.'));
				}
			} else {
				$options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
				$this->request->data = $this->Time->find('first', $options);
			}
		}
	}
?>