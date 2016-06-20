<?php
	class SubjectsController extends AppController {
		public $components = array('Paginator');
		public function admin_index(){
			$this->Subject->recursive = 0;
			$this->set('subjects', $this->Paginator->paginate());
			$this->set('title_for_layout', __d('croogo', 'Quản lý môn học'));
		}
		//Admin_add
		public function admin_add(){
			if ($this->request->is('post')) {
				$this->Subject->create();
				if ($this->Subject->save($this->request->data)) {
					$this->Session->setFlash(__('Môn học đã được lưu.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The subject could not be saved. Please, try again.'));
				}
			}
		}
		//Admin edit
		public function admin_edit($id = null) {
			if (!$this->Subject->exists($id)) {
				throw new NotFoundException(__('Không tồn tại môn học'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Subject->save($this->request->data)) {
					$this->Session->setFlash(__('Môn học đã được chỉnh sửa.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng thử lại'));
				}
			} else {
				$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
				$this->request->data = $this->Subject->find('first', $options);
			}
		}
	}
?>