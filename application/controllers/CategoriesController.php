<?php

class CategoriesController extends Zend_Controller_Action
{
    public function init()
    {
        $authorization =Zend_Auth::getInstance();
        if(!$authorization->hasIdentity()) 
        {
            $this->redirect("users/login");
        }
    }

    public function indexAction()
    {
        $this->redirect("categories/list");
        
    }

    public function listAction()
    {    
         //$this->view->page_title = "Add Course";
         $authorization =Zend_Auth::getInstance();
         $identity=$authorization->getIdentity();
            if($identity->user_type=="admin")
            {
                $form=new Application_Form_Categories();
                
                $id = $this->getRequest()->getParam('id');
                if($id)
                {
                    $model = new Application_Model_Categories();
                    $category_data = $model->getCategoryById($id);
                    $form->populate($category_data[0]);
                    if($this->getRequest()->isPost())
                        {
            
                            if($form->isValid($this->getRequest()->getParams())){
                                $model = new Application_Model_Categories();
                                $model->editCategory($form->getValues(),$id);//$this->view->identity->id
                                $this->_redirect("/categories/list");
                            }
                        }
                }
                
                else 
                {
                if($this->getRequest()->isPost())
                    {
                        if($form->isValid($_POST))
                            {
                                $model = new Application_Model_Categories();
                                $this->view->success = $model->addCategory($form->getValues());
                                $form->reset();
                            }
                    }
                }
           
                $this->view->form=$form;
            }
            
                $model = new Application_Model_Categories();
                $categories  = $model->listCategories();
                //$page=$this->_getParam('page',1);
                //$paginator = Zend_Paginator::factory($courses);
               // $paginator->setItemCountPerPage(10);
                //$paginator->setCurrentPageNumber($page);
                $this->view->categories=$categories;
                $this->view->identity=$identity; 
                        
    }

    public function deleteAction()
    {
        $id=$this->getRequest()->getParam('id');
        if($id)
        {
            $model = new Application_Model_Categories();
            $model->deleteCategory($id);
        }
        $this->redirect('/categories/list');
    }
    
}




