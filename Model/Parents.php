<?php
    class Parent extends AppModel {
    var $name = 'Parent';
    
    //------- Valid add new User
    function validateUser(){
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
}
?>