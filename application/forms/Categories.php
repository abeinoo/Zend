<?php

class Application_Form_Categories extends Zend_Form
{

    public function init()
    {
        $this->setMethod("POST");
	
        $category = new Zend_Form_Element_Text("name");
        $category->setRequired();
        $category->setLabel("category Name:");
        $category->setAttrib("placeholder", "Enter Category Name");
        $category->addValidator(new Zend_Validate_Alnum("true"));
        $category->setAttrib("class", "form-control");
        $category->getDecorator("Label")->setOption("class", "control-label");
        $category->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $category->getDecorator("Errors")->setOption("role", "alert");
        $category->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        
        $description = new Zend_Form_Element_Textarea("description");
        $description->setLabel('Description:');
        $description->setRequired();
        $description->setAttrib("rows", "10");
        $description->setAttrib("class", "form-control");
        $description->getDecorator("Label")->setOption("class", "control-label");
        $description->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $description->getDecorator("Errors")->setOption("style", " list-style-type:none");
         
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", "btn btn-xl center-block");
       // $submit->setAttrib("class", "btn");
	$this->addElements(array($category,$description,$submit));
    }

}


