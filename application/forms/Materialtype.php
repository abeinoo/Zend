<?php

class Application_Form_Materialtype extends Zend_Form
{

    public function init()
    {
        $this->setMethod("POST");
	
        $type = new Zend_Form_Element_Text("type_name");
        $type->setRequired();
        $type->setLabel("Material Type Name:");
        $type->setAttrib("placeholder", "Enter Material Type Name");
        $type->addValidator(new Zend_Validate_Alnum("true"));
        $type->setAttrib("class", "form-control");
        $type->setAttrib("class", "form-control");
        $type->getDecorator("Label")->setOption("class", "control-label");
        $type->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $type->getDecorator("Errors")->setOption("style", " list-style-type:none");
              
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", "btn btn-xl center-block");
        
       // $submit->setAttrib("class", "btn");
	$this->addElements(array($type,$submit));
    }

}
