<?php

class Application_Model_User extends Zend_Db_Table_Abstract
{
protected $_name= 'student' ;

public function addUser($user_data)
{
$row = $this->createRow();
$row->name =$user_data['fullname'];
$row->username = $user_data['username'];
$row->password =md5($user_data['password']);
return $row->save();
}

}

