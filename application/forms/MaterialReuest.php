<?php

class Application_Form_MaterialReuest extends Zend_Form
{

    public function init()
    {
        $this->setAction("assignMaterial");
        $user = new Zend_Form_Element_Select('uid');
        $user->setLabel('Select User:');
        //$user ->setMultiOptions(array( '1'=>'programing languages','2'=>'graphics'));
        $user ->setRequired(true)->addValidator('NotEmpty', true);
        $user->setAttrib("class", "form-control");
        $user->getDecorator("Label")->setOption("class", "control-label");
        $user->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $user->getDecorator("Errors")->setOption("style", " list-style-type:none");
        
        $material = new Zend_Form_Element_Select('mid');
        $material->setLabel('Select Material:');
        //$course ->setMultiOptions(array( '1'=>'programing languages','2'=>'graphics'));
        $material ->setRequired(true)->addValidator('NotEmpty', true);
        $material->setAttrib("class", "form-control");
        $material->getDecorator("Label")->setOption("class", "control-label");
        $material->getDecorator("Errors")->setOption("class", "alert alert-danger");
        $material->getDecorator("Errors")->setOption("style", " list-style-type:none");
                 
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", "btn btn-xl center-block");
        //$submit->setAttrib("class", "btn");
        
        

        $this->addElements(array($user,$material,$submit));
    }


}

