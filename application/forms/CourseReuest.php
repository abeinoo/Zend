<?php

class Application_Form_CourseReuest extends Zend_Form
{

    public function init()
    {
        $this->setAction("assignCourse");
        $user = new Zend_Form_Element_Select('uid');
        $user->setLabel('Select User:');
        //$user ->setMultiOptions(array( '1'=>'programing languages','2'=>'graphics'));
        $user ->setRequired(true)->addValidator('NotEmpty', true);
        $user->setAttrib("class", "form-control");
        $user->getDecorator("Label")->setOption("class", "control-label");
        $user->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $user->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        $course = new Zend_Form_Element_Select('cid');
        $course->setLabel('Select Course:');
        //$course ->setMultiOptions(array( '1'=>'programing languages','2'=>'graphics'));
        $course ->setRequired(true)->addValidator('NotEmpty', true);
        $course->setAttrib("class", "form-control");
        $course->getDecorator("Label")->setOption("class", "control-label");
        $course->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $course->getDecorator("Errors")->setOption("style", " list-style-type:none");
           
        $registration_date = new Zend_Form_Element_Hidden("registration_date");
        
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", "btn btn-xl center-block");
        //$submit->setAttrib("class", "btn");
        
        

        $this->addElements(array($user,$course,$registration_date,$submit));
    }


}

