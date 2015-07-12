<?php

class Application_Form_Commentshow extends Zend_Form
{

    public function init()
    {
  	$this->setMethod("POST");
        
        $body = new Zend_Form_Element_Textarea('body'); 
        $body->setLabel("Comment:");
        $body->setRequired();
        $body->setAttrib("rows", "10");
        $body->getDecorator("Errors")->setOption("class", "alert alert-error");
        $body->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
       
        
        $uid = new Zend_Form_Element_Hidden("uid");
        
        $mid = new Zend_Form_Element_Hidden("mid");
	    
	$cdate = new Zend_Form_Element_Hidden("cdate"); 
        
        $submit = new Zend_Form_Element_Submit("submit");
        //$submit->setAttrib("class", "btn");      
        
        $this->addElements(array($body,$cdate,$uid,$mid,$submit));
    }


}



