<?php
	class ClassroomsController extends AppController {
		public $components = array('Paginator');
		public function admin_index(){
			$this->Classroom->recursive = 0;
			$this->set('classrooms', $this->Paginator->paginate());
		}
		//Admin_add
		public function admin_add(){
			if ($this->request->is('post')) {
				$this->Classroom->create();
				if ($this->Classroom->save($this->request->data)) {
					$this->Session->setFlash(__('Lớp học đã được lưu.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng kiểm tra lại'));
				}
			}
			$years = $this->Classroom->Year->find('list');
			$users = $this->Classroom->User->find('list', array(
				'conditions' => array('User.role_id' => 4)
			));
			$this->set(compact('years','users'));
			$this->set('title_for_layout', __d('croogo','Thêm lớp học'));
		}
		//Admin edit
		public function admin_edit($id = null) {
			if (!$this->Classroom->exists($id)) {
				throw new NotFoundException(__('Không tồn tại lớp học'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Classroom->save($this->request->data)) {
					$this->Session->setFlash(__('Lớp học đã được chỉnh sửa.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng thử lại'));
				}
			} else {
				$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
				$this->request->data = $this->Classroom->find('first', $options);
			}
			$years = $this->Classroom->Year->find('list');
			$users = $this->Classroom->User->find('list', array(
				'conditions' => array('User.role_id' => 4)
			));
			$this->set(compact('years','users'));
			$this->set('title_for_layout', __d('croogo','Sửa thông tin lớp học'));
		}
		public function index(){
			$this->Classroom->recursive = 0;
			$this->set('classrooms', $this->Paginator->paginate());
			$total = $this->Classroom->find('count');
			$years = $this->Classroom->Year->find('list');
			$students = $this->Classroom->User->find('all');
			$this->set(compact('total','years','students'));
			$this->set('title_for_layout', __d('croogo','Danh sách lớp học'));
		}
		public function ajaxsearch() {
			$this->Classroom->recursive = 0;
			$this->layout = false;
			$yearid = $_GET['yearid'];
			if($yearid!=0){
				$classrooms = $this->Classroom->find('all', array(
					'conditions' => array('Classroom.year_id' => $yearid)
				));
				$total = $this->Classroom->find('count', array(
					'conditions' => array('Classroom.year_id' => $yearid)
				));
				$this->set(compact('classrooms','total'));
			}else{
				$total = $this->Classroom->find('count');
				$this->set('classrooms', $this->paginate());
				$this->set(compact('total'));
			}
			$users = $this->Classroom->User->find('all');
			$this->set(compact('users'));
			$this->render('ajaxsearch');
		}
		//Thời khóa biểu
		public function schedule($slug=null){
			$this->layout = 'points';
			$this->loadModel('Time');
			$this->loadModel('Schedule');
			$this->loadModel('Subject');
			if (!$this->Classroom->exists($slug)) {
				throw new NotFoundException(__('Không tồn tại thời khóa biểu'));
			}
			$classrooms = $this->Classroom->find('first', array(
				'conditions' => array('Classroom.slug' => $slug)
			));
			$options = array('conditions' => array('Classroom.slug' => $slug));
			$this->set('classroom', $this->Classroom->find('first', $options));
			$times = $this->Time->find('all');
			$schedules = $this->Schedule->find('all', array(
				'conditions' => array('Schedule.classroom_id' => $classrooms['Classroom']['id'])
			));
			$subjects = $this->Subject->find('list');
			$this->set(compact('times','schedules','subjects'));
			$this->set('title_for_layout', __d('croogo','Thời khóa biểu lớp '.$slug.''));
		}
		//Điểm thi
		public function points($slug=null){
			$this->layout = 'points';
			$this->loadModel('Subject');
			if (!$this->Classroom->exists($slug)) {
				throw new NotFoundException(__('Không tồn tại thời điểm thi'));
			}
			$classrooms = $this->Classroom->find('first', array(
				'conditions' => array('Classroom.slug' => $slug)
			));
			//pr($classrooms['Classroom']['id']); die();
			$students = $this->Classroom->User->find('all', array(
				'conditions' => array(
					'User.classroom_id LIKE' => '%"'.$classrooms['Classroom']['id'].'"%'
				)
			));
			//pr($students); die();
			$subjects = $this->Subject->find('all');
			$options = array(
				'conditions' => array('Classroom.slug' => $slug),
			);
			$this->set('classroom', $this->Classroom->find('first', $options));
			$this->set(compact('students','subjects'));
			$this->set('title_for_layout', __d('croogo','Điểm thi biểu lớp '.$slug.''));
		}
		//Học sinh
		public function students($slug=null){
			if (!$this->Classroom->exists($slug)) {
				throw new NotFoundException(__('Không tồn tại học sinh'));
			}
			$options = array(
				'conditions' => array('Classroom.slug' => $slug),
			);
			$classrooms = $this->Classroom->find('first', array(
				'conditions' => array('Classroom.slug' => $slug),
			));
			$this->set('classroom', $this->Classroom->find('first', $options));
			$students = $this->Classroom->User->find('all', array(
				'conditions' => array(
					'User.role_id' => 5,
					'User.classroom_id LIKE' => '%"'.$classrooms['Classroom']['id'].'"%'
				)
			));
			$this->set(compact('students'));
			$this->set('title_for_layout', __d('croogo','Danh sách học sinh lớp '.$slug.''));
		}
		//Ajax load hoc sinh
		function ajax(){
			//$this->loadModel('Classroom');
	        $id = $_GET['classid'];
	        $students = $this->Classroom->User->find('all',
	        array(
	            'conditions' => array('User.classroom_id LIKE' => '%"'.$id.'"%'),
	            'fields' => array('User.id','User.name','User.classroom_id'),
	            'order'=>'User.name'
	        ));
	        if(!empty($students)) {
	        	echo "<option value=''>Chọn học sinh</option>";
		        foreach($students as $s){
		             echo "<option value='".$s['User']['id']."'>".__($s['User']['name'],true)."</option>";
		        } 
		    }else{
		    	 echo "<option value=''>Chọn học sinh</option>";
		    }
	        die();
    	}
	}
?>