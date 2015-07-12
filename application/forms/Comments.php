<?php

class Application_Form_Comments extends Zend_Form
{

    public function init()
    {
  	$this->setMethod("POST");
        
        $body = new Zend_Form_Element_Textarea('body'); 
        $body->setLabel("Comment:");
        $body->setAttrib("class", "form-control");
        $body->setRequired();
        $body->setAttrib("rows", "10");
        $body->getDecorator("Label")->setOption("class", "control-label");
        $body->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $body->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        $uid = new Zend_Form_Element_Hidden("uid");
        
        $mid = new Zend_Form_Element_Hidden("mid");
	    
	$cdate = new Zend_Form_Element_Hidden("cdate"); 
        
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", "btn btn-xl center-block");
        //$submit->setAttrib("class", "btn");      
        
        $this->addElements(array($body,$cdate,$uid,$mid,$submit));
    }


}

