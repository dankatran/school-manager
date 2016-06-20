<?php
	class DepartmentsController extends AppController {
		public $components = array('Paginator');
		public function admin_index(){
			$this->set('title_for_layout', __d('croogo', 'Tổ chuyên môn'));
			$this->Department->recursive = 0;
			$this->Paginator->settings = array(
				'conditions' => array('Department.id !=' => 10)
			);
			$this->set('departments', $this->Paginator->paginate());
		}
		public function admin_add(){
			if ($this->request->is('post')) {
				$this->Department->create();
				if ($this->Department->save($this->request->data)) {
					$this->Session->setFlash(__('Phòng ban đã được lưu.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Không thể lưu. Vui lòng thử lại'));
				}
			}
			$users = $this->Department->User->find('list', array(
				'conditions' => array('User.role_id'=>4)
			));
			$this->set(compact('users'));
		}
		public function admin_edit(){
			
		}
		public function index(){
			$this->set('title_for_layout', __d('croogo', 'Tổ chuyên môn'));
			$this->Department->recursive = 0;
			$this->Paginator->settings = array(
				'conditions' => array('Department.id !=' => 10)
			);
			$this->set('departments', $this->Paginator->paginate());
			$teachers = $this->Department->User->find('all', array(
				'conditions' => array(
					'User.role_id' => 4,
					'User.department_id !=' => 10
				),
				'fields' => array(
					'User.department_id'
				)
			));
			//pr($teachers); die();
			$this->set(compact('teachers'));
		}
		public function view($id=null,$slug=null){
			if (!$this->Department->exists($id)) {
				throw new NotFoundException(__('Không tồn tại tổ chuyên môn'));
			}
			$options = array(
				'conditions' => array('Department.id' => $id),
			);
			$departments = $this->Department->find('first', array(
				'conditions' => array('Department.id' => $id),
				'fields' => array(
					'Department.name',
					'Department.id'
				)
			));
			$teachers = $this->Department->User->find('all', array(
				'conditions' => array(
					'User.role_id' => 4,
					'User.department_id' => $id
				)
			));
			$this->set('department', $this->Department->find('first', $options));
			$this->set('title_for_layout', __d('croogo','Danh sách giáo viên tổ '.$departments['Department']['name'].''));
			$this->set(compact('departments','teachers'));
		}
	}