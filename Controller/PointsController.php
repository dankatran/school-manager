<?php 
	class PointsController extends AppController {
		public $components = array('Paginator');
		public function admin_index(){
			$this->Point->recursive = 0;
			$this->set('points', $this->Paginator->paginate());
		}
		//Danh sách điểm thi
		public function index(){
			$this->Point->recursive = 0;
			$points = $this->Point->find('all', array(
				'group' => 'Point.classroom_id'
			));
			$years = $this->Point->Year->find('list');
			$this->set(compact('points','years'));
			$this->set('title_for_layout', __d('croogo','Xem điểm thi'));
		}
		//Thêm điểm thi
		public function add(){
			if ($this->request->is('post')) {
				$this->Point->create();
				if ($this->Point->save($this->request->data)) {
					$this->Session->setFlash(__('Điểm thi đã được lưu.'),'flash', array('class' => 'alert alert-success'));
					return $this->redirect(array('action' => 'add'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng kiểm tra lại'));
				}
			}
			$subjects = $this->Point->Subject->find('list', array(
				'order' => array('Subject.name' => 'ASC')
			));
			$years = $this->Point->Year->find('list', array());
			$classrooms = $this->Point->Classroom->find('list');
			$users = $this->Point->User->find('list', array(
				'order' => array('User.name' => 'ASC'),
				'conditions' => array('User.role_id' => 5)
			));
			$this->set(compact('subjects','years','classrooms','users'));
			$this->set('title_for_layout', __d('croogo','Nhập điểm thi'));
		}
		// Filter point by year
		public function years() {
			$this->Point->recursive = 0;
			$this->layout = false;
			$yearid = $_GET['yearid'];
			if($yearid!=0){
				$points = $this->Point->find('all', array(
					'conditions' => array('Point.year_id' => $yearid),
					'group' => 'Point.classroom_id'
				));
				$total = $this->Point->find('count', array(
					'conditions' => array('Point.year_id' => $yearid),
					'group' => 'Point.classroom_id'
				));
				$this->set(compact('points','total'));
			}else{
				$total = $this->Point->find('count', array(
					'group' => 'Point.classroom_id'
				));
				$this->Paginator->settings = array(
					'group' => 'Point.classroom_id'
				);
				$this->set('points', $this->paginate());
				$this->set(compact('total'));
			}
			$this->render('years');
		}
	}