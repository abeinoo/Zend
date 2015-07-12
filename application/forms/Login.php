<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        
        $this->setMethod("POST");  
        $username = new Zend_Form_Element_Text("username");
        $username->setRequired();
        $username->setLabel("User Name:");
        $username->setAttrib("placeholder", "Enter Your E-Mail");
        $username->addValidator(new Zend_Validate_EmailAddress);
        $username->setAttrib("class", "form-control");
        $username->getDecorator("Label")->setOption("class", "control-label");
        $username->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $username->getDecorator("Errors")->setOption("style", " list-style-type:none");
        

     
        $password =new Zend_Form_Element_Password("password");
        $password->setRequired();
        $password->setLabel("Password:");
        $password->setAttrib("placeholder", "Enter Your Password");
        $password->setAttrib("class", "form-control");
        $password->getDecorator("Label")->setOption("class", "control-label");
        $password->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $password->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", "btn btn-xl center-block");
  

        $this->addElements(array($username,$password,$submit)); 

    }



}

