<?php

class MaterialtypeController extends Zend_Controller_Action
{

    public function init()
    {
           $authorization =Zend_Auth::getInstance();
            $identity=$authorization->getIdentity();
             $this->view->identity=$identity;
        // $authorization =Zend_Auth::getInstance();
        // if(!$authorization->hasIdentity()) 
        // {
        //     $this->redirect("materialtype/index");
        // }
    }

    public function indexAction()
    {
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        if($identity->user_type=="admin")
        {
            $this->redirect("materialtype/add");
        }
        echo "The page not allowed for normal user.";
    }

    public function addAction()
    {    
        //$this->view->page_title = "Add Course";
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        if($identity->user_type=="admin")
        {
                $form=new Application_Form_Materialtype();               
                
                $id = $this->getRequest()->getParam('id');
                if($id)
                {
                $model = new Application_Model_Materialtype();
                $type_data = $model->getTypeById($id);
                $form->populate($type_data[0]);
                if($this->getRequest()->isPost())
                    {
                        if($form->isValid($_POST))
                                {
                                    $model = new Application_Model_Materialtype();
                                    $model->editType($form->getValues(),$id);
                                    var_dump($form->getValues());

                                    $this->redirect("/materialtype/add");
                            
                                }
                        
                    }
                }
                else
                {
                    if($this->getRequest()->isPost())
                        {
                            if($form->isValid($_POST))
                                {
                                    $model = new Application_Model_Materialtype();
                                    $this->view->success = $model->addType($form->getValues());
                                    $form->reset();
                                }
                        }
                }
                $this->view->form=$form;
            
                $model = new Application_Model_Materialtype();
                $types  = $model->listTypes();
                //$page=$this->_getParam('page',1);
                //$paginator = Zend_Paginator::factory($courses);
               // $paginator->setItemCountPerPage(10);
                //$paginator->setCurrentPageNumber($page);

                $this->view->types=$types;
                //$this->view->action = "add";
     
        }
        else 
        {
            $this->redirect("materialtype/index");
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
                $model = new Application_Model_Materialtype();
                $model->deleteType($id);
            }
            $this->redirect('materialtype/add');
        }
        else 
        {
            $this->redirect("materialtype/index");
        }
    }
    
}




