<?php 
	class SchedulesController extends AppController {
		var $name = 'Schedules';
		//Before filter
		function beforeFilter() { 
	        parent::beforeFilter(); 
	        // CSRF Protection
	    	if (in_array($this->params['action'], array('add', 'edit'))) {
	        	$this->Security->validatePost = false;
	    	}  
		}
		public function index(){
			$this->Schedule->recursive = 0;
			$schedules = $this->Schedule->find('all', array(
				'group' => 'Schedule.classroom_id'
			));
			$years = $this->Schedule->Year->find('list');
			$this->set(compact('schedules','years'));
			$this->set('title_for_layout', __d('croogo', 'Thời khóa biểu'));
		}
		public function add(){
			if (!empty($this->data)) {
				$this->Schedule->create();
				if ($this->Schedule->save($this->data))  {
					$this->Session->setFlash(__('Thời khóa biểu đã được lưu.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng kiểm tra lại'));
				}
			};
			$years = $this->Schedule->Year->find('list');
			$classrooms = $this->Schedule->Classroom->find('list');
			$subjects = $this->Schedule->Subject->find('list', array(
				'order' => array('Subject.name' => 'ASC')
			));
			$times = $this->Schedule->Time->find('list');
			$this->set(compact('years','classrooms','subjects','times'));
			$this->set('title_for_layout', __d('croogo','Thêm thời khóa biểu'));
		}
		public function edit($id = null) {
			if (!$this->Schedule->exists($id)) {
				throw new NotFoundException(__('Không tồn tại thời khóa biểu'));
			}
			$schedules = $this->Schedule->find('first', array(
				'conditions' => array('Schedule.id'=>$id)
			));
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Schedule->saveAll($this->request->data)) {
					$this->Session->setFlash(__('Thời khóa biểu đã được chỉnh sửa.'), 'flash', array('class' => 'alert alert-success'));
					return $this->redirect(array('controller' => 'classrooms','action' => 'schedule', $schedules['Classroom']['slug']));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng thử lại'));
				}
			} else {
				$options = array('conditions' => array('Schedule.' . $this->Schedule->primaryKey => $id));
				$this->request->data = $this->Schedule->find('first', $options);
			}
			$years = $this->Schedule->Year->find('list');
			$classrooms = $this->Schedule->Classroom->find('list');
			$subjects = $this->Schedule->Subject->find('list', array(
				'order' => array('Subject.name' => 'ASC')
			));
			$times = $this->Schedule->Time->find('list');
			$this->set(compact('years','classrooms','subjects','times'));
			$this->set('title_for_layout', __d('croogo','Sửa thông tin điểm thi'));
		}
		//Lọc thời khóa biểu theo năm học
		public function ajaxsearch(){
			$this->Schedule->recursive = 0;
			$this->layout = false;
			$yearid = $_GET['yearid'];
			if($yearid!=0){
				$schedules = $this->Schedule->find('all', array(
					'conditions' => array('Schedule.year_id' => $yearid),
					'group' => 'Schedule.classroom_id'
				));
				$this->set(compact('schedules'));
			}else{
				$schedules = $this->Schedule->find('all', array(
					'group' => 'Schedule.classroom_id'
				));
				$this->set(compact('schedules'));
			}
			$this->render('ajaxsearch');
		}
	}