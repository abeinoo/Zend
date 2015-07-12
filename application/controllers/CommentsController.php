<?php

class CommentsController extends Zend_Controller_Action
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
        $this->_redirect("/comments/list");
    }

    public function listAction()
    { 
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        if($identity->user_type=="admin")
        {
            $model = new Application_Model_Comments();
            $comments = $model->listComments();
            $this->view->comments=$comments;    
            $form=new Application_Form_Comments();
            $mid=$this->getRequest()->getParam('mid');
            $cid=$this->getRequest()->getParam('cid');
            
            if($cid)
            {
                $model = new Application_Model_Comments();
                $comment_data = $model->getCommentById($cid);
                var_dump($comment_data);
                $form->populate($comment_data[0]);
                if($this->getRequest()->isPost())
                        {
                            if($form->isValid($_POST))
                                {
                                    $model = new Application_Model_Comments();
                                    $model->editComment($form->getValues(),$cid);//$this->view->identity->id
                                    $this->redirect("/comments/list");
                                }
                        }
            }
            if($mid)
            {
                //$this->view->page_title = "Add Course";

                    
                    //$page=$this->_getParam('page',1);
                    //$paginator = Zend_Paginator::factory($courses);
                   // $paginator->setItemCountPerPage(10);
                    //$paginator->setCurrentPageNumber($page);

                    
                    if($this->getRequest()->isPost())
                        {
                            if($form->isValid($_POST))
                                {
                                    $model = new Application_Model_Comments();
                                    //var_dump($identity);
                                    $form->getElement("uid")->setValue($identity->id);//session 
                                    $form->getElement("mid")->setValue($mid);
                                    $form->getElement("cdate")->setValue(date('Y-m-d'));
                                    $model->addComment($form->getValues());
                                    $form->reset();
                                    $this->redirect('comments/list/mid/'.$mid);
                                }
                        }
                    
            }
            $this->view->form=$form;
            $this->view->identity=$identity;
        }
        else 
        {
            echo "hjjjj";
            $mid=$this->getRequest()->getParam('mid');
            if($mid)
            {
                $model = new Application_Model_Comments();
                $comments = $model->listComments();
                $this->view->comments=$comments;    
                $form=new Application_Form_Comments();
                if($this->getRequest()->isPost())
                    {
                        if($form->isValid($_POST))
                            {
                                $model = new Application_Model_Comments();
                                //var_dump($identity);
                                $form->getElement("uid")->setValue($identity->id);//session 
                                $form->getElement("mid")->setValue($mid);
                                $form->getElement("cdate")->setValue(date('Y-m-d'));
                                $model->addComment($form->getValues());
                                $form->reset();
                                $this->redirect('comments/list/mid/'.$mid);
                            }
                    }
                $this->view->form=$form;
                $this->view->identity=$identity;
            }
            else
            {
                $this->redirect('users/login');
            }
        }

   }

    public function editAction()
    {
         $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        $form=new Application_Form_Comments();
        $model = new Application_Model_Comments();
        //$this->view->courses  = $model->editCourse();
        $id = $this->getRequest()->getParam('id');
        $comment_data = $model->getCommentById($id);
        $form->populate($comment_data[0]);
        if($this->getRequest()->isPost()){
            
            if($form->isValid($this->getRequest()->getParams())){
                $model = new Application_Model_Comments();
                $model->editComment($form->getValues(),$identity->id);//$this->view->identity->id
                $this->redirect("/comments/list");
            }
        }
        $this->view->$form = $form;
        $this->render('list');

    }
    public function deleteAction()
    {
        $cid=$this->getRequest()->getParam('cid');
        if($cid)
        {
            $model = new Application_Model_Comments();
            $model->deleteComment($cid);
        }
        $this->redirect('comments/list');
    }
}

