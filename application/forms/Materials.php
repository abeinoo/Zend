<?php

class Application_Form_Materials extends Zend_Form
{

    public function init()
    {
 /* Form Elements & Other Definitions Here ... */
        $this->setMethod("POST");
        
        $name = new Zend_Form_Element_Text("name");
        $name->setRequired();
        $name->setLabel("material name:");
        $name->setAttrib("placeholder", "Enter material name");
        $name->addValidator(new Zend_Validate_Alnum("true"));
        $name->setAttrib("class", "form-control");
        $name->getDecorator("Label")->setOption("class", "control-label");
        $name->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $name->getDecorator("Errors")->setOption("style", " list-style-type:none");
        

        $path = new Zend_Form_Element_File('path');
        $path->setLabel('Select File:');
        $path->setRequired();
        $path->setAttrib("class", "form-control");
        $path->setAttrib("class", "file-loading");
        $path->getDecorator("Label")->setOption("class", "control-label");
        $path->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $path->getDecorator("Errors")->setOption("style", " list-style-type:none");

        
        $course = new Zend_Form_Element_Select('cid');
        $course->setLabel('Course Name:');
        //$course ->setMultiOptions(array( '5'=>'a','6'=>'c'));
        $course ->setRequired(true)->addValidator('NotEmpty', true);
        $course->setAttrib("class", "form-control");
        $course->getDecorator("Label")->setOption("class", "control-label");
        $course->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $course->getDecorator("Errors")->setOption("style", " list-style-type:none");
                
        $type = new Zend_Form_Element_Select('tid');
        $type->setLabel('Material Type:');
        //$type->setMultiOptions(array( '1'=>'pdf','2'=>'ppt'));
        $type->setRequired(true)->addValidator('NotEmpty', true);
        $type->setAttrib("class", "form-control");
        $type->getDecorator("Label")->setOption("class", "control-label");
        $type->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $type->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        $mdate = new Zend_Form_Element_Hidden("mdate");
        
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", "btn btn-xl center-block");
        //$submit->setAttrib("class", "btn");
        
        

        $this->addElements(array($name,$path,$course,$type,$mdate,$submit));
        
        
    }





}

