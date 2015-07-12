<?php

class Application_Form_Course extends Zend_Form
{

    public function init()
    {
 /* Form Elements & Other Definitions Here ... */
        $this->setMethod("POST");
        //$this->setAttrib("class", "form-group has-success ");
        //$this->setAttrib("role","form")
        
        $course_name = new Zend_Form_Element_Text("name");
        $course_name->setRequired();
        $course_name->setLabel("course name:");
        $course_name->setAttrib("placeholder", "Enter course name");
    
        $course_name->addValidator(new Zend_Validate_Alnum("true"));
        $course_name->setAttrib("class", "form-control");
        $course_name->getDecorator("Label")->setOption("class", "control-label");
        $course_name->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $course_name->getDecorator("Errors")->setOption("role", "alert");
        $course_name->getDecorator("Errors")->setOption("style", " list-style-type:none");
        

        $category = new Zend_Form_Element_Select('catid');
        $category->setLabel('category:');
        //$category ->setMultiOptions(array( '1'=>'programing languages','2'=>'graphics'));
        $category ->setRequired(true)->addValidator('NotEmpty', true);
        $category->setAttrib("class", "form-control");
        $category->getDecorator("Label")->setOption("class", "control-label");
        //$category->getDecorator("Label")->setOption("class", "color-org");
        $category->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $category->getDecorator("Errors")->setOption("style", " list-style-type:none");

        
        $hours = new Zend_Form_Element_Text("hours");
        $hours->setRequired();
        $hours->setLabel("hours:");
        $hours->setAttrib("placeholder", "Enter Course hours");
        $hours->setAttrib("class", "form-control");
        $validator=$hours->addValidator(new Zend_Validate_Digits("true"));
        $hours->getDecorator("Label")->setOption("class", "control-label");
        $hours->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $hours->getDecorator("Errors")->setOption("style", " list-style-type:none");
       
        $description = new Zend_Form_Element_Textarea("description");
        $description->setLabel('Description:');
        $description->setRequired();
        $description->setAttrib("rows", "10");
        $description->setAttrib("class", "form-control");
        $description->getDecorator("Label")->setOption("class", "control-label");
        $description->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $description->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        //$catid = new Zend_Form_Element_Hidden("catid");
        
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", "btn btn-xl center-block");
        //$submit->setAttrib("class", "btn");
        
        

        $this->addElements(array($course_name,$category,$hours,$description,$submit));
        
        
    }



}

