<?php
	class WardsController extends AppController {
		public $components = array('Paginator');
		public function admin_index(){
			$this->Ward->recursive = 0;
			$this->set('wards', $this->Paginator->paginate());
			$districts = $this->Ward->District->find('list', array(
				'order' => array('District.name' => 'ASC')
			));
			$this->set(compact('districts'));
		}
		//Admin_add
		public function admin_add(){
			if ($this->request->is('post')) {
				$this->Ward->create();
				if ($this->Ward->save($this->request->data)) {
					$this->Session->setFlash(__('Xã phường đã được lưu.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng kiểm tra lại'));
				}
			}
			$districts = $this->Ward->District->find('list');
			$this->set(compact('districts'));
		}
		//Admin edit
		public function admin_edit($id = null) {
			if (!$this->Ward->exists($id)) {
				throw new NotFoundException(__('Không tồn tại xã phường'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Ward->save($this->request->data)) {
					$this->Session->setFlash(__('Xã phường đã được chỉnh sửa.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng thử lại'));
				}
			} else {
				$options = array('conditions' => array('Ward.' . $this->Ward->primaryKey => $id));
				$this->request->data = $this->Ward->find('first', $options);
			}
			$districts = $this->Ward->District->find('list');
			$this->set(compact('districts'));
		}
		public function ajaxsearch() {
			$this->Ward->recursive = 0;
			$this->layout = false;
			$districtid = $_GET['districtid'];
			if($districtid!=0){
				$wards = $this->Ward->find('all', array(
					'conditions' => array('Ward.district_id' => $districtid)
				));
				$this->set(compact('wards'));
			}else{
				$this->set('wards', $this->paginate());
			}
			$this->render('ajaxsearch');
		}
	}
?>