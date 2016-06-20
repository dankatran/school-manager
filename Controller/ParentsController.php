<?php
	App::uses('CakeEmail', 'Network/Email');
	App::import('Html',"html");
	App::import('Form',"form");
	App::import('Session',"session");
	class ParentsController extends AppController {
		var $components = array('Auth');
		function beforeFilter(){
			parent::beforeFilter();
	        Security::setHash("md5");
	        $this->Auth->userModel = 'Parent';
	        $this->Auth->fields = array('username' => 'username', 'password' => 'password');
	        $this->Auth->loginAction = array('admin' => false, 'controller' => 'parents', 'action' => 'login');
	        $this->Auth->loginRedirect = array('admin' =>true,'controller' => 'parents', 'action' => 'index');
	        $this->Auth->loginError = 'Username / password combination.  Please try again';
	        $this->Auth->authorize = 'controller';
	        
	        $this->set("admin",$this->_isAdmin());
	        $this->set("logged_in",$this->_isLogin());
	        $this->set("parents_parentid",$this->_parentsParentID());
	        $this->set("parents_username",$this->_parentsUsername());
	        $this->Components->unload('Security');
	  	}
	  	function _isAdmin(){
		    $admin = FALSE;
		    if($this->Auth->user("role_id")==1)
		        $admin = TRUE;
		    return $admin; 
		 }

		 function _isLogin(){
		    $login = FALSE;
		    if($this->Auth->user()){
		        $login = TRUE;
		    }
		    return $login;
	  	}

	  	function _parentsParentID(){
		    $parents_parentid = NULL;
		    if($this->Auth->user())
		        $parents_parentid = $this->Auth->user("id");
		    return $parents_parentid;
		}

		 function _parentsUsername(){
		    $parents_username = NULL;
		    if($this->Auth->user())
		        $parents_username = $this->Auth->user("username");
		    return $parents_username;
		}

		function isAuthorized() {
	        if (isset($this->params['admin'])) {
	       
	            if ($this->Auth->user('role_id') != 1) {
	                $this->Auth->allow("index");
	                $this->redirect("/parents");
	            }
	        }
	        return true;
	  	}
	  	function validateParent(){
        $this->validate = array(
            "username"=>array(
                "rule1" =>array(
                    "rule" => "notEmpty",
                    "message" => "Username can not empty",
                    ),
                "rule2" => array(
                    "rule" => "/^[a-z0-9_.]{4,}$/i",
                    "message" => "Username must be alpha & integer",
                    ),
                "rule3" =>array(
                    "rule" => "checkUsername", // call function check Username
                    "message" => "Username has been registered",
                    ),
            ),
            "password"=>array(
                "rule" => "notEmpty",
                "message" => "Password can not empty",
                "on" => "create"
            ),
            "re_pass"=>array(
                "rule1"=>array(
                  "rule" => "notEmpty",
                  "message" => "Password comfirm can not empty",
                  "on" => "create"  
                ),
                "match" => array( 
                  "rule" => "ComparePass", // call function compare password
                  "message" => "Password comfirm are not match",
                ),
            ),
            "role_id"=>array(
                "rule" => "notEmpty",
                "message" => "Please select level",
                
            ),                
            "email"=>array(
                "rule" => "email",
                "message" => "Email is not avalible",
            ),
        );
        if($this->validates($this->validate)) 
            return TRUE; 
        else 
            return FALSE;
    }
    
    //--------- Compare Pass
    function ComparePass(){
        if($this->data['Parent']['password']!=$this->data['Parent']['re_pass']){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
    //-------- Check Useranme
    function checkUsername(){
        if(isset($this->data[$this->name]['id'])){
            $where = array(
                "id !=" => $this->data[$this->name]['id'],
                "username" => $this->data[$this->name]['username'],
            ); 
                 
        }
        else{
            $where = array(
                "username" => $this->data[$this->name]['username'],
            );  
        } 
        $this->find($where);
        $count = $this->getNumRows();
        if($count!=0){
            return false;
        }
        else{
            return true;
        }
    }
		// function beforeFilter(){
  //       	parent::beforeFilter();
  //   	}
	  	//--- HashPassword
	    function hashPassword($data){
	        if(isset($this->data['Parent']['password'])){
	            $this->data['Parent']['password'] = Security::hash($this->data['Parent']['password'],NULL,TRUE);
	            return $data;
	        }
	        return $data;
	    }
	    //----- beforeSave
	    function beforeSave(){
	        $this->hashPassword(NULL,TRUE);
	        return TRUE;
	    }   

    	function index(){
	       $data = $this->Parent->find("all"); 
	       $this->set("data",$data);  
	    }

	    function admin_add() {
	        if(!empty($this->data)){
	          $this->Parent->set($this->data);
	          //if($this->Parent->validateParent()){
	            $this->Parent->save($this->data);
	            //$this->request->data['Parent']['role_id'] = 6;
	            $this->Session->setFlash("Đã thêm phụ huynh!");
	            $this->redirect("/admin/parents");  
	          //}  
	          
	        }else{
	          $this->render();

	        }
	    }
	}