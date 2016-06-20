<?php
	class YearsController extends AppController {
		public $components = array('Paginator');
		public function admin_index(){
			$this->Year->recursive = 0;
			$this->set('years', $this->Paginator->paginate());
		}
		//Admin_add
		public function admin_add(){
			if ($this->request->is('post')) {
				$this->Year->create();
				if ($this->Year->save($this->request->data)) {
					$this->Session->setFlash(__('Môn học đã được lưu.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng kiểm tra lại'));
				}
			}
		}
		//Admin edit
		public function admin_edit($id = null) {
			if (!$this->Year->exists($id)) {
				throw new NotFoundException(__('Không tồn tại môn học'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Year->save($this->request->data)) {
					$this->Session->setFlash(__('Môn học đã được chỉnh sửa.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng thử lại'));
				}
			} else {
				$options = array('conditions' => array('Year.' . $this->Year->primaryKey => $id));
				$this->request->data = $this->Year->find('first', $options);
			}
		}
		//Load classroom
		function classrooms(){
			$this->loadModel('Classroom');
	        $id = $_GET['yearid'];
	        $classrooms = $this->Classroom->find('all',
	        array(
	            'conditions' => array('Classroom.year_id' => $id),
	            'fields' => array('Classroom.id','Classroom.name','Classroom.year_id'),
	            'order'=>'Classroom.name'
	        ));
	        if(!empty($classrooms)) {
	        	echo "<option value=''>Chọn lớp học</option>";
		        foreach($classrooms as $c){
		             echo "<option value='".$c['Classroom']['id']."'>".__($c['Classroom']['name'],true)."</option>";
		        } 
		    }else{
		    	 echo "<option value=''>Chọn lớp học</option>";
		    }
	        die();
    	}
	}
?>