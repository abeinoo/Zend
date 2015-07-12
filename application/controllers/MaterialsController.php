<?php

class MaterialsController extends Zend_Controller_Action
{

    public function init()
    {
            $authorization =Zend_Auth::getInstance();
            $identity=$authorization->getIdentity();
             $this->view->identity=$identity;
        // $authorization =Zend_Auth::getInstance();
        // if(!$authorization->hasIdentity()) 
        // {
        //     $this->redirect("users/login");
        // }
    }

    public function indexAction()
    {
       $this->_redirect("/materials/list");
    }

    public function addAction()
    {
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        if($identity->user_type=="admin")
        {
                $form=new Application_Form_Materials();
                $form->getElement("mdate")->setAttrib("value",date('Y-m-d'));
                $course_model = new Application_Model_Courses();
                $courses= $course_model->listCourses();
                for($i=0;$i<count($courses);$i++ )
                {
                    $options[$courses[$i]['id']]=$courses[$i]['name'];
                }
                $form->getElement('cid')->setMultiOptions($options);
                $options=NULL;
                
                $type_model = new Application_Model_Materialtype();
                $types= $type_model->listTypes();
                for($i=0;$i<count($types);$i++ )
                {
                    $options[$types[$i]['id']]=$types[$i]['type_name'];
                }
                $form->getElement('tid')->setMultiOptions($options);
                
                if($this->getRequest()->isPost())
                    {
                        if($form->isValid($_POST))
                            {
                                $model = new Application_Model_Materials();
                                $this->view->success = $model->addMaterial($form->getValues());
                               $form->reset();
                            }
                    }
                $this->view->form=$form;
        }
        else
        {
            $this->view->notAllwed="The page not allowed for normal user.";
            $this->_redirect("/materials/list");
        }
        
    }

    public function listAction()
    {        
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        if($identity)
                {
                    $model = new Application_Model_Materials();
                    $materials= $model->listMaterials();
                    $course_model = new Application_Model_Courses();
                    for($i=0;$i<count($materials);$i++ )
                    {
                        $courses[$i]=$course_model->getCourseById($materials[$i]['cid'])[0]['name'];
                    }
                    $type_model = new Application_Model_Materialtype();
                    for($i=0;$i<count($materials);$i++ )
                    {
                        $types[$i]=$type_model->getTypeById($materials[$i]['tid'])[0]['type_name'];
                    }
                    //$page=$this->_getParam('page',1);
                    //$paginator = Zend_Paginator::factory($courses);
                   // $paginator->setItemCountPerPage(10);
                    //$paginator->setCurrentPageNumber($page);

                    $this->view->materials=$materials;
                    $this->view->courses =$courses;
                    $this->view->types =$types ;
                    $this->view->identity = $identity;
                }
                else 
                {
                    $this->_redirect("/users/login");
                }
                

        
        
        
    }

    public function editAction()
    {
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        if($identity->user_type=="admin")
        {
            $form=new Application_Form_Materials();
            $model = new Application_Model_Materials();
            $id = $this->getRequest()->getParam('id');
            $material_data = $model->getMaterialById($id);

            $course_model = new Application_Model_Courses();
            $courses= $course_model->listCourses();
            for($i=0;$i<count($courses);$i++ )
               {
                    $options[$courses[$i]['id']]=$courses[$i]['name'];
               }
            $form->getElement('cid')->setMultiOptions($options);
            $options=NULL;

            $type_model = new Application_Model_Materialtype();
            $types= $type_model->listTypes();
            for($i=0;$i<count($types);$i++ )
               {
                    $options[$types[$i]['id']]=$types[$i]['type_name'];
               }
            $form->getElement('tid')->setMultiOptions($options);

            $form->populate($material_data[0]);
            if($this->getRequest()->isPost()){

                if($form->isValid($this->getRequest()->getParams())){
                    $model = new Application_Model_Materials();
                    $model->editMaterial($form->getValues(),$id);
                    $this->redirect("/materials/list");
                }
            }
            $this->view->form = $form;
            $this->render("add");
        }
        else
        {
            $this->view->notAllwed="The page not allowed for normal user.";
            $this->_redirect("/materials/list");
        }

    }
    public function deleteAction()
    {
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        if($identity->user_type=="admin")
        {
            $id=$this->getRequest()->getParam('id');
            if($id)
            {
                $model = new Application_Model_Materials();
                $this->view->courses  = $model->deleteMaterial($id);
            }
            $this->redirect("materials/list");
        }
        else
        {
            $this->view->notAllwed="The page not allowed for normal user.";
            $this->_redirect("/materials/list");
        }
    }



}





