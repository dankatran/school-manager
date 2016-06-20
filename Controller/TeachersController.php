<?php 
	class TeachersController extends AppController {
		public $components = array('Paginator');
		//Before filter
		function beforeFilter() { 
	        parent::beforeFilter(); 
	        // CSRF Protection
	    	if (in_array($this->params['action'], array('add', 'edit'))) {
	        	$this->Security->validatePost = false;
	    	}  
		}
		public function index(){
			// $this->Teacher->recursive = 0;
			$teachers = $this->Teacher->find('all');
			// $this->set(compact('teachers'));
			$this->set('teachers', $this->Paginator->paginate());
			$this->set('title_for_layout', __d('croogo', 'Danh sách giáo viên'));
		}
		public function add(){
			$userid = $this->Session->read('Auth.User.id');
			if ($this->request->is('post')) {
				$this->Teacher->create();
				$this->request->data['Teacher']['user_id'] = $userid;
				if ($this->Teacher->save($this->request->data)) {
					$this->Session->setFlash(__('Thông tin giáo viên đã được lưu.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng kiểm tra lại'));
				}
			}
			$districts = $this->Teacher->District->find('list', array(
				'order' => array('District.name' => 'ASC')
			));
			$wards = $this->Teacher->Ward->find('list', array(
				'order' => array('Ward.name' => 'ASC')
			));
			$departments = $this->Teacher->Department->find('list', array(
				'order' => array('Department.name' => 'ASC')
			));
			$subjects = $this->Teacher->Subject->find('list', array(
				'order' => array('Subject.name' => 'ASC')
			));
			$this->set(compact('districts','wards','departments','subjects'));
			$this->set('title_for_layout', __d('croogo','Cập nhật thông tin giáo viên'));
		}
	}
