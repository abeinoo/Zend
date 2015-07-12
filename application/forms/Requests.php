<?php

class Application_Form_Requests extends Zend_Form
{

    public function init()
    {
  	$this->setMethod("POST");
        
        $body = new Zend_Form_Element_Textarea('body'); 
        $body->setLabel("Request Body:");
        $body->setRequired();
        $body->getDecorator("Errors")->setOption("class", "alert alert-error");
        $body->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        $uid = new Zend_Form_Element_Hidden("uid");

	    
	$rdate = new Zend_Form_Element_Hidden("rdate"); 
        //$rdate->setValue(new Zend_Date());
        
        //$rdate = new Zend_Date($unixtimestamp, Zend_Date::TIMESTAMP);

        $submit = new Zend_Form_Element_Submit("submit");
        //$submit->setAttrib("class", "btn");
        
        

        $this->addElements(array($body,$rdate,$uid,$submit));
    }


}

