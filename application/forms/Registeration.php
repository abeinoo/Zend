<?php

class Application_Form_Registeration extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

   $this->setMethod("POST");
	
		$uid=new Zend_Form_Element_Hidden("user_id");        

       //add firstname
        $f_name = new Zend_Form_Element_Text("f_name");
        $f_name->setRequired();
        $f_name->setLabel("first Name:");
        $f_name->setAttrib("placeholder", "Enter Your first Name");
        $f_name->addValidator(new Zend_Validate_Alnum("true"));
        $f_name->setAttrib("class", "form-control");
        $f_name->getDecorator("Label")->setOption("class", "control-label");
        $f_name->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $f_name->getDecorator("Errors")->setOption("style", " list-style-type:none");

         //add lastname 
        $l_name = new Zend_Form_Element_Text("l_name");
        $l_name->setRequired();
        $l_name->setLabel("Last Name");
        $l_name->setAttrib("placeholder", "Enter Your last Name");
        $l_name->addValidator(new Zend_Validate_Alnum("true"));
        $l_name->setAttrib("class", "form-control");
        $l_name->getDecorator("Label")->setOption("class", "control-label");
        $l_name->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $l_name->getDecorator("Errors")->setOption("style", " list-style-type:none");
        //add mail
        $username = new Zend_Form_Element_Text("username");
        $username->setRequired();
        $username->setLabel("E-Mail");
        $username->setAttrib("placeholder", "Enter Your E-Mail");
        $username->addValidator(new Zend_Validate_EmailAddress);
        $username->getDecorator("Label")->setOption("class", "control-label");
        $username->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $username->getDecorator("Errors")->setOption("style", " list-style-type:none");

     
        $password =new Zend_Form_Element_Password("password");
        $password->setRequired();
        $password->setLabel("Password");
        $password->setAttrib("placeholder", "Enter Your Password");
        $password->setAttrib("class", "form-control");
        $password->getDecorator("Label")->setOption("class", "control-label");
        $password->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $password->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        $re_password = new Zend_Form_Element_Password("re_password");
        $re_password->setRequired();
        $re_password->setLabel("Retype Your Password");
        $re_password->addValidator('identical', false, array('token' => 'password'));
        $re_password->setAttrib("placeholder", "Re-enter Your Password");
        $re_password->setAttrib("class", "form-control");
        $re_password->getDecorator("Label")->setOption("class", "control-label");
        $re_password->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $re_password->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", "btn btn-xl center-block");
  

        $this->addElements(array($uid,$f_name,$l_name,$username,$password,$re_password,$submit));      
     
    }


}

