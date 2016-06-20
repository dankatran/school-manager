<?php
	class StudentsController extends AppController {
		var $name = 'Students';
		public $components = array('Paginator');
		function beforeFilter() { 
            parent::beforeFilter(); 
            // CSRF Protection
        	if (in_array($this->params['action'], array('add', 'edit'))) {
            	$this->Security->validatePost = false;
        	}  
		}
		public function admin_index(){
			$this->Student->recursive = 0;
			$this->set('students', $this->Paginator->paginate());
		}
		public function index(){
			$this->Student->recursive = 0;
			$this->set('students', $this->Paginator->paginate());
			$classrooms = $this->Student->Classroom->find('list');
			$years = $this->Student->Year->find('list');
			$total = $this->Student->find('count');
			$this->set(compact('classrooms','years','total'));
			$this->set('title_for_layout', __d('croogo', 'Danh sách học sinh'));
		}
		public function add(){
			$userid = $this->Session->read('Auth.User.id');
			if (!empty($this->data)) {
				$this->Student->create();
				$this->request->data['Student']['user_id'] = $userid; 
				if ($this->Student->save($this->data))  {
					$this->Session->setFlash(__('Học sinh đã được lưu.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng kiểm tra lại'));
				}
			};
			$years = $this->Student->Year->find('list');
			$classrooms = $this->Student->Classroom->find('list');
			$this->set(compact('years','classrooms'));
		}
		public function mystudent() {
			$userid = $this->Session->read('Auth.User.id');
			$users = $this->Student->User->find('first', array(
				'conditions' => array('User.id' => $userid)
			));
			$students = $this->Student->find('all', array(
				'conditions' => array('Student.user_id' => $users['User']['id'])
			));
			$this->set(compact('users','students'));
			$this->set('title_for_layout', __d('croogo', 'Thông tin học sinh'));
		}
		public function ajaxsearch(){
			$this->Student->recursive = 0;
			$this->layout = false;
			$classid = $_GET['classid'];
			if($classid!=0){
				$students = $this->Student->find('all', array(
					'conditions' => array('Student.classroom_id' => $classid)
				));
				$total = $this->Student->find('count', array(
					'conditions' => array('Student.classroom_id' => $classid)
				));
				$this->set(compact('students','total'));
			}else{
				$total = $this->Student->find('count');
				$this->set('students', $this->paginate());
				$this->set(compact('total'));
			}
			$this->render('ajaxsearch');
		}
		public function years(){
			$this->Student->recursive = 0;
			$this->layout = false;
			$yearid = $_GET['yearid'];
			if($yearid!=0){
				$students = $this->Student->find('all', array(
					'conditions' => array('Student.year_id' => $yearid)
				));
				$total = $this->Student->find('count', array(
					'conditions' => array('Student.year_id' => $yearid)
				));
				$this->set(compact('students','total'));
			}else{
				$total = $this->Student->find('count');
				$this->set('students', $this->paginate());
				$this->set(compact('total'));
			}
			$this->render('years');
		}
		public function point($slug=null){
			$this->layout = 'points';
			$this->loadModel('Subject');
			if (!$this->Student->exists($slug)) {
				throw new NotFoundException(__('Không tồn tại điểm thi'));
			}
			$students = $this->Student->find('first', array(
				'conditions' => array('Student.id' => $slug)
			));
			$options = array(
				'conditions' => array('Student.id' => $slug),
			);
			$subjects = $this->Subject->find('all', array(
				'order' => array('Subject.name' => 'ASC')
			));
			$this->set('student', $this->Student->find('first', $options));
			$this->set(compact('students','subjects'));
			$this->set('title_for_layout', __d('croogo','Điểm thi của '.$students['Student']['name'].''));
		}
	}
?>