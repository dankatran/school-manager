<?php
	class DistrictsController extends AppController {
		public $components = array('Paginator');
		public function admin_index(){
			$this->District->recursive = 0;
			$this->set('districts', $this->Paginator->paginate());
		}
		//Admin_add
		public function admin_add(){
			if ($this->request->is('post')) {
				$this->District->create();
				if ($this->District->save($this->request->data)) {
					$this->Session->setFlash(__('Quận huyện đã được lưu.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng kiểm tra lại'));
				}
			}
		}
		//Admin edit
		public function admin_edit($id = null) {
			if (!$this->District->exists($id)) {
				throw new NotFoundException(__('Không tồn tại quận huyện'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->District->save($this->request->data)) {
					$this->Session->setFlash(__('Quận huyện đã được chỉnh sửa.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng thử lại'));
				}
			} else {
				$options = array('conditions' => array('District.' . $this->District->primaryKey => $id));
				$this->request->data = $this->District->find('first', $options);
			}
		}
		function wards(){
			$this->loadModel('Ward');
	        $id = $_GET['ward'];
	        $wards = $this->Ward->find('all',
	        array(
	            'conditions' => array('Ward.district_id' => $id),
	            'fields' => array('Ward.id','Ward.name','Ward.district_id'),
	            'order'=>'Ward.name'
	        ));
	        if(!empty($wards)) {
	        	echo "<option value=''>Chọn xã phường</option>";
		        foreach($wards as $w){
		             echo "<option value='".$w['Ward']['id']."'>".__($w['Ward']['name'],true)."</option>";
		        } 
		    }else{
		    	 echo "<option value=''>Chọn xã phường</option>";
		    }
	        die();
    	}
	}
?>