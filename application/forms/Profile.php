<?php

class Application_Form_Profile extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
   
   $this->setMethod("POST");
	
        $id=new Zend_Form_Element_Hidden("id");        

       //add firstname
        $f_name = new Zend_Form_Element_Text("f_name");
        $f_name->setRequired();
        $f_name->setLabel("First Name:");
        $f_name->setAttrib("placeholder", "Enter Your first Name");
        $f_name->addValidator(new Zend_Validate_Alnum("true"));
        $f_name->setAttrib("class", "form-control");
        $f_name->getDecorator("Label")->setOption("class", "control-label");
        $f_name->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $f_name->getDecorator("Errors")->setOption("style", " list-style-type:none");

         //add lastname 
        $l_name = new Zend_Form_Element_Text("l_name");
        $l_name->setRequired();
        $l_name->setLabel("Last Name:");
        $l_name->setAttrib("placeholder", "Enter Your last Name");
        $l_name->addValidator(new Zend_Validate_Alnum("true"));
        $l_name->setAttrib("class", "form-control");
        $l_name->getDecorator("Label")->setOption("class", "control-label");
        $l_name->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $l_name->getDecorator("Errors")->setOption("style", " list-style-type:none");

        //add mail
        $username = new Zend_Form_Element_Text("username");
        $username->setRequired();
        $username->setLabel("Username:");
        $username->setAttrib("placeholder", "Enter Your E-Mail");
        $username->addValidator(new Zend_Validate_EmailAddress);
           $username->setAttrib("class", "form-control");
        $username->getDecorator("Label")->setOption("class", "control-label");
        $username->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $username->getDecorator("Errors")->setOption("style", " list-style-type:none");


          //add address  
        $address = new Zend_Form_Element_Text("address");
        $address->setLabel("Adress:");
        $address->setAttrib("placeholder", "Enter Your adress");
        $address->addValidator(new Zend_Validate_Alnum("true"));
        $address->setAttrib("class", "form-control");
        $address->getDecorator("Label")->setOption("class", "control-label");
        $address->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $address->getDecorator("Errors")->setOption("style", " list-style-type:none");
  
          //add mobile  
        $mobile = new Zend_Form_Element_Text("mobile");
        $mobile->setLabel("Mobile:");
        $mobile->setAttrib("placeholder", "Enter Your mobile");
        $mobile->addValidator(new Zend_Validate_Alnum("true"));
        $mobile->setAttrib("class", "form-control");
        $mobile->getDecorator("Label")->setOption("class", "control-label");
        $mobile->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $mobile->getDecorator("Errors")->setOption("style", " list-style-type:none");

         //add phone  
        $phone = new Zend_Form_Element_Text("phone");
        $phone->setLabel("Phone:");
        $phone->setAttrib("placeholder", "Enter Your phone");
        $phone->addValidator(new Zend_Validate_Alnum("true"));
         $phone->setAttrib("class", "form-control");
        $phone->getDecorator("Label")->setOption("class", "control-label");
        $phone->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $phone->getDecorator("Errors")->setOption("style", " list-style-type:none");
          

        //add checkbox
        
        $status = new Zend_Form_Element_Radio("active"); 
        $status->addMultiOptions(array('1'=>'Active','0'=>'Notactive'));
        $status->setLabel('What is your status ?');
        $status->setAttrib("class", "form-control");
        $status->getDecorator("Label")->setOption("class", "control-label");
        $status->setRequired();

        $user_type = new Zend_Form_Element_Radio("user_type"); 
        $user_type->addMultiOptions(array('admin'=>'Admin','normal'=>'Normal'));        
        $user_type->setLabel('User Type');
        $user_type->setAttrib("class", "form-control");
        $user_type->getDecorator("Label")->setOption("class", "control-label");
        $user_type->setRequired();
 

        $password =new Zend_Form_Element_Password("password");
        $password->setRequired();
        $password->setLabel("Password:");
        $password->setAttrib("placeholder", "Enter Your Password");
        $password->setAttrib("class", "form-control");
        $password->getDecorator("Label")->setOption("class", "control-label");
        $password->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $password->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        $re_password = new Zend_Form_Element_Password("re_password");
        $re_password->setRequired();
        $re_password->setLabel("Retype Your Password:");
        $re_password->addValidator('identical', false, array('token' => 'password'));
        $re_password->setAttrib("placeholder", "Re-enter Your Password");
        $re_password->setAttrib("class", "form-control");
        $re_password->getDecorator("Label")->setOption("class", "control-label");
        $re_password->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $re_password->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", "btn btn-xl center-block");     

        
        $this->addElements(array($id,$f_name,$l_name,$username,$address,$password,$re_password,$mobile,$phone,$status,$user_type,$submit));

        // Add a captcha
        
        /*$this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));*/
    }
}

