<?php

App::uses('AppController', 'Controller');

/**
 * Parents Application controller
 *
 * @category Controllers
 * @package  Croogo.Parents.Controller
 * @since    1.5
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class ParentsAppController extends AppController {
	var $components = array('Auth');
	function beforeFilter(){
        Security::setHash("md5");
        $this->Auth->parentModel = 'Parent';
        $this->Auth->fields = array('username' => 'username', 'password' => 'password');
        $this->Auth->loginAction = array('admin' => false, 'controller' => 'parents', 'action' => 'login');
        $this->Auth->loginRedirect = array('admin' =>true,'controller' => 'parents', 'action' => 'index');
        $this->Auth->loginError = 'Username / password combination.  Please try again';
        $this->Auth->authorize = 'controller';
        
        $this->set("admin",$this->_isAdmin());
        $this->set("logged_in",$this->_isLogin());
        $this->set("parents_parentid",$this->_parentsParentID());
        $this->set("parents_username",$this->_parentsUsername());
  	}

  	function _isAdmin(){
	    $admin = FALSE;
	    if($this->Auth->parent("role_id")==1)
	        $admin = TRUE;
	    return $admin; 
	 }

	 function _isLogin(){
	    $login = FALSE;
	    if($this->Auth->parent()){
	        $login = TRUE;
	    }
	    return $login;
  	}

  	function _parentsParentID(){
	    $parents_parentid = NULL;
	    if($this->Auth->parent())
	        $parents_parentid = $this->Auth->parent("id");
	    return $parents_parentid;
	}

	 function _parentsUsername(){
	    $parents_username = NULL;
	    if($this->Auth->parent())
	        $parents_username = $this->Auth->parent("username");
	    return $parents_username;
	}

	function isAuthorized() {
        if (isset($this->params['admin'])) {
       
            if ($this->Auth->parent('role_id') != 1) {
                $this->Auth->allow("index");
                $this->redirect("/parents");
            }
        }
        return true;
  	}
}
