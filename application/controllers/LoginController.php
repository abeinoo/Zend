<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		if($this->_request->isPost())
			{
				$username= $this->_request->getParam("username");
				$password= $this->_request->getParam("password");
				$db =Zend_Db_Table::getDefaultAdapter();
				$authAdapter = new Zend_Auth_Adapter_DbTable($db,'student','username', 'password');
				$authAdapter->setIdentity($username);
				$authAdapter->setCredential(md5($password));
				$result = $authAdapter->authenticate();
				if ($result->isValid()) 
				{
				//echo "if";
				$this->redirect('categories/list');
				}
				else
				{
					echo "else";
				//$this->render('index');
				}
			}
 
	}


}

