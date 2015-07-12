<?php

class Application_Model_Users extends Zend_Db_Table_Abstract
{
    protected $_name='users';
    function addUser($user_data)
    {
        $row = $this->createRow();
        $row->f_name = $user_data['f_name'];
        $row->l_name = $user_data['l_name'];
        $row->username = $user_data['username'];
        $row->password = md5($user_data['password']);
        return $row->save();       
    }
   function getUserByUsername($username)
    {
        return $this->fetchAll("username='".$username."'")->toArray();
           
    }
    public function getUserById($id)
    {
    return $this->find($id)->toArray();
    }
    function listUsers(){
        
        return $this->fetchAll()->toArray();
    
    }
 
    function editUser($user_data,$id)
    {
        $user_data['password']=md5($user_data['password']);
	$this->update($user_data, "id=$id");       
    }
    
   public function deleteUser($id)
    {
    $this->delete("id=$id");
    }
    
}
?>